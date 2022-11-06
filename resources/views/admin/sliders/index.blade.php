@extends('admin.layouts.master')

@section('content')
<div class="section-head">
    <div class="content">
        <h2 class="mb-2">Sliders</h2>
        <div class="text-sm md:text-base">
            <p>Manage Sliders.</p>
        </div>
    </div>
    {!! Form::button('New slider', ['data-target' => 'create-record-form', 'class' => 'button button green flex-shrink-0 create-record']) !!}
</div>

<div class="card-group">
    <div class="card-col w-full">
        <div class="card">
            @if (count($sliders) > 0)
                <ul data-context="sliders" class="list-hierarchy">
                @foreach($sliders as $slider)
                    <li id="{!! $slider->id !!}">
                        <span>
                            <a href="{!! url('admin/sliders/' . $slider->id . '/edit') !!}" title="Edit slider">{!! $slider->name !!}</a>
                            <span class="buttons">
                                <a href="{!! url('admin/sliders/' . $slider->id . '/edit') !!}" class="text-green-500 mr-2" title="Edit slider"><i class="fa fa-edit"></i></a>
                                <a href="{!! url('admin/sliders/' . $slider->id . '/delete') !!}" class="text-red-500 delete-confirm" title="Delete slider"><i class="fa fa-trash"></i></a>
                            </span>
                        </span>
                    </li>
                @endforeach
                </ul>
            @else
                <span class="list-empty">There are no sliders to display.</span>
            @endif
        </div>
    </div>
</div>
@stop

@section('templates')
<div id="overlay"></div>
{!! Form::open(['route' => 'admin.sliders.create', 'id' => 'create-record-form', 'class' => 'card modal max-w-2xl' . (count($errors) ? ' errors' : '')]) !!}
    <header class="mb-4 px-1">
        <h3>Create a new slider</h3>
    </header>
    <div>
        <fieldset class="mb-6 px-1">
            {!! Form::label('label', 'Slider title', ['class' => 'field-label']) !!}
            {!! Form::text('name', '', ['id' => 'name', 'class' => 'field-input', 'placeholder' => 'Slider title', 'data-validation' => 'req']) !!}
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
