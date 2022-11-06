@extends('admin.layouts.master')

@section('content')
<div class="section-head">
    <div class="content">
        <h2 class="mb-2">Users </h2>
        <div class="text-sm md:text-base">
            <p>Manage Users.</p>
        </div>
    </div>
    {!! Form::button('New user', ['data-target' => 'create-record-form', 'class' => 'button green flex-shrink-0 create-record']) !!}
</div>

<div class="card-group">
    <div class="card-col w-full">
        <div class="card">
            <div class="flex flex-wrap">
                {!! Form::open(['route' => request()->route()->getName(), 'class' => 'w-3/4', 'method' => 'GET']) !!}
                    <div class="w-full flex">
                        <div class="flex-auto px-2">
                            {!! Form::label('search_field', 'Field to Search', ['class' => 'field-label']) !!}
                            {!! Form::select("search_field", ["email" => "Email", "first_name" => "First Name", "surname" => "Surname", "username" => "Username"], request()->search_field, ['class' => 'field-input small flex-auto sort-index', 'placeholder' => 'Search...']) !!}
                        </div>
                        <div class="flex-auto px-2">
                            {!! Form::label('search', 'Search Term', ['class' => 'field-label']) !!}
                            {!! Form::text("search", request()->search, ['id' => 'search', 'class' => 'field-input small flex-auto']) !!}
                        </div>
                    </div>
                    <div class="w-full flex items-center px-2 mt-4">
                        {!! Form::submit('Search', ['class' => 'button blue light py-2 px-4 block']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="card my-5">
            @if($users->count() > 0)
                {!! $users->links()->with(request()->all()) !!}

                <div class="table-container overflow-scroll">
                    <table class="w-full" style="min-width: 900px;">
                        <thead>
                            <tr>
                                <th class="border-gray-400 border-solid border text-sm text-gray-800 font-medium py-2 px-4 bg-gray-100">Name</th>
                                <th class="border-gray-400 border-solid border text-sm text-gray-800 font-medium py-2 px-4 bg-gray-100">Username</th>
                                <th class="border-gray-400 border-solid border text-sm text-gray-800 font-medium py-2 px-4 bg-gray-100">Email</th>
                                <th class="border-gray-400 border-solid border text-sm text-gray-800 font-medium py-2 px-4 bg-gray-100"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="border-gray-400 border-solid border py-2 px-4 text-gray-700 text-sm"><a href="/admin/users/{{$user->id}}/edit" class="text-blue-500">{{$user->name}}</a></td>
                                    <td class="border-gray-400 border-solid border py-2 px-4 text-gray-700 text-sm">{{$user->username}}</td>
                                    <td class="border-gray-400 border-solid border py-2 px-4 text-gray-700 text-sm">{{$user->email}}</td>
                                    <td class="border-gray-400 border-solid border py-2 px-4 text-gray-700 text-sm">
                                        <span class="buttons">
                                            <a href="{!! url('admin/users/'.$user->id.'/edit') !!}" class="text-green-500 mr-2" title="Edit user"><i class="fa fa-edit"></i></a>
                                            <a href="{!! url('admin/users/'.$user->id.'/delete') !!}" class="text-red-500 delete-confirm" title="Delete user"><i class="fa fa-trash"></i></a>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {!! $users->links()->with(request()->all()) !!}
            @else
                <span class="empty">There are no users to display</span>
            @endif
        </div>
    </div>
</div>
@stop

@section('templates')
<div id="overlay"></div>
{!! Form::open(['route' => 'admin.users.create', 'id' => 'create-record-form', 'class' => 'card modal max-w-2xl' . (count($errors) ? ' errors' : '')]) !!}
    <header class="mb-4 px-1">
        <h3>Create a new user</h3>
    </header>
    <div class="flex flex-wrap w-full">
        <fieldset class="mb-4 px-1 w-1/2">
            {!! Form::label('first_name', 'First name', ['class' => 'field-label']) !!}
            {!! Form::text('first_name', '', ['id' => 'first_name', 'class' => 'field-input', 'placeholder' => 'First name', 'data-validation' => 'req']) !!}
            <span class="field-error">{!! $errors->first('first_name') !!}</span>
        </fieldset>
        <fieldset class="mb-4 px-1 w-1/2">
            {!! Form::label('surname', 'Surname', ['class' => 'field-label']) !!}
            {!! Form::text('surname', '', ['id' => 'surname', 'class' => 'field-input', 'placeholder' => 'Surname', 'data-validation' => 'req']) !!}
            <span class="field-error">{!! $errors->first('surname') !!}</span>
        </fieldset>
        <fieldset class="mb-4 px-1 w-full">
            {!! Form::label('email', 'Email', ['class' => 'field-label']) !!}
            {!! Form::text('email', '', ['id' => 'email', 'class' => 'field-input', 'placeholder' => 'Email address', 'data-validation' => 'req']) !!}
            <span class="field-error">{!! $errors->first('email') !!}</span>
        </fieldset>
        <fieldset class="mb-6 px-1 w-full">
            {!! Form::label('password', 'Password', ['class' => 'field-label']) !!}
            {!! Form::password('password', ['id' => 'password', 'class' => 'field-input', 'placeholder' => 'Password', 'data-validation' => 'req']) !!}
            <span class="field-error">{!! $errors->first('password') !!}</span>
        </fieldset>
        <fieldset class="px-1">
            {!! Form::button('Create', ['type' => 'submit', 'class' => 'button green']) !!}
            <a role="cancel-create-record" class="button red thin">Cancel</a>
        </fieldset>
    </div>
{!! Form::close() !!}
@stop

@section('scripts')
@stop
