@extends('layouts.master')

@section('main-class'){!! 'checkout shipping' !!}@stop

@section('introduction')
    <section>
    </section>
@stop

@section('content')
<div class="container">
    <div class="row">
        {!! Form::model($order, ['route' => 'checkout.shipping', 'method' => 'POST']) !!}
            @if (count($unshippableItems))
                <header class="row">
                    <h2>There's a problem with your order</h2>
                </header>
                @if ($countryNotEnabled)
                    <div class="message">
                        <p>Shipping to your country is not available.</p>
                    </div>
                    <fieldset class="buttons">
                        <a href="{!! url('checkout/addresses') !!}" title="Your address" class="button">Update shipping address</a>
                    </fieldset>
                @else
                    <div class="message">
                        <p>Your order contains the below items that can't be shipped to your country:</p>
                        <ul>
                            @foreach($unshippableItems as $item)
                                <li>{!! $item->details['name'] !!}</li>
                            @endforeach
                        </ul>
                    </div>
                    <fieldset class="buttons">
                        <a href="{!! url('checkout/addresses') !!}" title="Your address" class="button">Update shipping address</a>
                        <a href="{!! url('checkout/cart') !!}" title="Your cart" class="button">Update cart</a>
                    </fieldset>
                @endif
            @else
                <header class="row">
                    <h2>Select shipping method</h2>
                </header>

                <fieldset class="shipping-methods">
                    @foreach($shippingMethods as $method)
                        <label>
                            {!! Form::radio('shipping_method_id', $method->id) !!}
                            {!! $method->name !!}
                            <span>${!! number_format($method->shipping_charge, 2) !!}</span>
                        </label>
                    @endforeach
                    <span class="error">{!! $errors->first('shipping_method_id') !!}</span>
                </fieldset>

                <fieldset class="buttons">
                    {!! Form::button('Next', ['type' => 'submit']) !!}
                </fieldset>
            @endif
        {!! Form::close() !!}
        @include('checkout.partials._totals')
    </div>
</div>
@stop

@section('inline-scripts')
@stop
