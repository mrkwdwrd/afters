<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    protected $table = 'product_specification';

    protected $fillable = [
        'product_id', 'specification_id', 'type', 'value'
    ];

    public $timestamps = false;

    public function specification()
    {
        return $this->belongsTo(Specification::class, 'specification_id');
    }

    public function getIdAttribute()
    {
        return $this->specification->id;
    }

    public function getSlugAttribute()
    {
        return $this->specification->slug;
    }

    public function getLabelAttribute()
    {
        return $this->specification->label;
    }
}
