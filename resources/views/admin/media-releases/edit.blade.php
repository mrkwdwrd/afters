@extends("admin.layouts.master")

@section('content')
{!! Form::open(['route' => ['admin.notifications.update', $notification->id], 'method' => 'POST',  'enctype' => 'multipart/form-data']) !!}
    <div class="section-head">
        <div class="content">
            <h2 class="mb-2">Edit notification</h2>
        </div>
        {!! Form::submit('Save notification', ['class' => 'button blue flex-shrink-0']) !!}
    </div>

    <div class="card-group mb-5">
        <div class="card-col w-full">
            <div class="card">
                <div class="flex flex-wrap">
                    <div class="flex flex-wrap w-full">
                        <fieldset class="mb-6 px-1 w-full">
                            {!! Form::label('notification', 'Notification', ['class' => 'field-label']) !!}
                            {!! Form::text('notification', $notification->notification, ["class" => "field-input"]) !!}
                            <span class="field-error">{!! $errors->first('notification') !!}
                        </fieldset>
                        <fieldset class="mb-6 px-1 w-1/2">
                            {!! Form::label('display_from', 'Display From', ['class' => 'field-label']) !!}
                            {!! Form::text('display_from', $notification->display_from ? $notification->display_from : null, ['id' => 'display_from', 'class' => 'field-input flatpickr', 'data-enable-time' => 'true']) !!}
                            <span class="field-error">{!! $errors->first('display_from') !!}
                        </fieldset>
                        <fieldset class="mb-6 px-1 w-1/2">
                            {!! Form::label('display_to', 'Display To', ['class' => 'field-label']) !!}
                            {!! Form::text('display_to', $notification->display_to ? $notification->display_to : null, ['id' => 'display_to', 'class' => 'field-input flatpickr', 'data-enable-time' => 'true']) !!}
                            <span class="field-error">{!! $errors->first('display_to') !!}
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}
@stop

@section('templates')
@stop

@section('scripts')
@stop
