<div class="totals">
    <h3>Your Order</h3>
    <ul>
        <li>{!! $order->cart_count !!} <span>${!! $order->item_total !!}</span></li>
        @if($order->coupon && $order->coupon_discount)
        <li>Coupon ({!! $order->coupon->code !!}) <span>&minus;${!! $order->coupon_discount !!}</span></li>
        @endif
        @if($order->shippingMethod)
        <li>Shipping <span>${!! $order->shipping_total !!}</span></li>
        @endif
        <li>Subtotal <span>${!! $order->subtotal !!}</span></li>
        <li class="total">Total <span>${!! $order->total !!}</span></li>
    </ul>
    <a href="{!! url('cart') !!}" title="View cart" class="button">View Cart</a>
</div>

@include('checkout.partials._coupon'