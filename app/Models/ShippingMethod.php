<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ShippingMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function charges()
    {
        return $this->hasMany(ShippingCharge::class, 'shipping_method_id');
    }

    public function getChargesForItem($shipping_item_id)
    {
        return $this->charges->where('shipping_item_id', $shipping_item_id);
    }

    public function getChargesForCountry($country_iso)
    {
        $charges = $this->charges->where('country_iso', $country_iso);
        if (count($charges) === 0) {
            $charges = $this->charges->whereNull('country_iso');
        }
        return $charges;
    }

    public function isEnabledForItem($shipping_item_id)
    {
        return count($this->getChargesForItem($shipping_item_id)) > 0;
    }

    public function isEnabledForCountry($country_iso)
    {
        return count($this->getChargesForCountry($country_iso)) > 0;
    }

    public function isEnabledForCountryAndItem($country_iso, $shipping_item_id)
    {
        return $this->isEnabledForCountry($country_iso) && $this->isEnabledForItem($shipping_item_id);
    }

    public function enabledCounrtiesForItemString($shipping_item_id)
    {
        $arr = $this->getChargesForItem($shipping_item_id)->pluck('country_iso')->toArray();
        if ($this->getChargesForItem($shipping_item_id)->whereNull('country_iso')->first()) {
            $arr[] = 'Rest of World';
        }
        // return  Str::replaceLast(', ', '', implode(', ', $arr)) . '.';
        return  implode(', ', $arr) . '.';
    }
}
