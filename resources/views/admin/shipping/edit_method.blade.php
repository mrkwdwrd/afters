@extends('admin.layouts.master')

@section('content')
<a href="{!! url('admin/shipping') !!}" title="Shipping" class="block text-xs font-semibold text-gray-600 hover:text-blue-500 -mb-2"><i class="fa fa-caret-left mr-2"></i>Back to shipping</a>
{!! Form::model($shippingMethod, ['route' => ['admin.shipping.methods.update', $shippingMethod->id], 'method' => 'PUT',  'enctype' => 'multipart/form-data']) !!}
    <div class="section-head">
        <div class="content">
            <h2 class="mb-2">Edit shipping method</h2>
        </div>
        {!! Form::submit('Save shipping method', ['class' => 'button blue flex-shrink-0']) !!}
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

{!! Form::close() !!}
@stop

@section('scripts')
@stop
