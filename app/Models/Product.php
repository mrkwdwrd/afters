<?php

namespace App\Models;

use App\Scopes\ActiveProductsScope;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use Sluggable, SoftDeletes, InteractsWithMedia;

    const PRODUCT_TYPES = ['variant', 'simple'];

    const SPECIFICATION_TYPES = [];

    protected $table = 'products';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'slug', 'type', 'sku', 'price', 'sale_price', 'introduction', 'description',
        'meta_title', 'meta_keywords', 'meta_description', 'is_active', 'is_sold_out', 'is_limited', 'stock_on_hand', 'shipping_item_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveProductsScope);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function variants()
    {
        return $this->hasMany(Variant::class, 'product_id')->orderBy('sort_order');
    }

    public function taxons()
    {
        return $this->belongsToMany(Taxon::class, 'product_taxon', 'product_id', 'taxon_id');
    }

    public function productSpecifications()
    {
        return $this->hasMany(ProductSpecification::class, 'product_id')->with('specification');
    }

    public function related_products()
    {
        return $this->belongsToMany(Product::class, 'product_related_product', 'product_id', 'related_product_id');
    }

    public function shippingItem()
    {
        return $this->belongsTo(ShippingItem::class, 'shipping_item_id');
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

    public function getSoldOutAttribute()
    {
        // if product is variant type
        if ($this->type === 'variant') {
            //if available variants then obey product override, otherwise it's sold out
            return count($this->variants->where("sold_out", false)) ? $this->is_sold_out : true;
        }
        // if product is simple type
        if ($this->type === 'simple') {
            // if product is limited
            if ($this->is_limited) {
                // if available stock
                if ($this->stock_on_hand > 0) {
                    // obey product override
                    return $this->is_sold_out;
                }
                // otherwise, sold out
                return true;
            }
            // otherwise, not sold out
            return false;
        }
        // otherwise, sold out
        return true;
    }

    public function getMaxQtyAttribute()
    {
        return $this->is_limited ? $this->stock_on_hand : null;
    }

    public function getVariantOptionsAttribute()
    {
        return $this->variants->where('sold_out', false);
    }

    public function getIsOnSaleAttribute()
    {
        if ($this->type === 'variant') {
            return !!count($this->variants->whereNotNull('sale_price'));
        }
        return !!$this->sale_price;
    }

    public function getVariantsStringsAttribute()
    {
        return $this->variants ? implode(', ', $this->variants->pluck('sku')->toArray()) : "";
    }

    public function getTaxonsStringAttribute()
    {
        return $this->taxons ? implode(', ', $this->taxons->pluck('name')->toArray()) : "";
    }

    public function getSpecificationsAttribute()
    {
        $specifications = [];
        foreach ($this::SPECIFICATION_TYPES as $t => $type) {
            $specifications[$t] = collect($this->productSpecifications->filter(function ($value) use ($t) {
                return $value->type === $t;
            })->all());
        }
        return collect($specifications);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(config('sitesettings.thumb_width'));
    }
}
