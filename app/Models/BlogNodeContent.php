<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogNodeContent extends Model
{
    protected $table = 'blog_node_contents';

    protected $fillable = [
        'blog_node_id', 'node_type', 'node_id',
    ];

    public function node()
    {
        return $this->belongsTo(BlogNode::class, "blog_node_id");
    }

    public function content()
    {
        switch($this->node_type)
        {
            case "content":
                return $this->belongsTo(CmsContent::class, "node_id");
        }
    }
}
