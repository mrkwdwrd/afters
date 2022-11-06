@extends('layouts.master')

@section('page-title'){{ 'Checkout' }}@stop
@section('page-id'){{ 'checkout' }}@stop
@section('main-class'){{ 'checkout email' }}@stop

@section('content')
<section>
    <div class="login">
        <h2>Login</h2>
        {!! Form::open(['url' => 'login', 'class' => 'card']) !!}
            @csrf

            {!! Form::label('email', 'Email *') !!}
            {!! Form::text('email', null, ['id' => 'email', 'placeholder' => 'Email']) !!}
            <span class="error">{!! $errors->first('email') !!}</span>

            {!! Form::label('password', 'Password *') !!}
            {!! Form::password('password', ['id' => 'password', 'class' => 'field-input', 'placeholder' => 'Password']) !!}
            <span class="error">{!! $errors->first('password') !!}</span>

            <label for="remember">
                <input type="checkbox" name="remember" id="remember" {!! old('remember') ? 'checked' : '' !!}>
                Remember Me
            </label>
            {!! Form::button('Login to Account', ['type' => 'submit']) !!}
        {!! Form::close() !!}

        <a href="{!! route('password.request') !!}">Forgot your password?</a>
    </div>
    <div class="guest">
        <h2>Guest Checkout</h2>
        {!! Form::open(['route' => 'checkout.email', 'method' => 'POST']) !!}
            <header class="row">
                <h2>Guest Checkout</h2>
            </header>
            <fieldset>
                {!! Form::label('email', 'Email Address') !!}
                {!! Form::text('email', $order->email, ['placeholder' => 'Email']) !!}
                <span class="{!! $errors->has('email') ? 'error' : '' !!}">{!! $errors->first('email') !!}</span>
            </fieldset>
            <fieldset>
                {!! Form::button('Checkout as Guest', ['type' => 'submit']) !!}
                <p>Don't have an account? <a href="{!! url('register') !!}">Sign up for one here</a>.</p>
            </fieldset>
        {!! Form::close() !!}
    </div>
</section>
@stop


@section('inline-scripts')
@stop
