<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    use Sluggable;

    protected $table = 'cms_blog_tags';

    protected $fillable = ['name', 'slug'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function posts()
    {
        return $this->belongsToMany(BlogPost::class, 'cms_post_tag', 'tag_id', 'post_id')
            ->where('published_at', '<=', Carbon::now())
            ->wherePublish(true)
            ->orderBy('published_at', 'DESC');
    }
}
