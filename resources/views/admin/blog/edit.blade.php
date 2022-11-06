@extends('admin.layouts.master')

@section('content')
{!! Form::model($post, array('route' => array('admin.blog.update', $post->id), 'method' => 'put')) !!}
    <div class="section-head">
        <div class="content">
            <h2 class="mb-2">Edit post</h2>
        </div>
        {!! Form::submit('Save post', ['class' => 'button blue flex-shrink-0']) !!}
    </div>

    <div class="w-full mt-8 mb-4 px-2">
        <h3>Post details</h3>
    </div>
    <div class="card-group">
        <div class="card-col w-full">
            <div class="card">
                <div class="flex flex-wrap border-b border-gray-500 mb-6">
                    <div class="w-full md:w-1/2 pr-1">
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('title', 'Title', ['class' => 'field-label']) !!}
                            {!! Form::text('title', $post->title, ['id' => 'label', 'class' => 'field-input', 'data-validation' => 'req']) !!}
                            <span class="field-error">{!! $errors->first('title') !!}</span>
                        </fieldset>
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('slug', 'Slug', ['class' => 'field-label']) !!}
                            {!! Form::text('slug', $post->slug, array('id' => 'slug', 'class' => 'field-input', 'data-validation' => 'req')) !!}
                            <span class="error">{!! $errors->first('slug') !!}</span>
                            <span class="field-tip">The slug is used in the page URL and must be unique, lowercase and contain only letters, numbers and hyphens. Changing a page's slug may break links to it and is not recommended.</span>
                        </fieldset>
                    </div>
                    <div class="w-full md:w-1/2 pl-1">
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('author', 'Author', ['class' => 'field-label']) !!}
                            {!! Form::text('author', $post->author->email, array('id' => 'slug', 'class' => 'field-input bg-gray-200', 'data-validation' => 'req', 'readonly', 'disabled')) !!}
                        </fieldset>
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('categories', 'Post Categories', ['class' => 'field-label']) !!}
                            {!! Form::select('categories[]', ['' => 'No Category'] + $categories->pluck('name','id')->all(), $post->categories->pluck("id")->all(), ['id' => 'categories', 'class' => 'selectize', 'multiple'] ) !!}
                            <span class="field-tip">Set a category for your post.</span>
                        </fieldset>
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/2 pr-1">
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('published-at', 'Publish Date', ['class' => 'field-label']) !!}
                            {!! Form::text('published_at', $post->published_at ? $post->published_at : \Carbon\Carbon::now(), ['id' => 'published-at', 'class' => 'field-input flatpickr','data-enable-time' => 'true']) !!}
                            <span class="field-tip">By selecting a future date, you can schedule the publication of this post.</span>
                        </fieldset>
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('meta-keywords', 'Post Keywords', ['class' => 'field-label']) !!}
                            {!! Form::text('meta_keywords', $post->meta_keywords, array('id' => 'meta-keywords', 'class' => 'field-input', 'placeholder' => 'Keywords')) !!}
                            <span class="field-tip">Keywords are used for search engine results</span>
                        </fieldset>
                    </div>
                    <div class="w-full md:w-1/2 pl-1">
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('publish-unpublish', 'Publish / Unpublish' , ['class' => 'field-label']) !!}
                            <div id="publish-unpublish" class="set-inline">
                                <label class="set-label">
                                    {!! Form::checkbox('publish', true, $post->publish, ['class' => 'set-input']) !!}
                                    Publish
                                </label>
                            </div>
                            <span class="pt-0 mt-2 uppercase field-tip {{ $post->publish == 0 ? 'bg-orange-100 border-l-4 border-orange-500 text-orange-700' : 'bg-green-100 border-l-4 border-green-500 text-green-700'}}" role="alert">{{ $post->publish == 0 ? 'Post in draft' : 'Post currently published' }}</span>
                        </fieldset>
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('meta-description', 'Post Description', ['class' => 'field-label']) !!}
                            {!! Form::text('meta_description', $post->meta_description, array('id' => 'meta-description', 'class' => 'field-input', 'placeholder' => 'Description')) !!}
                            <span class="field-tip">Description is used for search engine results</span>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full mt-8 mb-4 px-2">
        <h3>Post content</h3>
    </div>
    <div class="card-group">
        <div class="card-col w-full">
            <div class="card">
                <div class="flex flex-wrap">
                    <div class="w-full md:w-3/4 pr-1">
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('post-content', 'Introduction', ['class' => 'field-label']) !!}
                            {!! Form::textarea('content', $post->content, array('id' => 'post-content', 'class' => 'field-input froala_editor', 'placeholder' => 'Post Content', 'data-url' => '/admin/blog/'.$post->id)) !!}
                        </fieldset>
                    </div>
                    <div class="w-full md:w-1/4 pl-1">
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('images', 'Image', ['class' => 'field-label']) !!}
                            <input type="file" name="images" class="hidden">
                            <div id="image-preview">
                                @if($post->media->count() > 0)
                                    @include("admin.blog._media", ["media" => $post->media->first()])
                                @endif
                            </div>
                        </fieldset>
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('extract', 'Extract', ['class' => 'field-label']) !!}
                            {!! Form::textarea('extract', $post->extract, ['id' => 'extract', 'class' => 'field-input froala_editor lite', 'placeholder' => 'Post Extract']) !!}
                            <span class="field-tip">Enter a short summary of your post to be displayed on posts page or leave blank to automatically use an excerpt from the post content.</span>
                        </fieldset>
                    </div>
                    <div class="w-full md:w-full pl-1">
                        <fieldset class="mb-6 px-1">
                            {!! Form::label('tag', 'Tags', ['class' => 'field-label']) !!}
                            {!! Form::select('postTags[]', $tags, $post->tags->pluck('id')->all(), ['multiple', 'id' => 'tags', 'class' => 'selectize tag', 'placeholder' => 'Post tags', 'data-model-id' => $post->id]) !!}
                            <span class="field-tip">Tags provide a way to group related posts and make it easier for people to find your content.</span>
                        </fieldset>

                        <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none rounded-full flex lg:inline-flex" role="alert">
                            <span class="flex rounded-full bg-indigo-500 uppercase px-1 py-1 text-xs font-bold mr-3">Last Updated:</span>
                            <span class="font-semibold mr-2 text-left text-sm flex-auto">{!! $post->updated_at->format('l jS F Y - g:i a') !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-group">
        <div class="card-col w-full">
            <div class="card">
                <div class="flex flex-wrap mb-6">
                    <div class="w-full">
                        <div class="flex">
                            <h3>Nodes</h3>
                            {!! Form::button("Add Node", ['class' => "button green mb-5 create-record", "data-target" => "create-node-form", "style" => "margin-left: auto;"]) !!}
                        </div>

                        <div id="blog-nodes">
                            @foreach($post->nodes as $node)
                                @include("admin.blog.partials._node")
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}
@stop

