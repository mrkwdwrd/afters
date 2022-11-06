@extends('admin.layouts.master')

@section('content')
<div class="section-head">
    <div class="content">
        <h2 class="mb-2">People</h2>
        <div class="text-sm md:text-base">
            <p>Manage People.</p>
        </div>
    </div>
    {!! Form::button('New person', ['data-target' => 'create-record-form', 'class' => 'button button green flex-shrink-0 create-record']) !!}
</div>

<div class="card-group">
    <div class="card-col w-full">
        <div class="card">
            @if (count($people) > 0)
                <ul data-context="people" class="list-hierarchy">
                @foreach($people as $person)
                    <li id="{!! $person->id !!}">
                        <span>
                            <a href="{!! url('admin/people/' . $person->id . '/edit') !!}" title="Edit person">{!! $person->first_name . ' ' . $person->surname !!}</a>
                            <span class="buttons">
                                <a href="{!! url('admin/people/' . $person->id . '/edit') !!}" class="text-green-500 mr-2" title="Edit person"><i class="fa fa-edit"></i></a>
                                <a href="{!! url('admin/people/' . $person->id . '/delete') !!}" class="text-red-500 delete-confirm" title="Delete person"><i class="fa fa-trash"></i></a>
                            </span>
                        </span>
                    </li>
                @endforeach
                </ul>
            @else
                <span class="list-empty">There are no people to display.</span>
            @endif
        </div>
    </div>
</div>
@stop

@section('templates')
<div id="overlay"></div>
{!! Form::open(['route' => 'admin.people.create', 'id' => 'create-record-form', 'class' => 'card modal max-w-2xl' . (count($errors) ? ' errors' : '')]) !!}
    <header class="mb-4 px-1">
        <h3>Create a new person</h3>
    </header>
    <div>
        <fieldset class="mb-6 px-1">
            {!! Form::label('first_name', 'First name', ['class' => 'field-label']) !!}
            {!! Form::text('first_name', '', ['id' => 'first_name', 'class' => 'field-input', 'placeholder' => 'First name', 'data-validation' => 'req']) !!}
            <span class="field-error">{!! $errors->first('first_name') !!}</span>
        </fieldset>
        <fieldset class="mb-6 px-1">
            {!! Form::label('surname', 'Surname', ['class' => 'field-label']) !!}
            {!! Form::text('surname', '', ['id' => 'surname', 'class' => 'field-input', 'placeholder' => 'Surname', 'data-validation' => 'req']) !!}
            <span class="field-error">{!! $errors->first('surname') !!}</span>
        </fieldset>
        <fieldset class="px-1">
            {!! Form::button('Create', ['type' => 'submit', 'class' => 'button green']) !!}
            <a role="cancel-create-record" class="button red thin">Cancel</a>
        </fieldset>
    </div>
{!! Form::close() !!}
@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.list-hierarchy').sortable({
                cursor: 'move',
                placeholder: 'placeholder',
                forcePlaceholderSize: true,
                cancel: '.fr-box',
                stop: function(event, ui) {
                    i = ui.item;
                    s = i.parent();
                    p = s.parent();
                    sortOrder($(this), i, p, s);
                }
            });
        });

        function sortOrder(e, i, p, s) {
            var order = [];
            $(e).children().each(function() {
                order.push($(this).attr('id'));
            });

            $.ajax({
                type: 'POST',
                url: '/admin/people/sort-order',
                data: {
                    'order': order
                }
            }).done(function(response) {
                console.log(response);
            }).fail(function(response) {
                console.log('ajaxerror', response);
            });

            return false;
        }
    </script>
@stop
