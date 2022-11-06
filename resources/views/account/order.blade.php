@extends('layouts.master')

@section('content')
    @include('account.partials._links', [ 'current' => 'orders' ])
    <h2>Order</h2>
    <h4>Shipping Address</h4>
    <span>{!! $order->shippingAddress->first_name . ' ' . $order->shippingAddress->surname !!}</span><br />
    <span>{!! $order->shippingAddress->company !!}</span><br />
    <span>{!! $order->shippingAddress->address1 !!}</span><br />
    <span>{!! $order->shippingAddress->address2 !!}</span><br />
    <span>{!! $order->shippingAddress->city_suburb !!}</span><br />
    <span>{!! $order->shippingAddress->state !!}</span><br />
    <span>{!! $order->shippingAddress->postcode !!}</span>

    <h4>Billing Address</h4>
    <span>{!! $order->billingAddress->first_name . ' ' . $order->shippingAddress->surname !!}</span><br />
    <span>{!! $order->billingAddress->company !!}</span><br />
    <span>{!! $order->billingAddress->address1 !!}</span><br />
    <span>{!! $order->billingAddress->address2 !!}</span><br />
    <span>{!! $order->billingAddress->city_suburb !!}</span><br />
    <span>{!! $order->billingAddress->state !!}</span><br />
    <span>{!! $order->billingAddress->postcode !!}</span>

    <h3>Order Summary</h3>
    @foreach($order->items as $item)
        {{-- {!! $item->orderable->product->getFirstMediaUrl('images') !!} --}}
        {!! $item->details['name'] !!}
        {!! $item->details['summary'] !!}
        {!! $item->price !!}
        {!! $item->quantity !!}
    @endforeach
    <h4>Order Totals</h4>
    <span>Items:</span> {!! $order->cart_count !!}
    <span>Subtotal:</span>${!! $order->item_total !!}
    <span>GST:</span>${!! $order->item_total !!}
    @if($order->coupon)
        <span>Coupon:</span>- ${!! $order->coupon_discount !!}
    @endif

    <span>Shipping:</span> ${!! $order->shipping_total !!}
    <span>Total:</span>${!! $order->total !!}
    <spanPaid via {!!$order->payment_method !!}</span>

@stop
