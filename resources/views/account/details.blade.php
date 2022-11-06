@extends('layouts.master')
@section('main-class'){!! 'account details' !!}@stop

@section('introduction')
    <section>
        <h1>Your account</h1>
    </section>
@stop

@section('content')
    @include('account.partials._links', [ 'current' => 'details' ])
    <div class="container">
        {!! Form::model($user, ['route' => 'account.details', 'method' => 'POST']) !!}
            <div class="row">
                <fieldset>
                    {!! Form::label('first_name', 'First Name') !!}
                    {!! Form::text('first_name', null) !!}
                    <span class="error">{!! $errors->first('first_name') !!}</span>
                </fieldset>

                <fieldset>
                    {!! Form::label('surname', 'Surname') !!}
                    {!! Form::text('surname', null) !!}
                    <span class="error">{!! $errors->first('surname') !!}</span>
                </fieldset>
            </div>

            <fieldset>
                {!! Form::label('email', 'Email') !!}
                {!! Form::text('email', null) !!}
                <span class="error">{!! $errors->first('email') !!}</span>
            </fieldset>

            {!! Form::button('Update', ['type' => 'submit']) !!}
        {!! Form::close() !!}
    </div>
@stop
