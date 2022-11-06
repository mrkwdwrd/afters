@extends("admin.layouts.master")

@section('content')
{!! Form::open(['route' => ['admin.tiles.update', $tile->id], 'method' => 'POST',  'enctype' => 'multipart/form-data']) !!}
    <div class="section-head">
        <div class="content">
            <h2 class="mb-2">Edit tile</h2>
        </div>
        {!! Form::submit('Save tile', ['class' => 'button blue flex-shrink-0']) !!}
    </div>

    <div class="card-group mb-5">
        <div class="card-col w-full">
            <div class="card">
                <div class="flex flex-wrap">
                    <div class="flex flex-wrap w-full">
                        <fieldset class="mb-6 px-1 w-full">
                            @if($tile->getFirstMediaUrl("image"))
                                {!! HTML::image($tile->getFirstMediaUrl("image"), $tile->heading, ["style" => "max-height: 200px", "class" => "block mx-auto"]) !!}
                            @endif
                            {!! Form::label('image', ($tile->media->count() > 0 ? "Update" : "Add ")." Image", ['class' => 'field-label']) !!}
                            {!! Form::file('image', ['class' => 'mx-auto block']) !!}
                        </fieldset>
                        <fieldset class="mb-6 px-1 w-1/2">
                            {!! Form::label('name', 'Name', ['class' => 'field-label']) !!}
                            {!! Form::text('name', $tile->name, ['class' => 'field-input']) !!}
                            <span class="field-error">{!! $errors->first('name') !!}</span>
                            <span class="field-tip">Not displayed to customers. For internal reference only.</span>
                        </fieldset>
                        <fieldset class="mb-6 px-1 w-1/2">
                            {!! Form::label('heading', 'Heading', ['class' => 'field-label']) !!}
                            {!! Form::text('heading', $tile->heading, ['class' => 'field-input']) !!}
                            <span class="field-error">{!! $errors->first('heading') !!}</span>
                            <span class="field-tip">Displayed on tile.</span>
                        </fieldset>
                        <fieldset class="mb-6 px-1 w-full">
                            {!! Form::label('content', 'Content', ['class' => 'field-label']) !!}
                            {!! Form::textarea('content', $tile->content, ['class' => 'froala_editor']) !!}
                            <span class="field-error">{!! $errors->first('content') !!}</span>
                        </fieldset>
                        <fieldset class="mb-6 px-1 w-1/2">
                            {!! Form::label("button_text", "Button Text", ["class" => "field-label"]) !!}
                            {!! Form::text('button_text', $tile->button_text, ['class' => 'field-input']) !!}
                        </fieldset>
                        <fieldset class="mb-6 px-1 w-1/2">
                            {!! Form::label("button_link", "Button Link", ["class" => "field-label"]) !!}
                            {!! Form::text('button_link', $tile->button_link, ['class' => 'field-input']) !!}
                        </fieldset>
                        {{--<fieldset class="mb-6 px-1 w-1/2">
                            {!! Form::label('colour_select', "Select Button Colour", ['class' => 'field-label']) !!}
                            {!! Form::select('colour_select', $colours, $tile->button_colour, ['class' => 'field-input', 'placeholder' => 'Select...', 'id' => 'colour_select']) !!}
                            <span class="field-error">{!! $errors->first('colour') !!}
                        </fieldset>
                        <fieldset class="mb-6 px-1 w-1/2">
                            {!! Form::label('colour_input', "...or input a custom value", ["class" => "field-label"]) !!}
                            {!! Form::text("colour_input", !in_array($tile->button_colour, array_keys($colours)) ? $tile->button_colour : null, ["class" => "field-input", 'id' => 'colour_input']) !!}
                        </fieldset>--}}
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
    <script>
        $("#colour_select").on("change", function() {
            if ($(this).val().length) {
                $("#colour_input").val("");
            }
        });

        $("#colour_input").on("change", function() {
            if ($(this).val().length) {
                $("#colour_select")[0].selectize.clear();
            }
        });
    </script>
@stop
