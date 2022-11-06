<?php

namespace App\Composers;

use App\Models\ProductList;

class ProductListComposer
{
    public function compose($view)
    {
        $lists = ProductList::orderBy('sort_order', 'ASC')->get();

        $view->with('lists', $lists);
    }
}
