<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;

class CmsAccordion extends Model
{
    use Sluggable, SoftDeletes;

    protected $table = 'cms_accordions';

    protected $fillable = ['name', 'slug', 'description'];

    protected $dates = ['deleted_at'];

    private static $accordionItemFields = ['title', 'content', 'anchor'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function items()
    {
        return $this->hasMany(CmsAccordionItem::class, 'accordion_id')->orderBy('sort_order', 'ASC');
    }

    public function contents()
    {
        return $this->morphMany(CmsNodeContent::class, 'contentable');
    }

    public function accordionItems(array $data)
    {
        $accordionItems = Arr::only($data, self::$accordionItemFields);

        foreach ($this->items as $accordionItem) {
            $accordionItem->title = $accordionItems['title'][$accordionItem->id];
            $accordionItem->content = $accordionItems['content'][$accordionItem->id];
            if ($accordionItems['anchor'][$accordionItem->id]) {
                $accordionItem->anchor = $accordionItems['anchor'][$accordionItem->id];
            }
        }
    }
}
