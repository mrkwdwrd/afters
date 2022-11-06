<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const CART = 'cart';
    const SUBMITTED = 'submitted';
    const CONFIRMED = 'confirmed';
    const PAYMENT = 'payment';
    const COMPLETE = 'complete';
    const HOLD = 'hold';
    const CANCELLED = 'cancelled';
    const SHIPPED = 'shipped';
    const REFUNDED = 'refunded';

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'email',
        'state',
        'completed_at',
        'token',
        'billing_address_id',
        'shipping_address_id',
        'item_total',
        'coupon_discount',
        'subtotal',
        'shipping_total',
        'total',
        'tax',
        'shipping_method_id',
        'coupon_id',
        'payment_method',
        'payment_reference',
        'tracking_number',
        'shipped_at'
    ];

    protected $dates = ['completed_at', 'shipped_at'];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function billingAddress()
    {
        return $this->belongsTo(Address::class, 'billing_address_id');
    }

    public function shippingAddress()
    {
        return $this->belongsTo(Address::class, 'shipping_address_id');
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }

    public function shippingMethod()
    {
        return $this->belongsTo(ShippingMethod::class, 'shipping_method_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'order_id')->orderBy('id', 'DESC');
    }

    public function getNumberAttribute()
    {
        return str_pad($this->id, 5, '0', STR_PAD_LEFT);
    }

    public function getItemCountAttribute()
    {
        return $this->items->sum('quantity');
    }

    public function getCartCountAttribute()
    {
        return $this->item_count . ' ' . ($this->item_count !== 1 ? 'Items' : 'Item');
    }

    public function getItemTotalAttribute()
    {
        return number_format($this->items->sum('total'), 2);
    }

    public function getCouponDiscountAttribute()
    {
        if ($this->coupon) {
            if ($this->coupon->type === '$_discount') {
                return $this->coupon->discount;
            }

            if ($this->coupon->type === '%_discount') {
                return number_format($this->item_total * ($this->coupon->discount / 100), 2);
            }
        }
        return 0;
    }

    public function getSubtotalAttribute()
    {
        return number_format(max($this->item_total - $this->coupon_discount, 0), 2);
    }

    public function getShippingTotalAttribute($value)
    {
        return $value ? number_format($value, 2) : number_format(0, 2);
    }

    public function getTotalAttribute()
    {
        return number_format($this->subtotal + $this->shipping_total, 2);
    }

    public function getIsPaidAttribute()
    {
        return in_array($this->state, ['complete', 'shipped', 'paid']);
    }

    public function getWeightAttribute()
    {
        return $this->items->sum('weight');
    }
}
