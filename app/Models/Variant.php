<?php

namespace App\Models;

use App\Scopes\ActiveVariantsScope;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;

class Variant extends Model implements HasMedia
{
    use Sluggable, SoftDeletes, InteractsWithMedia;

    protected $table = 'variants';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'product_id', 'name', 'sku', 'price', 'sale_price', 'description', 'position', 'is_active',
        'is_sold_out', 'is_limited', 'stock_on_hand', 'shipping_item_id', 'sort_order'
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveVariantsScope);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id')->withTrashed();
    }

    public function taxons()
    {
        return $this->belongsToMany(Taxon::class, 'variant_taxon', 'variant_id', 'taxon_id');
    }

    public function shippingItem()
    {
        return $this->belongsTo(ShippingItem::class, 'shipping_item_id');
    }

    public function getSoldOutAttribute()
    {
        // if variant is limited
        if ($this->is_limited) {
            // if available stock
            if ($this->stock_on_hand > 0) {
                // obey variant override
                return $this->is_sold_out;
            }
            // otherwise, sold out
            return true;
        }
        // otherwise, not sold out
        return false;
    }

    public function getMaxQtyAttribute()
    {
        return $this->is_limited ? $this->stock_on_hand : null;
    }

    public function getSummaryAttribute()
    {
        if ($this->name) {
            return $this->name;
        }
        return implode(' / ', $this->taxons->pluck('name')->toArray());
    }

    public function getItemPriceAttribute()
    {
        return $this->sale_price ? $this->sale_price : ($this->price ? $this->price : 0.00);
    }

    public function getDisplayPriceAttribute()
    {
        return $this->price ? '$' . floatval($this->price) : null;
    }

    public function getDisplaySalePriceAttribute()
    {
        return $this->sale_price ? '$' . floatval($this->sale_price) : null;
    }

    public function getIsOnSaleAttribute()
    {
        return !!$this->sale_price;
    }
}
