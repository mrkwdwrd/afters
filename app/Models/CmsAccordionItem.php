<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsAccordionItem extends Model
{
    protected $table = 'cms_accordion_items';

    protected $fillable = ['accordion_id', 'title', 'content', 'sort_order'];

    public function accordion()
    {
        return $this->belongsTo(CmsAccordion::class, 'accordion_id');
    }
}
