@extends('admin.layouts.master')

@section('content')
<a href="{!! url('admin/people') !!}" title="People" class="block text-xs font-semibold text-gray-600 hover:text-blue-500 -mb-2"><i class="fa fa-caret-left mr-2"></i>Back to people</a>
{!! Form::model($person, ['route' => ['admin.people.update', $person->id], 'method' => 'PUT',  'enctype' => 'multipart/form-data']) !!}
    <div class="section-head">
        <div class="content">
            <h2 class="mb-2">Edit person</h2>
        </div>
        {!! Form::submit('Save person', ['class' => 'button blue flex-shrink-0']) !!}
    </div>

    <div class="w-full mt-8 mb-4 px-2">
        <h3>Person details</h3>
    </div>

    <div class="card-group">
        <div class="card-col w-full">
            <div class="card">
                <div class="flex flex-wrap">
                    <div class="flex flex-wrap w-full">
                        <fieldset class="mb-6 px-1 w-1/2">
                            {!! Form::label('first_name', 'First Name', ['class' => 'field-label']) !!}
                            {!! Form::text('first_name', $person->first_name, ['class' => 'field-input']) !!}
                            <span class="field-error">{!! $errors->first('first_name') !!}</span>
                        </fieldset>
                        <fieldset class="mb-6 px-1 w-1/2">
                            {!! Form::label('surname', 'Surname', ['class' => 'field-label']) !!}
                            {!! Form::text('surname', $person->surname, ['class' => 'field-input']) !!}
                            <span class="field-error">{!! $errors->first('surname') !!}</span>
                        </fieldset>
                        <fieldset class="mb-6 px-1 w-full">
                            {!! Form::label('slug', 'Slug', ['class' => 'field-label']) !!}
                            {!! Form::text('slug', $person->slug, ['class' => 'field-input']) !!}
                        </fieldset>
                        <fieldset class="mb-6 px-1 w-full">
                            {!! Form::label('title', 'Title', ['class' => 'field-label']) !!}
                            {!! Form::text('title', $person->title, ['class' => 'field-input']) !!}
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full mt-8 mb-4 px-2">
        <h3>Person content</h3>
    </div>
    <div class="card-group">
        <div class="card-col w-full">
            <div class="card">
                <div class="flex flex-wrap">
                <div class="w-full sm:w-3/4">
                    <fieldset class="mb-6 px-1">
                        {!! Form::label('page-content', 'Content', ['class' => 'field-label']) !!}
                        {!! Form::textarea('content', $person->content, ['class' => 'field-input', 'class' => 'froala_editor', 'placeholder' => 'Page Content', 'data-url' => '/admin/pages/'.$person->id]) !!}
                    </fieldset>
                </div>
                <div class="w-full sm:w-1/4">
                    <fieldset class="mb-6 px-1">
                        {!! Form::label('images', 'Image', ['class' => 'field-label']) !!}
                        <input type="file" name="images" data-fileuploader-files="{{ json_encode($media) }}">
                        <div id="image-preview">
                            @if($person->media->count() > 0)
                                @include("admin.people.partials._media", ["media" => $person->media->first()])
                            @endif
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}
@stop

@section('scripts')
    <script type="text/javascript">
        $('input[name="images"]').fileuploader({
            theme: null,
            addMore: true,
            extensions: ['jpg', 'jpeg', 'png', 'gif'],
            fileMaxSize: 2,
            changeInput: '<button class="button blue">Add images</button>',
            thumbnails: null,
            upload: {
                url: "{!! url('/admin/people/' . $person->id . '/image') !!}",
                data: null,
                type: 'POST',
                enctype: 'multipart/form-data',
                start: true,
                onSuccess: function(data, item, listEl, parentEl, newInputEl, inputEl, textStatus, jqXHR) {
                    $("#image-preview").html(data.view);
                }
            }
        });

        $(document).on('click', '.remove-media', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{!! url('/admin/people/' . $person->id . '/image') !!}/" + $(this).data('id'),
                type: 'DELETE'
            }).done(resp => {
                $(this).parent().remove();
            })
        });
    </script>
@stop
