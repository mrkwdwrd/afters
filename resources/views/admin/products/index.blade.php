@extends('admin.layouts.master')

@section('content')
<div class="section-head">
    <div class="content">
        <h2 class="mb-2">Products</h2>
        <div class="text-sm md:text-base">
            <p>Manage Products</p>
        </div>
    </div>
    {!! Form::button('New Product', ['data-target' => 'create-record-form', 'class' => 'button green flex-shrink-0 create-record']) !!}
</div>
<div class="card-group">
    {!! Form::open(['route' => 'admin.products.index', 'class' => 'w-full flex items-stretch card-col', 'method' => 'GET']) !!}
        @foreach($taxonomies as $taxonomy)
            @if(count($taxonomy->taxons) > 1)
                <div class="flex-auto mr-2 mb-2">
                    {!! Form::label($taxonomy->slug, $taxonomy->name, ['class' => 'field-label hidden']) !!}
                    {!! Form::select($taxonomy->slug, $taxonomy->taxons->pluck('name', 'slug')->all(), request()->{$taxonomy->slug}, ['id' => $taxonomy->slug, 'class' => 'selectize sort-index', 'placeholder' => 'Select '.$taxonomy->name]) !!}
                </div>
            @endif
        @endforeach
        <div class="flex-auto mr-2 mb-2">
            {!! Form::label('term', 'Search', ['class' => 'field-label hidden']) !!}
            {!! Form::text('term', Request::input('term') !== null ? Request::input('term') : null, ['id' => 'term', 'class' => 'field-input', 'placeholder' => 'Search term']) !!}
        </div>
        <div class="self-end text-center mb-2">
            {!! Form::submit('Apply', ['class' => 'button bg-gray-600 hover:bg-blue-500 text-white']) !!}
            <a href="{!! url()->current() . '?' . http_build_query(Arr::only(request()->query(), ['page'])) !!}" class="button red thin"><i class="fa fa-ban"></i> Clear</a>
        </div>
    {!! Form::close() !!}
</div>
<div class="card-group">
    <div class="card-col w-full">
        <ul class="pagination">
            {!! $products->appends(request()->query())->links() !!}
        </ul>
    </div>
</div>
<div class="card-group">
    <div class="card-col w-full">
        @if (count($products) > 0)
            @foreach($products as $product)
                <div class="w-full bg-white shadow-xl rounded-lg overflow-hidden mt-5">
                    <div class="md:flex w-full p-3">
                        <figure class="w-56 h-32 mr-6">
                            @if($product->hasMedia('images'))
                            <div class="w-full h-full bg-contain bg-no-repeat bg-center" style="background-image: url({!! url($product->getFirstMediaUrl('images', 'thumb')) !!})"></div>
                            @else
                            <div class="w-full h-full text-center text-gray-600 pt-10 bg-gray-200">
                               <i class="fa fa-camera"></i>
                               <span class="block text-xs uppercase">No image</span>
                            </div>
                            @endif
                        </figure>
                        <div class="text-center md:text-left w-full">
                            <h2 class="text-lg"><a href="{!! url('admin/products/' . $product->id . '/edit') !!}" class="uppercase tracking-wide text-sm text-blue-800 font-bold hover:underline">{!! $product->name !!}</a></h2>
                            @if($product->sku)
                                <p class="text-xs">{!! $product->sku !!}</p>
                            @endif
                            @if($product->variants)
                                <p class="text-xs">{!! $product->variants_strings !!}</p>
                            @endif
                        </div>
                    </div>
                    <div class="lg:flex px-4 border-gray-300 bg-gray-100">
                        <div class="lg:w-1/2 pt-4 flex lg:justify-start sm:justify-center text-xs uppercase font-bold text-gray-600">
                            {!! $product->taxons_string !!}
                        </div>
                        <div class="lg:w-1/2 pt-3 flex lg:justify-end sm:justify-center pb-3">
                            <a href="{!! url('admin/products/' . $product->id . '/edit') !!}" class="align-middle pr-4" title="Edit product"><span class="bg-green-500 hover:bg-green-700 text-white text-sm font-bold px-3 py-2 rounded">Edit<i class="fa fa-edit pl-3"></i></span></a>
                            <a href="{!! url('admin/products/' . $product->id . '/delete') !!}" class="align-middle delete-confirm" title="Delete product"><span class="bg-red-500 hover:bg-red-700 text-white text-sm font-bold px-3 py-2 rounded">Delete<i class="fa fa-trash pl-3"></i></span></a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="card">
                <span class="list-empty">There are no products to display</span>
            </div>
        @endif
    </div>
</div>
<div class="card-group">
    <div class="card-col w-full">
        <ul class="pagination">
            {!! $products->appends(request()->query())->links() !!}
        </ul>
    </div>
</div>
@stop

@section('templates')
    <div id="overlay"></div>
    {!! Form::open(['route' => 'admin.products.create', 'id' => 'create-record-form', 'class' => 'card modal max-w-2xl' . (count($errors) ? ' errors' : '')]) !!}
        <header class="mb-4 px-1">
            <h3>Create a new product</h3>
        </header>
        <div>
            <fieldset class="mb-2 px-1">
                {!! Form::label('name', 'Name', ['class' => 'field-label']) !!}
                {!! Form::text('name', '', ['id' => 'name', 'class' => 'field-input', 'placeholder' => 'Product Name', 'data-validation' => 'req']) !!}
                <span class="field-error">{!! $errors->first('name') !!}</span>
            </fieldset>
            @if($taxonomies->where('slug', 'product-type')->count() > 0)
                <fieldset class="mb-6 px-1 w-full">
                    {!! Form::label('product-type', 'Product Type', ['class' => 'field-label']) !!}
                    <div id="product-type" class="set-inline">
                        @foreach($taxonomies->where('slug','product-type')->first()->taxons as $taxon)
                            <label class="set-label">
                                {!! Form::radio('taxon_ids[]', $taxon->id, null, ['class' => 'set-input']) !!}
                                {!! $taxon->name !!}
                            </label>
                        @endforeach
                    </div>
                </fieldset>
            @endif
            <fieldset class="px-1">
                {!! Form::button('Create', ['type' => 'submit', 'class' => 'button green']) !!}
                <a role="cancel-create-record" class="button red thin">Cancel</a>
            </fieldset>
        </div>
    {!! Form::close() !!}
@stop

@section('scripts')
@stop
