@extends('admin.layouts.master')

@section('content')
{!! Form::model($mediaRelease, ['route' => ['admin.media-releases.update', $mediaRelease->id], 'method' => 'POST',  'enctype' => 'multipart/form-data']) !!}
    <div class="section-head">
        <div class="content">
            <h2 class="mb-2">Edit media release</h2>
        </div>
        {!! Form::submit('Save media release', ['class' => 'button blue flex-shrink-0']) !!}
    </div>

    <div class="card-group mb-5">
        <div class="card-col w-full">
            <div class="card">
                <fieldset class="mb-2 px-1">
                    {!! Form::label('title', 'Title', ['class' => 'field-label']) !!}
                    {!! Form::text('title', null, ['class' => 'field-input', 'placeholder' => 'Title']) !!}
                    <span class="field-error">{!! $errors->first('title') !!}</span>
                </fieldset>
                <fieldset class="mb-2s px-1">
                    {!! Form::label('slug', 'Slug', ['class' => 'field-label']) !!}
                    {!! Form::text('slug', null, ['class' => 'field-input', 'placeholder' => 'Slug']) !!}
                    <span class="field-error">{!! $errors->first('slug') !!}</span>
                </fieldset>
            </div>
        </div>
        <div class="card-col w-full">
            <div class="card">
                <fieldset class="mb-2 px-1">
                    {!! Form::label('subtitle', 'Subtitle', ['class' => 'field-label']) !!}
                    {!! Form::text('subtitle', null, ['class' => 'field-input', 'placeholder' => 'Subtitle']) !!}
                    <span class="field-error">{!! $errors->first('subtitle') !!}</span>
                </fieldset>
                <fieldset class="mb-2 px-1">
                    {!! Form::label('content', 'Content', ['class' => 'field-label']) !!}
                    {!! Form::textarea('content', null, ['class' => 'field-input froala_editor', 'placeholder' => 'Content']) !!}
                </fieldset>

                <fieldset class="w-1/2 mb-2 px-1">
                    {!! Form::label('embed', 'Embed Code', ['class' => 'field-label']) !!}
                    {!! Form::textarea('embed', null, ['class' => 'field-input', 'placeholder' => 'Embed']) !!}
                </fieldset>
            </div>
        </div>
    </div>
{!! Form::close() !!}
@stop

@section('templates')
@stop

@section('scripts')
@stop
