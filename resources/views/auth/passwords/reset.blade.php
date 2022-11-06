@extends('admin.layouts.auth')

@section('content')
<div class="card-col w-full">
    {!! Form::open(['url' => route('password.update'), 'id' => 'password-reset-form', 'class' => 'card']) !!}
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <fieldset class="mb-6 px-1 w-full">
            {!! Form::label('email', 'Email *', ['class' => 'field-label']) !!}
            {!! Form::text('email', null, ['id' => 'email', 'class' => 'field-input', 'placeholder' => 'Email', 'data-validation' => 'req']) !!}
            <span class="field-error">{!! $errors->first('email') !!}</span>
        </fieldset>
        <fieldset class="mb-6 px-1 w-full">
            {!! Form::label('password', 'New Password *', ['class' => 'field-label']) !!}
            {!! Form::password('password', ['id' => 'password', 'class' => 'field-input', 'placeholder' => 'Password', 'data-validation' => 'req']) !!}
            <span class="field-error">{!! $errors->first('password') !!}</span>
        </fieldset>
        <fieldset class="mb-6 px-1 w-full">
            {!! Form::label('password-confirm', 'Confirm Password *', ['class' => 'field-label']) !!}
            {!! Form::password('password_confirmation', ['id' => 'password-confirm', 'class' => 'field-input', 'placeholder' => 'Confirm Password', 'data-validation' => 'req']) !!}
        </fieldset>
        <fieldset class="mb-2 px-1">
            {!! Form::button('Reset password', ['type' => 'submit', 'class' => 'w-full button green']) !!}
        </fieldset>
    {!! Form::close() !!}
    <a href={!! route('login') !!}>Back to login</a>
    @include('admin.partials._messages')
</div>
@stop
