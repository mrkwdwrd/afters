@extends('layouts.master')

@section('page-title'){!! 'Your Cart' !!}@stop
@section('page-id'){!! 'your-cart' !!}@stop
@section('main-class'){!! 'checkout cart' !!}@stop

@section('introduction')
    <section>
        <h1>Your cart</h1>
    </section>
@stop

@section('content')
<div class="container">
    <div class="cart {!! $order && count($order->items) ? 'has-items' : '' !!}" id="checkout-cart">
        @if(count($order->items))
            {!! Form::open(['route' => 'cart.update', 'method' => 'POST']) !!}
                <ul class="cart-items">
                    @foreach($order->items as $item)
                        @include('checkout.partials._cart_item')
                    @endforeach
                </ul>

                <div class="cart-summary">
                    <div class="totals">
                        <div class="total cart">
                            {!! $order->cart_count !!} <span>{!! '$' . $order->item_total !!}</span>
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
                    {!! Form::button('Update cart', ['class' => 'button', 'type' => 'submit']) !!}
                    <a href="{!! url('checkout') !!}" class="button" title="Proceed to Checkout">Checkout</a>
                </fieldset>
            {!! Form::close() !!}
            @include('checkout.partials._coupon')
        @else
            <div class="cart-empty">
                <h3>Your Cart is Empty</h3>
                <p>You don't appear to have added anything to your cart yet.</p>
            </div>
        @endif
    </div>
</div>
@stop


@section('inline-scripts')
@stop
