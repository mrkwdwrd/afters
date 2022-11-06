<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogNode extends Model
{
    protected $table = 'blog_nodes';

    protected $fillable = [
        'blog_id', 'node_type', 'node_id', 'order'
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class, "blog_id");
    }

    public function contents()
    {
        return $this->hasMany(BlogNodeContent::class, "blog_node_id");
    }

    public function getWidthAttribute()
    {
        return $this->contents->count() > 1 ? "1/".$this->contents->count() : "full";
    }

    public function getTypeAttribute()
    {
        return $this->contents->first()->node_type;
    }
}
