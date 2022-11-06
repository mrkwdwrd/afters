<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    use Sluggable;

    protected $table = 'product_lists';

    protected $fillable = ['title', 'slug', 'description', 'is_featured', 'link_text', 'link_url', 'sort_order'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'product_list_product', 'product_list_id', 'product_id');
    }
}
