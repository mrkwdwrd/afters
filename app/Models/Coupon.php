<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use SoftDeletes;

    const COUPON_TYPES = [
        '$_discount'    => '$ Discount',
        '%_discount'    => '% Discount',
        // 'free_item'     => 'Free Item',
        // 'free_shipping' => 'Free Shipping'
    ];

    protected $table = 'coupons';

    protected $fillable = ['code', 'type', 'discount', 'valid_from', 'valid_to', 'limit_to_users', 'redeem_limit', 'redeem_threshhold'];

    public $dates = ['valid_from', 'valid_to'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('redeemed_at');
    }

    public function getSummaryAttribute()
    {
        $summary = '';

        if ($this->type === '%_discount') {
            $summary .= floatval($this->discount) . '% discount';
        } else if ($this->type === '$_discount') {
            $summary .= '$' . floatval($this->discount) . 'discount';
        } else {
            $summary .= Coupon::COUPON_TYPES[$this->type];
        }

        if ($this->redeem_threshhold > 0) {
            $summary .= ' on orders over $' . floatval($this->redeem_threshhold);
        }

        return $summary;
    }
}
