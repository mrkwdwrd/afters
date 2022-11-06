<?php

namespace App\Models;

use App\Scopes\PublishedBlogs;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class BlogPost extends Model implements HasMedia
{
    use Sluggable, SoftDeletes, InteractsWithMedia;

    protected $table = 'cms_blog_posts';

    protected $fillable = [
        'author_id', 'title', 'category_id', 'slug', 'extract', 'content', 'image', 'meta_keywords',
        'meta_description', 'publish', 'published_at'
    ];

    protected $dates = ['deleted_at', 'published_at'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new PublishedBlogs);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function tags()
    {
        return $this->belongsToMany(BlogTag::class, 'cms_post_tag', 'post_id', 'tag_id');
    }

    public function taxons()
    {
        return $this->belongsToMany(Taxon::class, 'blog_taxon', 'post_id', 'taxon_id');
    }

    public function nodes()
    {
        return $this->hasMany(BlogNode::class, "blog_id")->orderBy("order", "ASC");
    }

    public function getCategoriesAttribute()
    {
        return $this->taxons->filter(function ($taxon) {
            return $taxon->taxonomy->name === 'Blog Categories';
        });
    }

    public function getCategoriesDisplayAttribute()
    {
        return implode(', ', $this->categories->pluck('name')->all());
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')->useDisk('blog')->singleFile();
    }
}
