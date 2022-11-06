@extends('admin.layouts.master')

@section('content')
<a href="{!! url('admin/pages') !!}" title="Pages" class="block text-xs font-semibold text-gray-600 hover:text-blue-500 -mb-2"><i class="fa fa-caret-left mr-2"></i>Back to pages</a>
{!! Form::model($page, ['route' => ['admin.pages.update', $page->id], 'method' => 'PUT',  'enctype' => 'multipart/form-data']) !!}
    <div class="section-head">
        <div class="content">
            <h2 class="mb-2">Edit page</h2>
        </div>
        {!! Form::submit('Save page', ['class' => 'button blue flex-shrink-0']) !!}
    </div>

    <div class="w-full mt-8 mb-4 px-2">
        <h3>Page details</h3>
    </div>
    <div class="card-group">
        <div class="card-col w-full">
            <div class="card">
                <div class="flex flex-wrap border-b border-gray-500 mb-6">
                    <div class="w-full md:w-1/2 pr-1">
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('label', 'Label', ['class' => 'field-label']) !!}
                            {!! Form::text('label', $page->label, ['id' => 'label', 'class' => 'field-input', 'data-validation' => 'req']) !!}
                            <span class="field-error">{!! $errors->first('label') !!}</span>
                            <span class="field-tip">This is how the name will appear in your site's navigation.</span>
                        </fieldset>
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('slug', 'Slug', ['class' => 'field-label']) !!}
                            {!! Form::text('slug', $page->slug, array('id' => 'slug', 'class' => 'field-input', 'data-validation' => 'req')) !!}
                            <span class="field-error">{!! $errors->first('slug') !!}</span>
                            <span class="field-tip">The slug is used in the page URL and must be unique, lowercase and contain only letters, numbers and hyphens. Changing a page's slug may break links to it and is not recommended.</span>
                        </fieldset>
                    </div>
                    <div class="w-full md:w-1/2 pl-1">
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('parent_id', 'Parent page', ['class' => 'field-label']) !!}
                            {!! Form::select('parent_id', ['' => 'None'] + $pages->pluck('label', 'id')->all(), $page->parent == null ? 0 : $page->parent->id, [ 'id' => 'parent_id', 'class' => 'selectize'] )!!}
                            <span class="field-tip">Set this page as a sub-page of an existing page.</span>
                        </fieldset>
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('navigation-appearance', 'Navigation appearance', ['class' => 'field-label']) !!}
                            <div id="navigation-appearance" class="set-inline">
                                <label class="set-label">
                                    {!! Form::checkbox('show_in_nav', true, $page->show_in_nav, ['class' => 'set-input']) !!}
                                    Main
                                </label>
                                <label class="set-label">
                                    {!! Form::checkbox('show_in_footer', true, $page->show_in_footer, ['class' => 'set-input']) !!}
                                    Footer
                                </label>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/2 pr-1">
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('meta-title', 'SEO title', ['class' => 'field-label']) !!}
                            {!! Form::text('meta_title', $page->meta_title, ['id' => 'meta-title', 'class' => 'field-input', 'placeholder' => 'Title']) !!}
                            <span class="field-tip">Title is used for search engine results</span>
                        </fieldset>
                    </div>
                    <div class="w-full md:w-1/2 pl-1">
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('meta-keywords', 'SEO keywords', ['class' => 'field-label']) !!}
                            {!! Form::text('meta_keywords', $page->meta_keywords, ['id' => 'meta-keywords', 'class' => 'field-input', 'placeholder' => 'Keywords']) !!}
                            <span class="field-tip">Keywords are used for search engine results</span>
                        </fieldset>
                    </div>
                    <div class="w-full">
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('meta-description', 'SEO description', ['class' => 'field-label']) !!}
                            {!! Form::text('meta_description', $page->meta_description, ['id' => 'meta-description', 'class' => 'field-input', 'placeholder' => 'Description']) !!}
                            <span class="field-tip">Description is used for search engine results</span>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full mt-8 mb-4 px-2">
        <h3>Page content</h3>
    </div>
    <div class="card-group">
        <div class="card-col w-full">
            <div class="card">
                <div class="flex flex-wrap">
                    <div class="w-full md:w-3/4 pr-1">
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('title', 'Page title', ['class' => 'field-label']) !!}
                            {!! Form::text('title', $page->title, array('id' => 'title', 'class' => 'field-input', 'placeholder' => 'Title' )) !!}
                            <span class="field-tip">This is the name of the page in a browser tab, and will also output it within an {{ "<h1>" }} tag at the top of the page.</span>
                            <span class="field-error">{!! $errors->first('title') !!}</span>
                        </fieldset>
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('subtitle', 'Page subtitle', ['class' => 'field-label']) !!}
                            {!! Form::text('subtitle', $page->subtitle, array('id' => 'subtitle', 'class' => 'field-input', 'placeholder' => 'Subtitle' )) !!}
                            <span class="error">{!! $errors->first('subtitle') !!}</span>
                        </fieldset>
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('page-content', 'Introduction', ['class' => 'field-label']) !!}
                            {!! Form::textarea('content', $page->content, array('id' => 'page-content', 'class' => 'field-input', 'class' => 'froala_editor', 'placeholder' => 'Page Content', 'data-url' => '/admin/pages/'.$page->id)) !!}
                        </fieldset>
                    </div>
                    <div class="w-full md:w-1/4 pl-1">
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('images', 'Image', ['class' => 'field-label']) !!}
                            <input type="file" name="images">
                            <div id="image-preview">
                                @if($page->media->count() > 0)
                                    @include("admin.pages.partials._media", ["media" => $page->media->first()])
                                @endif
                            </div>
                        </fieldset>
                        <fieldset class="mb-2 px-1">
                            {!! Form::label('cms_slider_id', 'Slider', ['class' => 'field-label']) !!}
                            {!! Form::select('cms_slider_id', ['' => 'Choose Slider'] + $sliders->pluck('name', 'id')->all(), $page->cms_slider_id == null ? 0 : $page->cms_slider_id, [ 'id' => 'cms_slider_id', 'class' => 'selectize'] )!!}
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-head">
        <div class="content">
            <h3 class="mb-2">Content nodes</h3>
        </div>
        {!! Form::button('Add content node', ['data-target' => 'create-content-node-form', 'class' => 'button button green flex-shrink-0 create-record']) !!}
    </div>

    <div id="content-node" class="sortable nested" data-context="nodes">
        @foreach($page->nodes as $node)
            @include("admin.pages.partials._node")
        @endforeach
    </div>
{!! Form::close() !!}
@stop

