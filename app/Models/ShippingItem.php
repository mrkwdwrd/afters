<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingItem extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function shippingCharges()
    {
        return $this->hasMany(ShippingCharge::class, 'shipping_item_id');
    }
}
