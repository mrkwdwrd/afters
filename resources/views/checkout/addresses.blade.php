@extends('layouts.master')

@section('main-class'){!! 'checkout address' !!}@stop

@section('introduction')
    <section>
    </section>
@stop

@section('content')
    {!! Form::model($order, ['route' => 'checkout.addresses', 'method' => 'POST', 'class' => 'container']) !!}
        <header class="row">
            <h3>Shipping Address</h3>
        </header>
        <div id="shipping-address">
            <div class="row">
                @include('account.partials._address', ['prefix' => 'shipping'])
            </div>
        </div>
        <hr />
        <header class="row">
            <h3>Billing Address</h3>
            <fieldset>
                <label for="shipping_billing_same">
                    {!! Form::checkbox('shipping_billing_same', null, true, ['id' => 'shipping_billing_same']) !!}
                    Same as shipping
                </label>
            </fieldset>
        </header>
        <div id="billing-address">
            <div class="row">
                @include('account.partials._address', ['prefix' => 'billing'])
            </div>
        </div>
        <fieldset class="buttons">
        {!! Form::button('Next', ['type' => 'submit']) !!}
        </fieldset>
    {!! Form::close() !!}
    @include('checkout.partials._totals')
@stop

@section('inline-scripts')
@stop
