@extends('admin.layouts.master')

@section('content')
<a href="{!! url('admin/products/'  . $variant->product->id . '/edit') !!}" title="Sliders" class="block text-xs font-semibold text-gray-600 hover:text-blue-500 -mb-2"><i class="fa fa-caret-left mr-2"></i>Back to product</a>
{!! Form::model($variant, ['route' => ['admin.variants.update', $variant->id], 'method' => 'PUT',  'enctype' => 'multipart/form-data']) !!}
    <div class="section-head">
        <div class="content">
            <h2 class="mb-2">Edit Variant</h2>
        </div>
        {!! Form::submit('Save variant', ['class' => 'button blue flex-shrink-0']) !!}
    </div>
    <div class="w-full mt-8 mb-4 px-2">
        <h3>Variant details</h3>
    </div>
    <div class="card-group">
        <div class="card-col w-full md:w-1/2">
            <div class="card">
                <div class="flex flex-wrap mb-6">
                    <fieldset class="w-full pr-1">
                        {!! Form::label('sku', 'SKU', ['class' => 'field-label']) !!}
                        {!! Form::text('sku', null, ['class' => 'field-input']) !!}
                        <span class="field-error">{!! $errors->first('sku') !!}</span>
                    </fieldset>
                    <fieldset class="w-full pr-1">
                        {!! Form::label('name', 'Name', ['class' => 'field-label']) !!}
                        {!! Form::text('name', null, ['class' => 'field-input']) !!}
                        <span class="field-error">{!! $errors->first('name') !!}</span>
                        <span class="field-tip">Leave empty to have variant described as a summary of its taxons.</span>
                    </fieldset>
                </div>
                <div class="flex flex-wrap mb-2">
                    <fieldset class="w-full md:w-1/2 pr-1">
                        {!! Form::label('price', 'Price', ['class' => 'field-label']) !!}
                        {!! Form::number('price', null, ['class' => 'field-input', 'step' => 'any']) !!}
                        <span class="field-error">{!! $errors->first('price') !!}</span>
                        <span class="field-tip">The default variant price.</span>
                    </fieldset>
                    <fieldset class="w-full md:w-1/2 pr-1">
                        {!! Form::label('sale_price', 'Sale Price', ['class' => 'field-label']) !!}
                        {!! Form::number('sale_price', null, ['class' => 'field-input', 'step' => 'any']) !!}
                        <span class="field-error">{!! $errors->first('sale_price') !!}</span>
                        <span class="field-tip">A lower price to override default variant price.</span>
                    </fieldset>
                </div>
                <div class="flex flex-wrap mb-2">
                    <fieldset class="w-full">
                        {!! Form::label('shipping_item_id', 'Shipping Item Type', ['class' => 'field-label']) !!}
                        {!! Form::select('shipping_item_id', ['' => 'Select'] + $shippingItems->pluck('name', 'id')->toArray(), null, ['class' => 'selectize']) !!}
                        <span class="error">{!! $errors->first('shipping_item_id') !!}</span>
                        <span class="field-tip">Select the item type to apply shipping charges.</span>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="card-col w-full md:w-1/2">
            <div class="card">
                <h4 class="border-b border-gray-400 mb-3">Flags</h4>
                <div class="flex flex-wrap mb-6">
                    <fieldset class="w-full pr-1">
                        <div class="switch">
                            <label class="switch-label">
                                Variant active
                                {!! Form::checkbox('is_active', true, null, ['class' => 'switch-input']) !!}
                            </label>
                        </div>
                    </fieldset>
                    <fieldset class="w-full pr-1">
                        <div class="switch">
                            <label class="switch-label">
                                Sold out
                                {!! Form::checkbox('is_sold_out', true, null, ['class' => 'switch-input']) !!}
                            </label>
                        </div>
                        <span class="field-tip">Show the variant as sold-out even if there is stock on hand (for variants that are stock limited)</span>
                    </fieldset>
                </div>
                <h4 class="border-b border-gray-400 mb-3">Stock</h4>
                <div class="flex flex-wrap mb-6">
                    <fieldset class="w-full pr-1">
                        <div class="switch">
                            <label class="switch-label">
                                Stock limit
                                {!! Form::checkbox('is_limited', true, null, ['class' => 'switch-input']) !!}
                            </label>
                        </div>
                        <span class="field-tip">Limit the number of variants sold before shown as sold-out</span>
                    </fieldset>
                </div>
                <div class="flex flex-wrap mb-6">
                    <fieldset class="w-full pr-1">
                        {!! Form::label('stock_on_hand', 'Stock on Hand', ['class' => 'field-label']) !!}
                        {!! Form::number('stock_on_hand', null, ['class' => 'field-input', 'step' => 'any']) !!}
                        <span class="field-error">{!! $errors->first('stock_on_hand') !!}</span>
                        <span class="field-tip">The number of variants in stock</span>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    @if(count($taxonomies))
    <div class="w-full mt-8 mb-4 px-2">
        <h3>Variant taxonomy</h3>
    </div>
    <div class="card-group">
        <div class="card">
            <div class="flex flex-wrap mb-2">
                @foreach($taxonomies as $taxonomy)
                <div class='flex-auto mr-2 mb-2 w-1/3'>
                    {!! Form::label($taxonomy->slug, $taxonomy->name, ['class' => 'field-label']) !!}
                    {!! Form::select('taxon_ids[]',
                        $taxonomy->taxons->pluck('name', 'id'),
                        $variant->taxons->pluck('id'),
                        [
                            'id' => $taxonomy->slug,
                            'class' => 'selectize',
                            'placeholder' => 'Select ' . $taxonomy->name,
                            'multiple'
                        ]
                    ) !!}
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

{!! Form::close() !!}
@stop

@section('scripts')
    <script type="text/javascript">
    </script>
@stop
