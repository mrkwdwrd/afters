@extends('layouts.master')
@section('main-class'){!! 'account address' !!}@stop

@section('introduction')
    <section>
        <h1>Your account</h1>
    </section>
@stop

@section('content')
    @include('account.partials._links', [ 'current' => 'address' ])

    {!! Form::model($user, ['route' => 'account.addresses', 'method' => 'POST', 'class' => 'container']) !!}
        <header class="row">
            <h3>Shipping Address</h3>
        </header>
        <div id="shipping-address">
            <div class="row">
                @include('account.partials._address', ['prefix' => 'shipping'])
            </div>
        </div>

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
            {!! Form::button('Update', ['type' => 'submit']) !!}
        </fieldset>
    {!! Form::close() !!}
@stop

@section('inline-scripts')
@stop
