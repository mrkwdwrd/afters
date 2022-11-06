<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipping_method_id',
        'shipping_item_id',
        'country_iso',
        'base_charge',
        'item_charge'
    ];

    public function getCountryAttribute()
    {
        return country($this->country_iso);
    }
}
