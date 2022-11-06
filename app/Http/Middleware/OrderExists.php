<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Carbon\Carbon;
use Closure;

class OrderExists
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
        if (!$order = Order::where('token', session('token'))->first()) {
            return redirect()->to('/shop');
        }
        if ($order->item_count < 1) {
            foreach ($order->items as $item) {
                $item->delete();
            }
        }

        if ($order->coupon) {
            $coupon = $order->coupon;
            if (!$coupon || Carbon::now() < $coupon->valid_from || ($coupon->valid_to && Carbon::now() > $coupon->valid_to)) {
                $order->update(['coupon_id' => null]);
            }
            if ($coupon->redeem_threshhold && $order->item_total < $coupon->redeem_threshhold) {
                $order->update(['coupon_id' => null]);
            }
        }
        return $next($request);
    }
}
