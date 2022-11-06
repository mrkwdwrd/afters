<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;

class AddCartDetails
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    $response = $next($request);
    $data = $response->getData();
    $data->cart_count = '0 Items';
    $data->total = '$0';
    $data->is_empty = true;
    if ($order = Order::where('token', session('token'))->first()) {
      $data->cart_count = $order->cart_count;
      $data->total = '$' . $order->item_total;
      $data->is_empty = count($order->items) === 0;
    }
    $response->setData($data);

    return $response;
  }
}
