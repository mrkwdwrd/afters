<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';

    protected $fillable = ['notification', 'display_from', 'display_to'];

    public $dates = ['display_from', 'display_to'];

    public function getExtractAttribute()
    {
        if (strlen(strip_tags($this->notification)) > 200)
            return substr(strip_tags($this->notification), 0, 200) . "...";

        return strip_tags($this->notification);
    }
}
