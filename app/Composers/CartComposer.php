<?php

namespace App\Composers;

use App\Models\Order;

class CartComposer
{
    public function compose($view)
    {
        $cart = Order::where('token', session('token'))->first();

        $view->with('cart', $cart);
    }
}
