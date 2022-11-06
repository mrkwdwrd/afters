<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class CmsContent extends Model implements HasMedia
{
    use Sluggable, InteractsWithMedia;

    protected $table = 'cms_contents';

    protected $fillable = ['title', 'slug', 'type', 'content'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function contents()
    {
        return $this->morphMany(CmsNodeContent::class, 'contentable');
    }

    public function getSliderAttribute()
    {
        if ($this->type !== 'slider')
            return null;

        return CmsSlider::where('id', $this->content)->first();
    }

    public function getAccordionAttribute()
    {
        if ($this->type !== 'accordion')
            return null;

        return CmsAccordion::where('id', $this->content)->first();
    }

    public function getGalleryAttribute()
    {
        if ($this->type !== 'gallery')
            return null;

        return CmsGallery::where('id', $this->content)->first();
    }

    public function getImageAttribute()
    {
        if ($this->type !== 'image')
            return null;

        return $this->getFirstMediaUrl('image');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->useDisk('cms_content')->singleFile();
    }
}
