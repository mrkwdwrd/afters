@extends('admin.layouts.master')

@section('content')
<div class="section-head">
    <div class="content">
        <h2 class="mb-2">Accordions</h2>
        <div class="text-sm md:text-base">
            <p>Manage Accordions.</p>
        </div>
    </div>
    {!! Form::button('New accordion', ['data-target' => 'create-record-form', 'class' => 'button button green flex-shrink-0 create-record']) !!}
</div>

<div class="card-group">
    <div class="card-col w-full">
        <div class="card">
            @if (count($accordions) > 0)
                <ul data-context="accordions" class="list-hierarchy">
                    @foreach($accordions as $accordion)
                        <li id="{!! $accordion->id !!}">
                            <span>
                                <a href="{!! url('admin/accordions/' . $accordion->id . '/edit') !!}" title="Edit accordion">{!! $accordion->name !!}</a>
                                <span class="buttons">
                                    <a href="{!! url('admin/accordions/' . $accordion->id . '/edit') !!}" class="text-green-500 mr-2" title="Edit accordion"><i class="fa fa-edit"></i></a>
                                    <a href="{!! url('admin/accordions/' . $accordion->id . '/delete') !!}" class="text-red-500 delete-confirm" title="Delete accordion"><i class="fa fa-trash"></i></a>
                                </span>
                            </span>
                        </li>
                    @endforeach
                </ul>
            @else
                <span class="list-empty">There are no accordions to display.</span>
            @endif
        </div>
    </div>
</div>
@stop

@section('templates')
<div id="overlay"></div>
{!! Form::open(['route' => 'admin.accordions.create', 'id' => 'create-record-form', 'class' => 'card modal max-w-2xl' . (count($errors) ? ' errors' : '')]) !!}
    <header class="mb-4 px-1">
        <h3>Create a new accordion</h3>
    </header>
    <div>
        <fieldset class="mb-6 px-1">
            {!! Form::label('name', 'Title', ['class' => 'field-label']) !!}
            {!! Form::text('name', '', ['id' => 'name', 'class' => 'field-input', 'placeholder' => 'Accordion title', 'data-validation' => 'req']) !!}
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
