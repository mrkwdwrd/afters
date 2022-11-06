@extends('admin.layouts.master')

@section('content')
<div class="section-head">
    <div class="content">
        <h2 class="mb-2">Shipping</h2>
        <div class="text-sm md:text-base">
            <p>Manage shipping items and methods</p>
        </div>
    </div>
    <span>
        {!! Form::button('New shipping item', ['data-target' => 'create-item-form', 'class' => 'button button green flex-shrink-0 create-record']) !!}
        {!! Form::button('New shipping method', ['data-target' => 'create-method-form', 'class' => 'button button green flex-shrink-0 create-record']) !!}
    </span>
</div>

<div class="card-group content-start">
    <div class="card-col w-full md:w-1/2 content-start">
        <div class="card-head">
            <h4>Shipping items</h4>
        </div>
        <div class="card">
            @if (count($shippingItems) > 0)
                <ul data-context="shipping" class="list-hierarchy">
                @foreach($shippingItems as $item)
                    <li id="{!! $item->id !!}">
                        <span>
                            <a href="{!! url('admin/shipping/items/' . $item->id . '/edit') !!}" title="Edit shipping method">{!! $item->name !!}</a>
                            <span class="buttons">
                                <a href="{!! url('admin/shipping/items/' . $item->id . '/edit') !!}" class="text-green-500 mr-2" title="Edit shipping item"><i class="fa fa-edit"></i></a>
                                <a href="{!! url('admin/shipping/items/' . $item->id . '/delete') !!}" class="text-red-500 delete-confirm" title="Delete shipping item"><i class="fa fa-trash"></i></a>
                            </span>
                        </span>
                    </li>
                @endforeach
                </ul>
            @else
                <span class="list-empty">There are no shipping items to display.</span>
            @endif
        </div>
    </div>
    <div class="card-col w-full md:w-1/2 content-start">
        <div class="card-head">
            <h4>Shipping methods</h4>
        </div>
        <div class="card">
            @if (count($shippingMethods) > 0)
                <ul data-context="shipping" class="list-hierarchy">
                @foreach($shippingMethods as $method)
                    <li id="{!! $method->id !!}">
                        <span>
                            <a href="{!! url('admin/shipping/methods/' . $method->id . '/edit') !!}" title="Edit shipping method">{!! $method->name !!}</a>
                            <span class="buttons">
                                <a href="{!! url('admin/shipping/methods/' . $method->id . '/edit') !!}" class="text-green-500 mr-2" title="Edit shipping method"><i class="fa fa-edit"></i></a>
                                <a href="{!! url('admin/shipping/methods/' . $method->id . '/delete') !!}" class="text-red-500 delete-confirm" title="Delete shipping method"><i class="fa fa-trash"></i></a>
                            </span>
                        </span>
                    </li>
                @endforeach
                </ul>
            @else
                <span class="list-empty">There are no shipping methods to display.</span>
            @endif
        </div>
    </div>
</div>
@stop

@section('templates')
<div id="overlay"></div>
{!! Form::open(['route' => 'admin.shipping.methods.create', 'id' => 'create-method-form', 'class' => 'card modal max-w-2xl' . (count($errors) ? ' errors' : '')]) !!}
    <header class="mb-4 px-1">
        <h3>Create a new shipping method</h3>
    </header>
    <div>
        <fieldset class="mb-6 px-1">
            {!! Form::label('name', 'Name', ['class' => 'field-label']) !!}
            {!! Form::text('name', '', ['id' => 'name', 'class' => 'field-input', 'placeholder' => 'Shipping method name', 'data-validation' => 'req']) !!}
            <span class="field-error">{!! $errors->first('name') !!}</span>
        </fieldset>
        <fieldset class="px-1">
            {!! Form::button('Create', ['type' => 'submit', 'class' => 'button green']) !!}
            <a role="cancel-create-record" class="button red thin">Cancel</a>
        </fieldset>
    </div>
{!! Form::close() !!}
{!! Form::open(['route' => 'admin.shipping.items.create', 'id' => 'create-item-form', 'class' => 'card modal max-w-2xl' . (count($errors) ? ' errors' : '')]) !!}
    <header class="mb-4 px-1">
        <h3>Create a new shipping item</h3>
    </header>
    <div>
        <fieldset class="mb-6 px-1">
            {!! Form::label('name', 'Name', ['class' => 'field-label']) !!}
            {!! Form::text('name', '', ['id' => 'name', 'class' => 'field-input', 'placeholder' => 'Shipping item name', 'data-validation' => 'req']) !!}
            <span class="field-error">{!! $errors->first('name') !!}</span>
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
