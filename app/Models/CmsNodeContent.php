<?php

namespace App\Models;

use App\Libraries\Utils;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CmsNodeContent extends Model
{
    use SoftDeletes;

    protected $table = 'cms_node_contents';

    protected $fillable = ['cms_node_id', 'contentable_id', 'contentable_type'];

    protected $dates = ['deleted_at'];

    public function node()
    {
        return $this->belongsTo(CmsNode::class, 'cms_node_id');
    }

    public function contentable()
    {
        return $this->morphTo();
    }

    public function getTypeAttribute()
    {
        return str_replace(" ", "_", strtolower(Utils::getContentableTypes()[$this->contentable_type]));
    }

    public function getPartialAttribute()
    {
        return $this->type != "tile_group" ? $this->type : $this->type."_".$this->contentable->style;
    }
}
