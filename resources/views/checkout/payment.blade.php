@extends('layouts.master')

@section('main-class'){!! 'checkout payment' !!}@stop

@section('introduction')
    <section>
    </section>
@stop

@section('content')
<div class="container">
    <div class="row">
        {!! Form::open(['route' => 'checkout.payment', 'method' => 'POST', 'id' => 'checkout-payment']) !!}
            <header class="row">
                <h2>Select your payment method</h2>
            </header>
            <label>{!! Form::radio('payment_method', 'credit_card', ['checked']) !!} Credit Card</label>
            <label>{!! Form::radio('payment_method', 'paypal') !!} PayPal</label>
            @if($errors->has('payment_method'))
                <span class='error'>{!! $errors->first('payment_method') !!}</span>
            @endif
            <div class="payment-method" id="credit_card">
                <fieldset>
                    {!! Form::label('card_name', 'Name on Card') !!}
                    {!! Form::text('card_name', null, ['id' => 'card_name']) !!}
                    <span class="error">{!! $errors->first('card_name') !!}</span>
                </fieldset>

                <fieldset>
                    {!! Form::label('card_number', 'Credit Card Number') !!}
                    {!! Form::text('card_number', null, ['id' => 'card_number']) !!}
                    <span class="error">{!! $errors->first('card_number') !!}</span>
                </fieldset>
                <div class="row">
                <fieldset>
                    {!! Form::label('card_expiry', 'Expiry') !!}
                    <div class="row">
                        {!! Form::text('card_expiry_month', null, ['id' => 'card_expiry_month', 'placeholder' => 'MM']) !!}
                        {!! Form::text('card_expiry_year', null, ['id' => 'card_expiry_year', 'placeholder' => 'YYYY']) !!}
                    </div>
                    <span class="error">{!! $errors->first('card_expiry_month') !!} {!! $errors->first('card_expiry_year') !!}</span>
                </fieldset>
                <fieldset>
                    {!! Form::label('card_cvv', 'CVV') !!}
                    {!! Form::text('card_cvv', null, ['id' => 'card_cvv']) !!}
                    <span class="error">{!! $errors->first('card_cvv') !!}</span>
                </fieldset>
                </div>
            </div>

            <div class="payment-method" id="paypal" hidden>
                <div class="message">
                    <p>You will be redirected to PayPal to complete your purchase.</p>
                    <p>Do not close your browser until after you have been redirected back to this site.</p>
                </div>
            </div>
            {!! Form::button('Process Payment', ['class' => 'button full-button', 'type' => 'submit']) !!}
        {!! Form::close() !!}

        @include('checkout.partials._totals')
    </div>
</div>
@stop


@section("inline-scripts")
    <script type="text/javascript">
        $(document).on('change', 'input[name=payment_method]', function (e) {
            $('.payment-method').hide();
            $('.payment-method#' + e.target.value).show();
        });
    </script>
@stop
