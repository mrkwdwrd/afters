@extends("admin.layouts.master")

@section('content')
{!! Form::model($list, ['route' => ['admin.product-lists.update', $list->id], 'method' => 'PUT',  'enctype' => 'multipart/form-data']) !!}
    <div class="section-head">
        <div class="content">
            <h2 class="mb-2">Edit product list</h2>
        </div>
        {!! Form::submit('Save list', ['class' => 'button blue flex-shrink-0']) !!}
    </div>

    <div class="card-group mb-5">
        <div class="card-col w-full">
            <div class="card">
                <div class="flex flex-wrap w-full">
                    <fieldset class="mb-6 px-1 pr-4 w-2/3">
                        {!! Form::label('title', 'Title', ['class' => 'field-label']) !!}
                        {!! Form::text('title', null, ['class' => 'field-input']) !!}
                        <span class="field-error">{!! $errors->first('title') !!}</span>
                    </fieldset>
                    <fieldset class="w-1/3 pr-1 pt-12">
                        <div class="switch">
                            <label class="switch-label">
                                Featured
                                {!! Form::checkbox('is_featured', true, null, ['class' => 'switch-input']) !!}
                            </label>
                        </div>
                    </fieldset>
                </div>
                <div class="flex flex-wrap w-full">
                    <fieldset class="mb-6 px-1 pr-4 w-2/3">
                        {!! Form::label('description', 'Description', ['class' => 'field-label']) !!}
                        {!! Form::textarea('description', null, ['class' => 'field-input']) !!}
                        <span class="field-error">{!! $errors->first('description') !!}</span>
                    </fieldset>
                    <div class="w-1/3">
                        <fieldset class="mb-6 px-1 w-full">
                            {!! Form::label('link_text', 'Link Text', ['class' => 'field-label']) !!}
                            {!! Form::text('link_text', null, ['class' => 'field-input']) !!}
                            <span class="field-error">{!! $errors->first('link_text') !!}</span>
                        </fieldset>
                        <fieldset class="mb-6 px-1 w-full">
                            {!! Form::label('link_url', 'Link URL', ['class' => 'field-label']) !!}
                            {!! Form::text('link_url', null, ['class' => 'field-input', 'placeholder' => 'https://...']) !!}
                            <span class="field-error">{!! $errors->first('link_url') !!}</span>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-group mb-5">
        <div class="card-col w-full">
            <div class="card">
                <div class="flex flex-wrap w-full">
                    <fieldset class="mb-6 px-1 w-full">
                        {!! Form::label('products', 'Products', ['class' => 'field-label']) !!}
                        {!! Form::select('products[]', $products->pluck('name', 'id')->all(), $list->products->pluck('id')->all(), ['class' => 'selectize', 'multiple', 'placeholder' => 'Select products']) !!}
                        <span class="field-error">{!! $errors->first('products') !!}</span>
                    </fieldset>
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
