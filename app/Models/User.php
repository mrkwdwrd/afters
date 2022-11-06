<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
        'username', 'email', 'first_name', 'surname', 'password', 'billing_address_id',
        'shipping_address_id', 'remember_token', 'user_info'
    ];

    protected $dates = ['deleted_at'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'user_info' => 'array',
    ];

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->surname;
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function billingAddress()
    {
        return $this->belongsTo(Address::class, 'billing_address_id');
    }

    public function shippingAddress()
    {
        return $this->belongsTo(Address::class, 'shipping_address_id');
    }
}
