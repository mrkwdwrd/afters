@extends("admin.layouts.master")

@section('content')
<div class="section-head">
    <div class="content">
        <h2 class="mb-2">Media Releases</h2>
    </div>
    {!! Form::button('New media release', ['id' => 'create-record', 'data-target' => 'create-record-form', 'class' => 'button button green flex-shrink-0 create-record']) !!}
</div>

<div class="card-group">
    <div class="card-col w-full">
        <div class="card">
            @if (count($mediaReleases))
                <ul class="list-hierarchy">
                    @foreach($mediaReleases as $mediaRelease)
                        <li data-id="{{$mediaRelease->id}}">
                            <span>
                                <a href="{!! url('admin/media-releases/' . $mediaRelease->id . '/edit') !!}" title="Edit media release">{!! $mediaRelease->title !!}</a>
                                <span class="buttons">
                                    <a href="{!! url('admin/media-releases/' . $mediaRelease->id . '/edit') !!}" class="text-green-500 mr-2" title="Edit media release"><i class="fa fa-edit"></i></a>
                                    <a href="{!! url('admin/media-releases/' . $mediaRelease->id . '/delete') !!}" class="text-red-500 delete-confirm" title="Delete media release"><i class="fa fa-trash"></i></a>
                                </span>
                            </span>
                        </li>
                    @endforeach
                </ul>

                {!! $mediaReleases->links() !!}
            @else
                <span class="list-empty">There are no media releases to display.</span>
            @endif
        </div>
    </div>
</div>
@stop

@section('templates')
<div id="overlay"></div>
{!! Form::open(['route' => 'admin.media-releases.create', 'id' => 'create-record-form', 'class' => 'card modal max-w-2xl' . (count($errors) ? ' errors' : '')]) !!}
    <header class="mb-4 px-1">
        <h3>Create a new media release</h3>
    </header>
    <div>
        <fieldset class="mb-6 px-1">
            {!! Form::label('title', 'Title', ['class' => 'field-label']) !!}
            {!! Form::text('title', null, ['id' => 'title', 'class' => 'field-input', 'placeholder' => 'Title']) !!}
            <span class="field-error">{!! $errors->first('title') !!}</span>
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
