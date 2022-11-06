<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
        'first_name', 'surname', 'company', 'phone', 'email', 'address1',
        'address2', 'city_suburb', 'postcode', 'state', 'country_iso'
    ];

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->surname;
    }

    public function getCountryAttribute()
    {
        return country($this->country_iso);
    }
}
