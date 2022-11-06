<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsTileGroup extends Model
{
    protected $table = 'cms_tile_groups';

    protected $fillable = ['heading', 'style', 'columns', 'rows'];

    public function tiles()
    {
        return $this->belongsToMany(Tile::class, 'cms_tile_group_tile', 'tile_group_id', 'tile_id')
                    ->withPivot(["row_no", "column_no"]);
    }
}