@section('templates')
<div id="overlay"></div>
{!! Form::open(['route' => ['admin.blog.create_node', $post->id], 'id' => 'create-node-form', 'data-context' => 'blog-nodes', 'class' => 'card modal max-w-2xl ajax'.(session("node") ? ' errors' : '')]) !!}
    <header class="mb-4 px-1">
        <h3>Create a new content node</h3>
    </header>
    <div>
        <fieldset class="mb-6 px-1">
            {!! Form::label('contentable_type', 'Content Type', ['class' => 'hidden-label']) !!}
            {!! Form::select('contentable_type', ["content" => "Content"], null, ['id' => 'contentable_type', 'placeholder' => 'Select...', 'class' => 'selectize single']) !!}
        </fieldset>
        <div class="options">
            <fieldset class="mb-6 px-1" id="add_content_content" style="display: none">
                {!! Form::label('columns', 'Columns', ['class' => 'hidden-label']) !!}
                {!! Form::select('columns', ['1' => '1 Column', '2' => '2 Columns', '3' => '3 Columns'], null, ['id' => 'columns', 'class' => 'selectize single']) !!}
            </fieldset>
            <fieldset class="mb-6 px-1" id="add_content_sentence" style="display: none">
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
        changeInput: '<button class="button blue w-full add-image">Add image</button>',
        thumbnails: null,
        upload: {
            url: "{!! url('/admin/blog/' . $post->id . '/image') !!}",
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
            url: "{!! url('/admin/blog/' . $post->id . '/image') !!}/" + $(this).data('id'),
            type: 'DELETE'
        }).done(resp => {
            $(this).parent().remove();
        })
    });

    $(document).on('change', '#contentable_type', function () {
        target = $('#contentable_type option:selected').text().toLowerCase();

        if (target !== "text")
            $("#columns")[0].selectize.setValue("1");
        $('.options fieldset').hide();
        $('#add_content_' + target).show();
    });

    function initializeFroalaEditor() {
        $('.froala_editor').froalaEditor({
            // TODO Move key to .env
            key: "{{env("MIX_FROALA_EDITOR")}}",
            height: 500,

            // disable quick insert
            quickInsertTags: [],

            // toolbar buttons
            toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough', '|', 'paragraphFormat', 'fontSize', 'color', '|', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '-', 'insertLink', 'insertFile', 'insertImage', 'insertVideo', 'embedly', 'insertTable', '|', 'insertHR', 'selectAll', 'clearFormatting', '|', 'spellChecker', 'help', 'html', '|', 'undo', 'redo'],

            // Upload file
            fileUploadParam: 'file',
            fileUploadURL: '/admin/media',
            fileUploadMethod: 'POST',
            fileMaxSize: 20 * 1024 * 1024,
            fileAllowedTypes: ['*'],

            // Upload image
            imageUploadParam: 'file',
            imageUploadURL: '/admin/media',
            imageUploadMethod: 'POST',
            imageMaxSize: 5 * 1024 * 1024,
            imageAllowedTypes: ['jpeg', 'jpg', 'png', 'gif', 'bmp', 'svg+xml'],

            // Upload video
            videoUploadParam: 'file',
            videoUploadURL: '/admin/media',
            videoUploadMethod: 'POST',
            videoMaxSize: 50 * 1024 * 1024,
            videoAllowedTypes: ['avi', 'mov', 'mp4', 'm4v', 'mpeg', 'mpg', 'wmv', 'ogv'],
        }).on('froalaEditor.file.error', function (e, editor, error, response) {
            console.log(error);
        }).on('froalaEditor.image.error', function (e, editor, error, response) {
            console.log(error);
        }).on('froalaEditor.video.error', function (e, editor, error, response) {
            console.log(error);
        });
    };

    $(document).on("click", ".delete-node", function(e) {
        e.preventDefault();

        var result = confirm("Are you sure you want to delete this node?");
        if (result)
        {
            $.get("/admin/blog/delete_node/" + $(this).data("id"))
                .then(resp => {
                    $("#node-" + $(this).data("id")).remove();
                });
        }
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
            order.push(value.dataset.id);
        });

        $.post("/admin/blog/sort-nodes", {order: order})
        .done(resp => {
            console.log(resp)
        });
    }
</script>
@stop
