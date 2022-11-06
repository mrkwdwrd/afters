@extends('layouts.master')

@section('page-title'){!! 'Registration' !!}@stop
@section('page-id'){!! 'register' !!}@stop
@section('main-class'){!! 'account register' !!}@stop

@section('introduction')
    <section>
        <h1>Create your account</h1>
    </section>
@stop

@section('content')
<div class="container">
    {!! Form::open(['route' => 'register',  'method' => 'POST']) !!}
        @csrf
        <div class="row">
            <fieldset>
                {!! Form::label('first_name', 'First Name') !!}
                {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'required']) !!}
                <span class="error">{!! $errors->first('first_name') !!}</span>
            </fieldset>
            <fieldset>
                {!! Form::label('surname', 'Surname') !!}
                {!! Form::text('surname', old('surname'), ['class' => 'form-control', 'required']) !!}
                <span class="error">{!! $errors->first('surname') !!}</span>
            </fieldset>
        </div>
        <fieldset>
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', old('email'), ['class' => 'form-control', 'required']) !!}
            <span class="error">{!! $errors->first('email') !!}</span>
        </fieldset>
        <fieldset>
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', null, ['class' => 'form-control', 'required']) !!}
            <span class="error">{!! $errors->first('password') !!}</span>
        </fieldset>

        <fieldset>
            {!! Form::label('password_confirmation', 'Confirm Password') !!}
            {!! Form::password('password_confirmation', null, ['class' => 'form-control', 'required']) !!}
            <span class="error">{!! $errors->first('password_confirmation') !!}</span>
        </fieldset>
        <fieldset class="buttons">
            {!! Form::button('Create Account', ['class' => 'button', 'type' => 'submit']) !!}
        </fieldset>

    {!! Form::close() !!}
    <p>Already have an account? <a href="{!! url('login') !!}">Log in here</a>.</p>
</div>
@stop

@section('inline-scripts')
@stop
