<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Person extends Model implements HasMedia
{
    use Sluggable, SoftDeletes, InteractsWithMedia;

    protected $table = 'people';

    protected $fillable = ['first_name', 'surname', 'slug', 'title', 'content', 'sort_order'];

    protected $dates = ['deleted_at'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['surname', 'first_name']
            ]
        ];
    }

    public function getNameAttribute()
    {
        return $this->first_name . " " . $this->surname;
    }
}
