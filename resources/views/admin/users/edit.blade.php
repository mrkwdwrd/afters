@extends('admin.layouts.master')

@section('content')
<a href="{!! url('admin/users') !!}" title="Users" class="block text-xs font-semibold text-gray-600 hover:text-blue-500 -mb-2"><i class="fa fa-caret-left mr-2"></i>Back to users</a>
{!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'PUT',  'enctype' => 'multipart/form-data']) !!}
    <div class="section-head">
        <div class="content">
            <h2 class="mb-2">{{ $user->id === Auth::user()->id ? 'Edit your account' : 'Edit user' }}</h2>
        </div>
        {!! Form::submit('Save user', ['class' => 'button blue flex-shrink-0']) !!}
    </div>

    <div class="card-group">
        <div class="card-col w-full md:w-2/3">
            <div class="card">
                <div class="flex flex-wrap">
                    <fieldset class="mb-6 px-1 w-1/2">
                        {!! Form::label('first_name', 'First Name', ['class' => 'field-label']) !!}
                        {!! Form::text('first_name', $user->first_name, ['class' => 'field-input']) !!}
                        <span class="field-error">{!! $errors->first('first_name') !!}</span>
                    </fieldset>
                    <fieldset class="mb-6 px-1 w-1/2">
                        {!! Form::label('surname', 'Surname', ['class' => 'field-label']) !!}
                        {!! Form::text('surname', $user->surname, ['class' => 'field-input']) !!}
                        <span class="field-error">{!! $errors->first('surname') !!}</span>
                    </fieldset>
                    <fieldset class="mb-6 px-1 w-full">
                        {!! Form::label('email', 'Email', ['class' => 'field-label']) !!}
                        {!! Form::text('email', $user->email, ['class' => 'field-input']) !!}
                        <span class="field-error">{!! $errors->first('email') !!}</span>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="card-col w-full md:w-1/3">
          <div class="card">
            <h3 class="mb-6 px-1">Update Password</h3>
            @if($user->id === Auth::user()->id)
                <fieldset class="mb-6 px-1">
                    {!! Form::label('password', 'Password', ['class' => 'field-label']) !!}
                    {{ Form::password('password',  ['class' => 'field-input', 'placeholder' => 'New password']) }}
                    <span class="field-error">{!! $errors->first('password') !!}</span>
                </fieldset>

                <fieldset class="mb-6 px-1">
                    {!! Form::label('password_confirmation', 'Password Confirmation', ['class' => 'field-label']) !!}
                    {{ Form::password('password_confirmation',  ['class' => 'field-input', 'placeholder' => 'Password confirmation']) }}
                    <span class="field-error">{!! $errors->first('password_confirmation') !!}</span>
                </fieldset>
            @else
                <p class="mb-6 px-1">Send this user instructions on how to reset their password.</p>
                <a href="{!! url('admin/users/' . $user->id . '/reset') !!}" class="button bg-green-500 hover:bg-green-600 text-white  font-bold py-4 px-8 rounded block text-center w-full">Send password reset</a>
            @endif
          </div>
        </div>
    </div>
{!! Form::close() !!}

@stop

@section('templates')

@stop

@section('scripts')

@stop
