@extends('admin.layouts.master')

@section('content')
<a href="{!! url('admin/sliders') !!}" title="Sliders" class="block text-xs font-semibold text-gray-600 hover:text-blue-500 -mb-2"><i class="fa fa-caret-left mr-2"></i>Back to sliders</a>
{!! Form::model($slider, ['route' => ['admin.sliders.update', $slider->id], 'method' => 'PUT',  'enctype' => 'multipart/form-data']) !!}
    <div class="section-head">
        <div class="content">
            <h2 class="mb-2">Edit slider</h2>
        </div>
        {!! Form::submit('Save slider', ['class' => 'button blue flex-shrink-0']) !!}
    </div>

    <div class="w-full mt-8 mb-4 px-2">
        <h3>Slider details</h3>
    </div>
    <div class="card-group">
        <div class="card-col w-full">
            <div class="card">
                <fieldset class="mb-2 px-1">
                    {!! Form::label('name', 'Slider Name', ['class' => 'field-label']) !!}
                    {!! Form::text('name', $slider->name, ['id' => 'name',  'class' => 'field-input']) !!}
                    <span class="field-error">{!! $errors->first('name') !!}</span>
                </fieldset>
                <fieldset class="mb-2 px-1">
                    {!! Form::label('slug', 'Slug', ['class' => 'field-label']) !!}
                    {!! Form::text('slug', $slider->slug, ['id' => 'slug', 'class' => 'field-input']) !!}
                    <span class="field-error">{!! $errors->first('slug') !!}</span>
                </fieldset>
            </div>
        </div>
    </div>

    <div class="section-head">
        <div class="content">
            <h3>Slider images</h3>
        </div>
        <input type="file" name="images">
    </div>
    <div id="slider-images" class="card-group flex flex-wrap">
        @foreach($slider->media->sortBy("order_column") as $slide)
            @include("admin.sliders._slide")
        @endforeach
    </div>
@stop

@section('templates')
@stop

@section('scripts')
    <script type="text/javascript">
        $('input[name="images"]').fileuploader({
            theme: null,
            addMore: true,
            extensions: ['jpg', 'jpeg', 'png', 'gif', 'mp4'],
            fileMaxSize: 10,
            changeInput: '<button class="button blue flex-shrink-0">Add slide</button>',
            thumbnails: {
                canvasImage: false,
                box: '<div class="fileuploader-items-list card-group w-full"></div>',
                boxAppendTo: $('#slider-images'),
                item: function(item) {
                    return "";
                },
                item2: function(item) {
                    return "";
                },
            },
            upload: {
                url: "{!! url('admin/sliders/' . $slider->id . '/slides') !!}",
                data: null,
                type: 'POST',
                enctype: 'multipart/form-data',
                start: true,
                onSuccess: function(data, item, listEl, parentEl, newInputEl, inputEl, textStatus, jqXHR) {
                    $(".fileuploader-items-list").before(data.view);
                    window.initializeSelectize();
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

        $(document).ready(function() {
            $('.card-group').sortable({
                cursor: 'move',
                placeholder: 'placeholder',
                forcePlaceholderSize: true,
                cancel: '.field-input',
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
                order.push($(this).data('id'));
            });

            $.ajax({
                type: 'POST',
                url: '/admin/sliders/{{$slider->id}}/slides/sort',
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
