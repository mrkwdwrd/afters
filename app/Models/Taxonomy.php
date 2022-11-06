<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Taxonomy extends Model
{
    use Sluggable;

    const TAXONOMY_TYPES = [
        'product' => 'Product',
        'variant' => 'Variant'
    ];

    protected $table = 'taxonomies';

    protected $fillable = ['name', 'slug', 'type'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function taxons()
    {
        return $this->hasMany(Taxon::class, 'taxonomy_id')->whereNull('parent_id')->orderBy('name', 'ASC');
    }

    public function scopeIsType($query, $type)
    {
        return $query->whereJsonContains('type', $type);
    }
}