@section('templates')
<div id="overlay"></div>
{!! Form::open(['route' => ['admin.nodes.create', $page->id], 'id' => 'create-content-node-form', 'class' => 'card modal max-w-2xl ajax', 'data-context' => 'content-node' . (count($errors) ? ' errors' : '')]) !!}
    <header class="mb-4 px-1">
        <h3>Create a new content node</h3>
    </header>
    <div>
        <fieldset class="mb-6 px-1">
            {!! Form::label('contentable_type', 'Content Type', ['class' => 'hidden-label']) !!}
            {!! Form::select('contentable_type', $contentableTypes, null, ['id' => 'contentable_type', 'class' => 'selectize']) !!}
        </fieldset>
        <div class="options">
            <fieldset class="mb-6 px-1 add_content_text">
                {!! Form::label('columns', 'Columns', ['class' => 'hidden-label']) !!}
                {!! Form::select('columns', ['1' => '1 Column', '2' => '2 Columns', '3' => '3 Columns'], null, ['id' => 'columns', 'class' => 'selectize']) !!}
            </fieldset>
            <fieldset class="mb-6 px-1 add_content_accordion" style="display: none">
                {!! Form::label('accordion_id', 'Select Accordion', ['class' => 'hidden-label']) !!}
                {!! Form::select('accordion_id', [null => 'Choose Accordion'] + $accordions->pluck('name', 'id')->all(), null, ['id' => 'accordion_id', 'class' => 'selectize']) !!}
            </fieldset>
            <fieldset class="mb-6 px-1 add_content_gallery" style="display: none">
                {!! Form::label('gallery_id', 'Select Gallery', ['class' => 'hidden-label']) !!}
                {!! Form::select('gallery_id', [null => 'Choose Gallery'] + $galleries->pluck('name', 'id')->all(), null, ['id' => 'gallery_id', 'class' => 'selectize']) !!}
            </fieldset>
            <fieldset class="mb-6 px-1 add_content_slider" style="display: none">
                {!! Form::label('slider_id', 'Select Slider', ['class' => 'hidden-label']) !!}
                {!! Form::select('slider_id', [null => 'Choose Slider'] + $sliders->pluck('name', 'id')->all(), null, ['id' => 'slider_id', 'class' => 'selectize']) !!}
            </fieldset>
            <fieldset class="mb-6 px-1 add_content_tile_group" style="display:none">
                {!! Form::label('tile_style', 'Style', ['class' => 'field-label']) !!}
                {!! Form::select('tile_style', ['default' => 'Default'], null, ['id' => 'tile_style', 'class' => 'selectize']) !!}
            </fieldset>
            <fieldset class="mb-6 px-1 add_content_tile_group" style="display:none">
                {!! Form::label('tile_columns', 'Columns', ['class' => 'field-label']) !!}
                {!! Form::text('tile_columns', 1, ['id' => 'columns', 'class' => 'field-input']) !!}
            </fieldset>
            <fieldset class="mb-6 px-1 add_content_tile_group" style="display:none">
                {!! Form::label('tile_rows', 'Rows', ['class' => 'field-label']) !!}
                {!! Form::text('tile_rows', 1, ['id' => 'rows', 'class' => 'field-input']) !!}
            </fieldset>
        </div>
        <fieldset class="px-1">
            {!! Form::button('Create', ['type' => 'submit', 'class' => 'button green']) !!}
            <a role="cancel-create-record" class="button red thin">Cancel</a>
        </fieldset>
    </div>
{!! Form::close() !!}

