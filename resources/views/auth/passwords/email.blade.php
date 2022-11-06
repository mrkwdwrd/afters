@extends('admin.layouts.auth')

@section('page-title'){{ 'Forgotten password' }}@stop

@section('page-id'){{ 'password' }}@stop

@section('content')
<div class="card-col w-full">
    {!! Form::open(['url' => 'password/email', 'id' => 'password-reset-form', 'class' => 'card']) !!}
        <fieldset class="mb-6 px-1 w-full">
            {!! Form::label('email', 'Email *', ['class' => 'field-label']) !!}
            {!! Form::text('email', null, ['id' => 'email', 'class' => 'field-input', 'placeholder' => 'Email', 'data-validation' => 'req']) !!}
            <span class="field-error">{!! $errors->first('email') !!}</span>
        </fieldset>
        <fieldset class="mb-2 px-1">
            {!! Form::button('Send password reset link', ['type' => 'submit', 'class' => 'w-full button green']) !!}
        </fieldset>
    {!! Form::close() !!}
    <a href={!! route('login') !!}>Back to login</a>
</div>
@include('admin.partials._messages')
@stop
