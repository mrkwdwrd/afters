@extends('admin.layouts.master')

@section('content')
<a href="{!! url('admin/shipping') !!}" title="Shipping" class="block text-xs font-semibold text-gray-600 hover:text-blue-500 -mb-2"><i class="fa fa-caret-left mr-2"></i>Back to shipping</a>
{!! Form::model($shippingItem, ['route' => ['admin.shipping.items.update', $shippingItem->id], 'method' => 'PUT',  'enctype' => 'multipart/form-data']) !!}
    <div class="section-head">
        <div class="content">
            <h2 class="mb-2">Edit shipping item</h2>
        </div>
        {!! Form::submit('Save shipping item', ['class' => 'button blue flex-shrink-0']) !!}
    </div>

    <div class="card-group mb-5">
        <div class="card-col w-full">
            <div class="card">
                <div class="flex flex-wrap">
                    <div class="flex flex-wrap w-full">
                        <fieldset class="mb-6 px-1 w-full">
                            {!! Form::label('name', 'Name', ['class' => 'field-label']) !!}
                            {!! Form::text('name', null, ['class' => 'field-input']) !!}
                            <span class="field-error">{!! $errors->first('name') !!}</span>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-head">
        <div class="content">
            <h3 class="mb-2">Shipping methods</h3>
        </div>
    </div>

    <div class="card-group mb-5">
        @if (count($shippingMethods))
            @foreach($shippingMethods as $method)
            <div class="card-col w-1/3">
                <div class="card">
                    <div class="flex flex-wrap">
                        <div class="flex flex-wrap w-full justify-between">
                            <h4>{!! $method->name !!}</h4>
                            <a href="{!! url('/admin/shipping/items/' . $shippingItem->id . '/methods/' . $method->id . '/charges') !!}" class="button green">Edit Charges</a>
                        </div>
                        <div>
                            @if ($method->isEnabledForItem($shippingItem->id))
                                <span class="field-tip">
                                    Enabled for: {!! $method->enabledCounrtiesForItemString($shippingItem->id) !!}
                                </span>
                            @else
                                <span class="field-tip">Not currently enabled for this item.</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <span class="list-empty">There are no shipping methods to display.</span>
        @endif
    </div>

{!! Form::close() !!}
@stop

@section('scripts')
@stop
