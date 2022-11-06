<?php

namespace App\Composers;

use App\Models\CmsPage;

class MenuComposer
{
    public function compose($view)
    {
        $pages = CmsPage::orderBy('sort_order', 'ASC')->where('parent_id', null)->get();

        $view->with('menus', $pages);
    }
}
