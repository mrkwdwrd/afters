<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Taxon extends Model
{
    use Sluggable;

    protected $table = 'taxons';

    protected $fillable = ['taxonomy_id', 'parent_id', 'name', 'slug', 'permalink'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ],
            'permalink' => [
                'source' => ['parent.permalink', 'slug'],
                'separator' => '/'
            ],
        ];
    }

    public function taxonomy()
    {
        return $this->belongsTo(Taxonomy::class, 'taxonomy_id');
    }

    public function children()
    {
        return $this->hasMany(Taxon::class, 'parent_id', 'id')->orderBy('name', 'ASC');
    }

    public function parent()
    {
        return $this->belongsTo(Taxon::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_taxon', 'taxon_id', 'product_id');
    }

    public function getImageAttribute()
    {
        foreach ($this->products as $product) {
            if ($product->hasMedia('images')) {
                return $product->getMedia('images')->first();
            }
        }
    }
}