@stop

@section('scripts')
<script type="text/javascript">
    $('input[name="images"]').fileuploader({
        theme: null,
        extensions: ['jpg', 'jpeg', 'png', 'gif'],
        fileMaxSize: 2,
        changeInput: '<button class="button blue">Add images</button>',
        thumbnails: null,
        upload: {
            url: "{!! url('/admin/pages/' . $page->id . '/image') !!}",
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
            url: "{!! url('/admin/pages/' . $page->id . '/image') !!}/" + $(this).data('id'),
            type: 'DELETE'
        }).done(resp => {
            $(this).parent().remove();
        })
    });

    $(document).on('change', '#contentable_type', function () {
        target = $('#contentable_type option:selected').text().toLowerCase().replace(" ", "_");

        if (target !== "text")
            $("#columns")[0].selectize.setValue("1");
        $('.options fieldset').hide();
        $('.add_content_' + target).show();
    });

    $(document).on('click', '.cardcontent.accordion dt', function () {
        $(this).next('dd').slideToggle();
        $(this).toggleClass('active');
    });

    $('a.collapse').on('click', function () {
        $(this).closest('.node').find('.nodecontent').slideToggle();
        return false;
    });

    // Removing CMS SubContent
    $(document).on('click', '.node a.delete', function (e) {
        e.preventDefault();
        var node = $(this).closest('.node');
        $.ajax({
            'type': 'delete',
            'url': $(this).attr('href')
        }).done(function (response) {
            console.log($(this));
            if (response.status === 200) {
                node.fadeOut(300, function () {
                    $(this).remove();
                });
                console.log('ajaxdone', response);
            }
        }).fail(function (response) {
            console.log('ajaxerror', response);
        }).always(function (response) {
            console.log('ajaxalways', response);
        });
    });


    $(document).on("click", ".sortup", function(e) {
        e.preventDefault();
        var thisitem = $(this).closest(".node");
        var previtem = thisitem.prev(".node");
        if (previtem.length > 0) {
            var html = thisitem.clone();
            thisitem.remove();
            previtem.before(html);
        }
        updateNodeOrder();
    });

    $(document).on("click", ".sortdown", function(e) {
        e.preventDefault();
        var thisitem = $(this).closest(".node");
        var nextitem = thisitem.next(".node");
        if (nextitem.length > 0) {
            var html = thisitem.clone();
            thisitem.remove();
            nextitem.after(html);
        }
        updateNodeOrder();
    });

    function updateNodeOrder() {
        let order = [];
        $(".node").each((index, value) => {
            order.push(value.id);
        });
        $.post("/admin/nodes/sort-order", {siblings: order})
        .done(resp => {
            console.log(resp)
        });
    }

    $(document).on('change', '.content_type', function(e) {
        let id = $(this).data('id');

        $("#text-" + id).hide();
        $("#slider-" + id).hide();
        $("#image-" + id).hide();
        $("#accordion-" + id).hide();
        $("#gallery-" + id).hide();
        switch($(this).val())
        {
            case "text":
                $("#text-" + id).show();
                break;
            case "image":
                $("#image-" + id).show();
                break;
            case "slider":
                $("#slider-" + id).show();
                break;
            case "accordion":
                $("#accordion-" + id).show();
                break;
            case "gallery":
                $("#gallery-" + id).show();
                break;
        }
    });

</script>
@stop
