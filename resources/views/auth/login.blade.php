@extends('admin.layouts.auth')

@section('page-title'){!! 'Log in' !!}@stop
@section('page-id'){!! 'login' !!}@stop
@section('main-class'){!! 'account login' !!}@stop

@section('introduction')
    <section>
        <h1>Log in to your account</h1>
    </section>
@stop

@section('content')
<div class="card-col w-full">
    {!! Form::open(['url' => 'login', 'class' => 'card']) !!}
        @csrf
        <fieldset class="mb-6 px-1 w-full">
            {!! Form::label('email', 'Email *', ['class' => 'field-label']) !!}
            {!! Form::text('email', null, ['id' => 'email', 'class' => 'field-input', 'placeholder' => 'Email', 'data-validation' => 'req']) !!}
            <span class="field-error">{!! $errors->first('email') !!}</span>
        </fieldset>
        <fieldset class="mb-4 px-1 w-full">
            {!! Form::label('password', 'Password *', ['class' => 'field-label']) !!}
            {!! Form::password('password', ['id' => 'password', 'class' => 'field-input', 'placeholder' => 'Password', 'data-validation' => 'req']) !!}
            <span class="field-error">{!! $errors->first('password') !!}</span>
        </fieldset>
        <fieldset class="mb-6 px-1 w-full">
            <label class="set-label">
                <input class="set-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                Remember Me
            </label>
        </fieldset>
        <fieldset class="mb-2 px-1">
            {!! Form::button('Login', ['type' => 'submit', 'class' => 'w-full button green']) !!}
        </fieldset>
    {!! Form::close() !!}
    <a href={{ route('password.request') }}>Forgot your password?</a>
    @include('admin.partials._messages')
</div>
@stop
