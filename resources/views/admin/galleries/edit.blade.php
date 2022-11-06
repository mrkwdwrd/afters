@extends('admin.layouts.master')

@section('content')
<a href="{!! url('admin/galleries') !!}" title="Galleries" class="block text-xs font-semibold text-gray-600 hover:text-blue-500 -mb-2"><i class="fa fa-caret-left mr-2"></i>Back to galleries</a>
{!! Form::model($gallery, ['route' => ['admin.galleries.update', $gallery->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
    <div class="section-head">
        <div class="content">
            <h2 class="mb-2">Edit Gallery</h2>
        </div>
        {!! Form::submit('Save gallery', ['class' => 'button blue flex-shrink-0']) !!}
    </div>
    <div class="w-full mt-8 mb-4 px-2">
        <h3>Gallery details</h3>
    </div>
    <div class="card-group">
        <div class="card-col w-full">
            <div class="card">
                <fieldset class="mb-2 px-1">
                    {!! Form::label('name', 'Gallery Name', ['class' => 'field-label']) !!}
                    {!! Form::text('name', $gallery->name, ['id' => 'name',  'class' => 'field-input']) !!}
                    <span class="field-error">{!! $errors->first('name') !!}</span>
                </fieldset>
                <fieldset class="mb-2 px-1">
                    {!! Form::label('slug', 'Slug', ['class' => 'field-label']) !!}
                    {!! Form::text('slug', $gallery->slug, ['id' => 'slug', 'class' => 'field-input']) !!}
                    <span class="error">{!! $errors->first('slug') !!}</span>
                </fieldset>
                <fieldset class="mb-2 px-1">
                    {!! Form::label('description', 'Description', ['class' => 'field-label']) !!}
                    {!! Form::textarea('description', $gallery->description, ['id' => 'description', 'class' => 'froala_editor']) !!}
                    <span class="error">{!! $errors->first('description') !!}</span>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="section-head">
        <div class="content">
            <h3>Gallery images</h3>
        </div>
        <input type="file" name="images">
    </div>

    <div id="gallery-images" class="card-group">
        @foreach($gallery->media->sortBy("order_column") as $media)
            @include("admin.galleries._media")
        @endforeach
    </div>

{!! Form::close() !!}
@stop

@section('templates')
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
                url: "{!! url('admin/galleries/' . $gallery->id . '/media') !!}",
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
                url: "{!! url('/admin/media') !!}/" + $(this).data('id'),
                type: 'DELETE'
            }).done(resp => {
                $(this).parent().parent().remove();
            })
        });

        function sortOrder(e, i, p, s) {
            var order = [];
            $(e).children().each(function() {
                order.push($(this).data('id'));
            });

            $.ajax({
                type: 'POST',
                url: '/admin/galleries/{{$gallery->id}}/media/sort',
                data: { 'order': order }
            }).done(function(response) {
                console.log(response);
            }).fail(function(response) {
                console.log('ajaxerror', response);
            });

            return false;
        }

        $(document).on("click", ".fileuploader-action-remove", function(e) {
            let button = $(this);
            $.ajax({
                'type': 'delete',
                'url': "{!! url('/admin/media') !!}/" + $(this).data('id'),
                'async': false,
                success: function (data) {
                    button.parent().parent().remove();
                }
            })
        })
    </script>
@stop
