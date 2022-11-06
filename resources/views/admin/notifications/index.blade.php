@extends("admin.layouts.master")

@section('content')
<div class="section-head">
    <div class="content">
        <h2 class="mb-2">Notifications</h2>
    </div>
    {!! Form::button('New notification', ['id' => 'create-record', 'data-target' => 'create-record-form', 'class' => 'button button green flex-shrink-0 create-record']) !!}
</div>

<div class="card-group">
    <div class="card-col w-full">
        <div class="card">
            @if (count($notifications) > 0)
                <ul class="list-hierarchy">
                    @foreach($notifications as $notification)
                        <li data-id="{{$notification->id}}">
                            <span>
                                <a href="{!! url('admin/notifications/'.$notification->id.'/edit') !!}" title="Edit insight">{!! $notification->extract !!}</a>
                                <span class="buttons">
                                    <a href="{!! url('admin/notifications/'.$notification->id.'/edit') !!}" class="text-green-500 mr-2" title="Edit notification"><i class="fa fa-edit"></i></a>
                                    <a href="{!! url('admin/notifications/'.$notification->id.'/delete') !!}" class="text-red-500 delete-confirm" title="Delete notification"><i class="fa fa-trash"></i></a>
                                </span>
                            </span>
                        </li>
                    @endforeach
                </ul>

                {!! $notifications->links() !!}
            @else
                <span class="list-empty">There are no notifications to display.</span>
            @endif
        </div>
    </div>
</div>
@stop

@section('templates')
<div id="overlay"></div>
{!! Form::open(['route' => 'admin.notifications.create', 'id' => 'create-record-form', 'class' => 'card modal max-w-2xl' . (count($errors) ? ' errors' : '')]) !!}
    <header class="mb-4 px-1">
        <h3>Create a new notification</h3>
    </header>
    <div>
        <fieldset class="mb-6 px-1">
            {!! Form::label('notification', 'Notification', ['class' => 'field-label']) !!}
            {!! Form::text('notification', null, ['id' => 'notification', 'class' => 'field-input', 'placeholder' => 'Enter your notification text here...', 'data-validation' => 'req']) !!}
            <span class="field-error">{!! $errors->first('notification') !!}</span>
        </fieldset>
        <fieldset class="px-1">
            {!! Form::button('Create', ['type' => 'submit', 'class' => 'button green']) !!}
            <a id="cancel-create-record" class="button red thin" role='cancel-create-record'>Cancel</a>
        </fieldset>
    </div>
{!! Form::close() !!}
@stop

@section('scripts')
@stop
