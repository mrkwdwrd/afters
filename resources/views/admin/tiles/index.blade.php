@extends("admin.layouts.master")

@section('content')
<div class="section-head">
    <div class="content">
        <h2 class="mb-2">Tiles</h2>
    </div>
    {!! Form::button('New tile', ['id' => 'create-record', 'data-target' => 'create-record-form', 'class' => 'button button green flex-shrink-0 create-record']) !!}
</div>

<div class="card-group">
    <div class="card-col w-full">
        <div class="card">
            @if (count($tiles) > 0)
                <ul class="list-hierarchy">
                    @foreach($tiles as $tile)
                        <li>
                            <span>
                                <a href="{!! url('admin/tiles/'.$tile->id.'/edit') !!}" title="Edit tile">{!! $tile->name !!}</a>
                                <span class="buttons">
                                    <a href="{!! url('admin/tiles/'.$tile->id.'/edit') !!}" class="text-green-500 mr-2" title="Edit tile"><i class="fa fa-edit"></i></a>
                                    <a href="{!! url('admin/tiles/'.$tile->id.'/delete') !!}" class="text-red-500 delete-confirm" title="Delete tile"><i class="fa fa-trash"></i></a>
                                </span>
                            </span>
                        </li>
                    @endforeach
                </ul>
            @else
                <span class="list-empty">There are no tiles to display.</span>
            @endif
        </div>
    </div>
</div>
@stop

@section('templates')
<div id="overlay"></div>
{!! Form::open(['route' => 'admin.tiles.create', 'id' => 'create-record-form', 'class' => 'card modal max-w-2xl' . (count($errors) ? ' errors' : '')]) !!}
    <header class="mb-4 px-1">
        <h3>Create a new tile</h3>
    </header>
    <div>
        <fieldset class="mb-6 px-1">
            {!! Form::label('name', 'Name', ['class' => 'field-label']) !!}
            {!! Form::text('name', '', ['id' => 'name', 'class' => 'field-input', 'placeholder' => 'Tile name', 'data-validation' => 'req']) !!}
            <span class="field-error">{!! $errors->first('name') !!}</span>
            <span class="field-tip">Not displayed to customers. For internal reference only.</span>
        </fieldset>
        <fieldset class="px-1">
            {!! Form::button('Create', ['type' => 'submit', 'class' => 'button green']) !!}
            <a id="cancel-create-record" class="button red thin" role="cancel-create-record">Cancel</a>
        </fieldset>
    </div>
{!! Form::close() !!}
@stop

@section('scripts')
@stop
