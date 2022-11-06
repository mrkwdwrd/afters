@extends('layouts.master')
@section('main-class'){!! 'account password' !!}@stop

@section('introduction')
    <section>
        <h1>Your account</h1>
    </section>
@stop

@section('content')
    @include('account.partials._links', [ 'current' => 'password' ])

    {!! Form::open(['route' => 'account.password', 'method' => 'POST']) !!}
        <fieldset>
            {!! Form::label('current_password', 'Current Password') !!}
            {!! Form::password('current_password', null) !!}
            <span class="error">{!! $errors->first('current_password') !!}</span>
        </fieldset>
        <fieldset>
            {!! Form::label('password1', 'New Password') !!}
            {!! Form::password('password1', null) !!}
            <span class="error">{!! $errors->first('password1') !!}</span>
        </fieldset>
        <fieldset>
            {!! Form::label('password2', 'Confirm Password') !!}
            {!! Form::password('password2', null) !!}
            <span class="error">{!! $errors->first('password2') !!}</span>
        </fieldset>
        {!! Form::button('Update Password', ['type' => 'submit']) !!}
    {!! Form::close() !!}

@stop
