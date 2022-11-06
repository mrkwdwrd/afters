<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{

    use Sluggable;

    protected $table = 'specifications';

    protected $fillable = [
        'label', 'slug'
    ];

    public $timestamps = false;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'label'
            ]
        ];
    }
}
