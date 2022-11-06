@extends('layouts.master')

@section('main-class'){!! 'checkout cancelled' !!}@stop

@section('introduction')
    <section>
        <h1>Oh no!</h1>
        <p>We've had to adjust some of the items in your cart to reflect changed stock levels!</p>

        @if($order->item_count)
            <p><strong>You haven't been charged</strong>, but your updated cart is below and you may re-attempt payment for your new order total of <strong>${!! $order->total !!}</strong>.</p>
        @else
            <p><strong>You haven't been charged</strong>, but unfortunately there are no in-stock items left in your order.</p>
        @endif
    </section>
@stop
@section('content')
<div class="container">
    <div class="cart has-items" id="checkout-cart">
        <div class="order-contents">
            <ul class="cart-items">
                @foreach($order->items as $item)
                    @include('checkout.partials._order_item')
                @endforeach
            </ul>
            @if($order->item_count)
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
            <fieldset class="buttons">
                <a href="{!! url('checkout/payment') !!}" class="button" title="Proceed to Payment">Re-attempt Payment</a>
            </fieldset>
            @endif
        </div>
    </div>
</div>
@stop


@section("inline-scripts")
@stop
