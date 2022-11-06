@extends('admin.layouts.master')

@section('content')
<a href="{!! url('admin/products') !!}" title="Products" class="block text-xs font-semibold text-gray-600 hover:text-blue-500 -mb-2"><i class="fa fa-caret-left mr-2"></i>Back to products</a>
{!! Form::model($product, ['route' => ['admin.products.update', $product->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    <div class="section-head">
        <div class="content">
            <h2 class="mb-2">Edit Product</h2>
        </div>
        {!! Form::submit('Save product', ['class' => 'button blue flex-shrink-0']) !!}
    </div>

    <div class="w-full mt-8 mb-4 px-2">
        <h3>Product details</h3>
    </div>
    <div class="card-group">
        <div class="card-col w-full md:w-1/2">
            <div class="card">
                <h4 class="border-b border-gray-400 mb-3">Basic Info</h4>
                <div class="flex flex-wrap mb-6">
                    <fieldset class="w-full pr-1">
                        {!! Form::label('name', 'Name', ['class' => 'field-label']) !!}
                        {!! Form::text('name', $product->name, ['class' => 'field-input']) !!}
                        <span class="field-error">{!! !session("variant") ? $errors->first('name') : "" !!}</span>
                    </fieldset>
                    <fieldset class="w-full pr-1">
                        {!! Form::label('slug', 'Slug', ['class' => 'field-label']) !!}
                        {!! Form::text('slug', $product->slug, ['class' => 'field-input']) !!}
                        <span class="field-error">{!! $errors->first('slug') !!}</span>
                        <span class="field-tip">The slug is used in the page URL and must be unique, lowercase and contain only letters, numbers and hyphens. Changing a page's slug may break links to it and is not recommended.</span>
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
                                Product active
                                {!! Form::checkbox('is_active', true, $product->is_active, ['class' => 'switch-input']) !!}
                            </label>
                        </div>
                    </fieldset>
                    <fieldset class="w-full pr-1">
                        <div class="switch">
                            <label class="switch-label">
                                Sold out
                                {!! Form::checkbox('is_sold_out', true, $product->is_sold_out, ['class' => 'switch-input']) !!}
                            </label>
                        </div>
                        <span class="field-tip">Show the product as sold-out even if there are variants available (for variant-type products) or stock on hand (for simple-type products that are stock limited) </span>
                    </fieldset>
                </div>
                <h4 class="border-b border-gray-400 mb-3">SEO</h4>
                <div class="flex flex-wrap mb-2">
                    <fieldset class="w-full md:w-1/2 pr-1">
                        {!! Form::label('meta-title', 'SEO title', ['class' => 'field-label']) !!}
                        {!! Form::text('meta_title', $product->meta_title, ['id' => 'meta-title', 'class' => 'field-input', 'placeholder' => 'Title']) !!}
                        <span class="field-tip">Title is used for search engine results</span>
                    </fieldset>
                    <fieldset class="w-full md:w-1/2 pr-1">
                        {!! Form::label('meta-keywords', 'SEO keywords', ['class' => 'field-label']) !!}
                        {!! Form::text('meta_keywords', $product->meta_keywords, ['id' => 'meta-keywords', 'class' => 'field-input', 'placeholder' => 'Keywords']) !!}
                        <span class="field-tip">Keywords are used for search engine results</span>
                    </fieldset>
                    <fieldset class="w-full md:w-full pr-1">
                        {!! Form::label('meta-description', 'SEO description', ['class' => 'field-label']) !!}
                        {!! Form::text('meta_description', $product->meta_description, ['id' => 'meta-description', 'class' => 'field-input', 'placeholder' => 'Description']) !!}
                        <span class="field-tip">Description is used for search engine results</span>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    @if(count($productTaxonomies))
        <div class="w-full mt-8 mb-4 px-2">
            <h3>Product taxonomy</h3>
        </div>
        <div class="card-group">
            <div class="card">
                <div class="flex flex-wrap mb-2">
                    @foreach($productTaxonomies as $taxonomy)
                        <div class='flex-auto mr-2 mb-2 w-1/3'>
                            {!! Form::label($taxonomy->slug, $taxonomy->name, ['class' => 'field-label']) !!}
                            {!! Form::select('taxon_ids[]',
                                $taxonomy->taxons->pluck('name', 'id')->all(),
                                $product->taxons->pluck('id'),
                                [
                                    'id' => $taxonomy->slug,
                                    'class' => 'selectize sort-index',
                                    'placeholder' => 'Select ' . $taxonomy->name,
                                    'multiple',
                                    'data-create-url' => url('admin/taxonomies/' .  $taxonomy->id . '/taxon' ),
                                ]
                            ) !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if(count($product::SPECIFICATION_TYPES))
        <div class="w-full mt-8 mb-4 px-2">
            <h3>Product Specifications</h3>
        </div>
        <div class="card-group">
            <div class="card">
                @foreach($product::SPECIFICATION_TYPES as $t => $type)
                    <div class="mb-8" id="{!! $t !!}">
                        <div class="flex justify-between items-center mb-4 border-b border-gray-400">
                            <h4>{!! $type !!}</h4>
                            <a class="button blue thin" role="add-spec" data-target="{!! $t !!}" data-key="{!! count($product->specifications[$t]) !!}"><i class="fa fa-plus"></i> Add another</a>
                        </div>
                        @foreach($product->specifications[$t] as $s => $specification)
                            @include("admin.products._spec")
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Section header -->
    <div class="section-head">
        <div class="content">
            <h2 class="mb-2">Product values</h2>
        </div>
        <div class="toggle flex-shrink-0">
            <label class="toggle-label">
                {!! Form::radio('type', 'simple', $product->type, ['class' => 'toggle-input']) !!}
                <span>Simple</span>
            </label>
            <label class="toggle-label">
                {!! Form::radio('type', 'variant', $product->type, ['class' => 'toggle-input']) !!}
                <span>Variant</span>
            </label>
        </div>
    </div>

    <div id="simple" class="product-type card-group hidden">
        <div class="card-group">
            <div class="card-col w-full md:w-1/2">
                <div class="card">
                    <div class="flex flex-wrap mb-6">
                        <fieldset class="w-full pr-1">
                            {!! Form::label('sku', 'SKU', ['class' => 'field-label']) !!}
                            {!! Form::text('sku', null, ['class' => 'field-input']) !!}
                            <span class="field-error">{!! $errors->first('sku') !!}</span>
                        </fieldset>
                    </div>
                    <div class="flex flex-wrap mb-2">
                        <fieldset class="w-full md:w-1/2 pr-1">
                            {!! Form::label('price', 'Price', ['class' => 'field-label']) !!}
                            {!! Form::number('price', null, ['class' => 'field-input', 'step' => 'any']) !!}
                            <span class="field-error">{!! $errors->first('price') !!}</span>
                            <span class="field-tip">The default product price</span>
                        </fieldset>
                        <fieldset class="w-full md:w-1/2 pr-1">
                            {!! Form::label('sale_price', 'Sale Price', ['class' => 'field-label']) !!}
                            {!! Form::number('sale_price', null, ['class' => 'field-input', 'step' => 'any']) !!}
                            <span class="field-error">{!! $errors->first('sale_price') !!}</span>
                            <span class="field-tip">A lower price to override default product price</span>
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
                    <h4 class="border-b border-gray-400 mb-3">Stock</h4>
                    <div class="flex flex-wrap mb-6">
                        <fieldset class="w-full pr-1">
                            <div class="switch">
                                <label class="switch-label">
                                    Stock limit
                                    {!! Form::checkbox('is_limited', true, null, ['class' => 'switch-input']) !!}
                                </label>
                                <span class="field-tip">Limit the number of products sold before shown as sold-out</span>
                            </div>
                        </fieldset>
                    </div>
                    <div class="flex flex-wrap mb-6">
                        <fieldset class="w-full pr-1">
                            {!! Form::label('stock_on_hand', 'Stock on Hand', ['class' => 'field-label']) !!}
                            {!! Form::number('stock_on_hand', null, ['class' => 'field-input', 'step' => 'any']) !!}
                            <span class="field-error">{!! $errors->first('stock_on_hand') !!}</span>
                            <span class="field-tip">The number of products in stock</span>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="variant" class="product-type card-group hidden">
        <div class="card-col w-full">
            <div class="card">
                <div class="flex flex-wrap">
                    @if (count($product->variants))
                    <table class="w-full">
                        <thead>
                            <th>SKU</th>
                            <th>Summary</th>
                            <th>Price</th>
                            <th>Sale price</th>
                            <th>Shipping Item Type</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($product->variants as $variant)
                                <tr class="hover:bg-blue-lightest border-gray-400 border-solid border">
                                    <th>{!! $variant->sku !!}</th>
                                    <td>{!! $variant->summary !!}</td>
                                    <td>{!! $variant->price ? '$' . $variant->price : '-' !!}</td>
                                    <td>{!! $variant->sale_price ? '$' . $variant->sale_price : '-' !!}</td>
                                    <td>{!! $variant->shippingItem ? $variant->shippingItem->name : '-' !!}</td>
                                    <td class="text-right">
                                        <a href="{!! url('admin/variants/' . $variant->id . ($variant->is_active ? '/deactivate' : '/reactivate')) !!}" class="{!! $variant->is_active ? 'text-blue-500' : 'text-gray-600' !!} mr-4" title="{!! $variant->is_active ? 'Activate' : 'Deactivate' !!}">
                                            <span class="align-middle">
                                                <i class="fa {!! $variant->is_active ? 'fa fa-circle' : 'fa-circle-o' !!} "></i>
                                                {!! $variant->is_active ? 'Active' : 'Inactive' !!}
                                            </span>
                                        </a>
                                        <a href="{!! url('admin/variants/' . $variant->id . '/edit') !!}" class="text-green-500 mr-4" title="Edit variant"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="{!! url('admin/variants/' . $variant->id . '/delete') !!}" class="text-red-500 delete-confirm" title="Delete variant"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <span class="list-empty">There are no variants to display</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="w-full mt-4 mb-4 px-2 flow-root">
            {!! Form::button('New Variant', ['data-target' => 'create-record-form', 'class' => 'py-3 button green flex-shrink-0 float-right create-record']) !!}
        </div>
    </div>

    <div class="w-full mt-8 mb-4 px-2">
        <h3>Product content</h3>
    </div>
    <div class="card-group">
        <div class="card-col w-full">
            <div class="card">
                <div class="flex flex-wrap">
                    <fieldset class="w-full md:w-1/2 pr-1">
                        {!! Form::label('introduction', 'Introduction', ['class' => 'field-label']) !!}
                        {!! Form::textarea('introduction', $product->introduction, ['class' => 'field-input froala_editor', 'placeholder' => 'Content Area']) !!}
                    </fieldset>
                    <fieldset class="w-full md:w-1/2 pr-1">
                        {!! Form::label('description', 'Description', ['class' => 'field-label']) !!}
                        {!! Form::textarea('description', $product->description, ['class' => 'field-input froala_editor', 'placeholder' => 'Content Area']) !!}
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full mt-8 mb-4 px-2">
        <h3>Related products</h3>
    </div>
    <div class="card-group">
        <div class="card-col w-full">
            <div class="card">
                <div class="flex flex-wrap mb-6">
                    <fieldset class="w-full">
                        {!! Form::label("related_products", "Select products", ['class' => 'field-label']) !!}
                        {!! Form::select('related_products[]', [ '' => 'Search for products...' ] + $products->pluck('name','id')->all(), $product->related_products ? $product->related_products->pluck('id')->all() : [], ['multiple', 'class' => 'selectize']) !!}
                        <span class="error">{!! $errors->first('related_products') !!}</span>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <div class="section-head">
        <div class="content">
            <h3>Product images</h3>
        </div>
        <input type="file" name="images">
    </div>

    <div id="product-images" class="card-group images">
        @if(count($product->getMedia("images")))
            @foreach($product->getMedia("images") as $media)
                @include("admin.products._media")
            @endforeach
        @else
            <span class="list-empty">There are no images to display</span>
        @endif
    </div>
{!! Form::close() !!}
@stop

@section('templates')
    <div id="overlay"></div>
    {!! Form::open(['route' => 'admin.variants.create', 'id' => 'create-record-form', 'class' => 'card modal max-w-2xl' . (count($errors) && session("variant") ? ' errors' : '')]) !!}
    {!! Form::hidden('product_id', $product->id) !!}
        <header class="mb-4 px-1">
            <h3>Create a new variant</h3>
        </header>
        <div class="flex flex-wrap w-full">
            <fieldset class="mb-4 px-1 w-1/2">
                {!! Form::label('sku', 'SKU', ['class' => 'field-label']) !!}
                {!! Form::text('sku', '', ['id' => 'sku', 'class' => 'field-input', 'placeholder' => 'SKU']) !!}
                <span class="field-error">{!! session("variant") ? $errors->first('sku') : "" !!}</span>
            </fieldset>
            <fieldset class="mb-4 px-1 w-1/2">
                {!! Form::label('price', 'Price ($)', ['class' => 'field-label']) !!}
                {!! Form::text('price', '', ['id' => 'price', 'class' => 'field-input', 'placeholder' => 'Ex. 69.95']) !!}
                <span class="field-error">{!! session("variant") ? $errors->first('price') : "" !!}</span>
            </fieldset>
            @if(count($variantTaxonomies))
                <div class="flex flex-wrap w-full">
                    @foreach($variantTaxonomies as $taxonomy)
                    <fieldset class="mb-4 px-1 flex-grow">
                        {!! Form::label($taxonomy->slug, $taxonomy->name, ['class' => 'field-label']) !!}
                        {!! Form::select('taxon_ids[]',
                            $taxonomy->taxons->pluck('name', 'id')->all(),
                            $product->taxons->pluck('id'),
                            [
                                'id' => $taxonomy->slug,
                                'class' => 'selectize',
                                'placeholder' => 'Select ' . $taxonomy->name,
                            ]
                        ) !!}
                    </fieldset>
                    @endforeach
                </div>
            @endif
            <fieldset class="w-full px-1">
                {!! Form::button('Create', ['type' => 'submit', 'class' => 'button green']) !!}
                <a role="cancel-create-record" class="button red thin">Cancel</a>
            </fieldset>
        </div>
    {!! Form::close() !!}
@stop

@section('scripts')
    <script type="text/javascript">

        $('.product-type#' + $('input[name=type]:checked').val()).show();

        $(document).on('change', 'input[name=type]', function (e) {
            $('.product-type').hide();
            $('.product-type#' + $('input[name=type]:checked').val()).show();
        });

        $(document).on('click', 'a[role=add-spec]', function (e) {
            e.preventDefault;
            var target = $(this).data('target');

            $.post("/admin/products/add_specification", {target, key: Date.now()})
                .then(resp => {
                    $("#" + target).append(resp.view);
                    initializeSelectize();
                })
        });
        $(document).on('click', 'a[role=remove-spec]', function (e) {
            e.preventDefault;
            var target = $(this).closest('.item');
            target.remove();
        });

        $('input[name="images"]').fileuploader({
            theme: null,
            addMore: true,
            extensions: ['jpg', 'jpeg', 'png', 'gif'],
            fileMaxSize: 2,
            changeInput: '<button class="button blue">Add images</button>',
            thumbnails: null,
            upload: {
                url: "{!! url('admin/products/' . $product->id . '/media') !!}",
                data: null,
                type: 'POST',
                enctype: 'multipart/form-data',
                start: true,
                onSuccess: function(data, item, listEl, parentEl, newInputEl, inputEl, textStatus, jqXHR) {
                    $("#product-images").append(data.view);
                }
            }
        });

        $(document).on('click', '.remove-media', function(e) {
            e.preventDefault();
            $.ajax({
                url: '/admin/products/delete_media',
                type: 'DELETE',
                data: {
                    id: $(this).data("id")
                },
            }).done(resp => {
                $(this).parent().parent().remove();
            })
        });

        $(document).ready(function() {
            $('.card-group.images').sortable({
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
                url: '/admin/products/{{$product->id}}/sort_images',
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
