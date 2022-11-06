@extends("layouts.master")

@section('page-title'){!! 'Order Complete' !!}@stop
@section('page-id'){!! 'order complete' !!}@stop
@section('main-class'){!! 'checkout complete' !!}@stop

@section('introduction')
    <section class="container">
        <h1>Thanks for your order!</h1>
        <h2>Your order has been placed.</h2>
        <p>We have sent a confirmation email to <strong>{!!  $order->email  !!} </strong>.</p>
        @auth
            <p>You can view the details of this order any time <a href="{!! url('/account/order-history') !!}">in your account</a>.</p>
        @endauth
        @guest
            <p><a href="{!! url('/register') !!}" title="Register">Sign up</a> for an account for a faster checkout next time!</p>
        @endguest
    </section>
@stop

@section('content')
<div class="container">
    <div class="cart has-items" id="checkout-cart">
        <div class="order-contents">
            <header>
                <h2>Order #{!! $order->number !!}</h2>
                <p>{!! $order->completed_at->format('l jS \\of F Y h:i:s A') !!}</p>
            </header>
            <ul class="cart-items">
                @foreach($order->items as $item)
                    @include('checkout.partials._order_item')
                @endforeach
            </ul>

            <div class="cart-summary">
                <div class="totals">
                    <div class="total item">
                        {!! $order->cart_count !!} <span>{!! '$' . $order->item_total !!}</span>
                    </div>
                    <div class="total cart">
                        Subtotal <span>{!! '$' . $order->item_total !!}</span>
                    </div>
                    @if($order->coupon && $order->coupon_discount)
                        <div class="total coupon">
                            Coupon ({!! $order->coupon->code !!}) <span>&minus;{!! '$' . $order->coupon_discount !!}</span>
                        </div>
                    @endif
                    @if($order->shipping_total)
                        <div class="total shipping">
                            Shipping <span>{!! '$' . $order->shipping_total !!}</span>
                        </div>
                    @endif
                    <div class="total order">
                        Total <span id="cart-total">{!! '$' . $order->total !!}</span>
                    </div>
                </div>
            </div>
            <div class="addresses row">
                <div class="address shipping">
                    <h4>Shipping Address</h4>
                    <p>{!! $order->shippingAddress->first_name . ' ' . $order->shippingAddress->surname !!}<br />
                    @if($order->shippingAddress->company)
                        {!! $order->shippingAddress->company !!}<br />
                    @endif
                    {!! $order->shippingAddress->address1 !!}<br/>
                    @if($order->shippingAddress->company)
                        {!! $order->shippingAddress->address2 !!}<br />
                    @endif
                    {!! $order->shippingAddress->city_suburb !!} {!! $order->shippingAddress->state !!} {!! $order->shippingAddress->postcode !!}<br />
                    {!! $order->shippingAddress->country->getName() !!}</p>
                </div>
                <div class="address billing">
                    <h4>Billing Address</h4>
                    <p>{!! $order->billingAddress->first_name . ' ' . $order->billingAddress->surname !!}<br />
                    @if($order->billingAddress->company)
                        {!! $order->billingAddress->company !!}<br />
                    @endif
                    {!! $order->billingAddress->address1 !!}<br/>
                    @if($order->billingAddress->company)
                        {!! $order->billingAddress->address2 !!}<br />
                    @endif
                    {!! $order->billingAddress->city_suburb !!} {!! $order->billingAddress->state !!} {!! $order->billingAddress->postcode !!}<br />
                    {!! $order->billingAddress->country->getName() !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop


@section('inline-scripts')
@stop
