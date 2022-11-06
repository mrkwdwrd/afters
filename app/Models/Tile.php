<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Tile extends Model implements HasMedia
{
    use InteractsWithMedia, SoftDeletes;

    protected $table = 'tiles';

    protected $fillable = ['name', 'heading', 'content', 'button_text', 'button_colour', 'button_link'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->useDisk('tiles')->singleFile();
    }
}
