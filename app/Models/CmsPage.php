<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;

class CmsPage extends Model implements HasMedia
{
    use Sluggable, SoftDeletes, InteractsWithMedia;

    protected $table = 'cms_pages';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'parent_id', 'cms_slider_id', 'title', 'subtitle', 'label', 'slug', 'permalink', 'content', 'sort_order', 'meta_title', 'meta_keywords',
        'meta_description', 'show_in_nav', 'show_in_footer'
    ];

    public function replicate(array $except = null)
    {
        $instance = $this->replicateNode($except);

        return $instance;
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'label'
            ]
        ];
    }

    /**
     * Relation to children. (Override)
     *
     * @return HasMany
     */
    public function children()
    {
        return $this->hasMany(CmsPage::class, 'parent_id')->orderBy('sort_order');
    }

    public function parent()
    {
        return $this->belongsTo(CmsPage::class, 'parent_id');
    }

    public function nodes()
    {
        return $this->hasMany(CmsNode::class, 'cms_page_id')->orderBy('sort_order');
    }

    public function slider()
    {
        return $this->belongsTo(CmsSlider::class, 'cms_slider_id');
    }
}
