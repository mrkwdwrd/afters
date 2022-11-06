<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    const ORDERABLE_TYPES = [
        'variant'   => Variant::class,
        'product'   => Product::class
    ];

    protected $table = 'order_items';

    protected $fillable = [
        'orderable_id',
        'orderable_type',
        'order_id',
        'quantity',
        'details',
        'price',
        'total'
    ];

    protected $casts = [
        'details' => 'json'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function orderable()
    {
        return $this->morphTo();
    }

    public function getMaxQtyAttribute()
    {
        if ($this->orderable->max_qty >= 0) {
            return $this->orderable->max_qty;
        }
        return null;
    }

    public function getShippingChargesAttribute()
    {
        return $this->orderable->shippingCharges;
    }
}
