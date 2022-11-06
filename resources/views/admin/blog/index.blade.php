@extends('admin.layouts.master')

@section('content')
<div class="section-head">
    <div class="content">
        <h2 class="mb-2">Blog</h2>
        <div class="text-sm md:text-base">
            <p>Manage Posts.</p>
        </div>
    </div>
    {!! Form::button('New blog post', ['data-target' => 'create-record-form', 'class' => 'button button green flex-shrink-0 create-record']) !!}
</div>

<div class="card-group">
    <div class="card-col w-full">
        <h3>Published</h3>
        @if (count($posts) > 0)
            @foreach($posts as $post)
                <div class="bg-white rounded-lg p-3 w-full md:flex mb-2 relative">
                    <div class="lg:w-1/2 md:1/2 sm:w-auto">
                        <a href="{{ url('admin/blog/' . $post->id . '/edit') }}" class="uppercase tracking-wide text-sm text-indigo-600 font-bold hover:underline">{!! $post->title !!}</a>
                        <div class=="block mt-1 text-lg text-gray-900"><strong>Author:</strong> {!! $post->author->username !!}</div>
                        <p class="mt-2 text-gray-600">{!! $post->extract !!}</p>
                    </div>
                    <div class="lg:w-2/5 md:w-auto sm:w-auto">
                        <div class="py-4 lg:px-4">
                            <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none rounded-full flex lg:inline-flex" role="alert">
                                <span class="flex rounded-full bg-indigo-500 uppercase px-1 py-1 text-xs font-bold mr-3">Updated</span>
                                <span class="font-semibold mr-2 text-left text-sm flex-auto">{!! $post->updated_at->format('l jS F Y - g:i a') !!}</span>
                            </div>
                        </div>
                        <div class="py-4 lg:px-4">
                            <div class="p-2 bg-teal-900 items-center text-indigo-100 leading-none rounded-full flex lg:inline-flex" role="alert">
                                <span class="flex rounded-full bg-teal-500 uppercase px-2 py-1 text-xs font-bold mr-3">Categories</span>
                                <span class="font-semibold mr-2 text-left text-sm flex-auto">{{ $post->categories_display }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="lg:absolute md:w-auto sm:w-auto top-0 right-0 xl:h-full text-center">
                        <button class="btn btn-blue mt-6 lg:w-full md:mr-0 md:ml-4 mr-6">
                            <a href="{!! url('admin/blog/' . $post->id . '/edit') !!}" class="text-green-500 align-middle" title="Edit post"><i class="fa fa-edit"></i></a>
                        </button>
                        <button class="btn btn-blue mt-6 lg:w-full md:mr-0 md:ml-4 mr-6">
                            <a href="{!! url('admin/blog/' . $post->id . '/delete') !!}" class="text-red-500 align-middle delete-confirm" title="Delete post"><i class="fa fa-trash"></i></a>
                        </button>
                        <button class="btn btn-blue mt-6 lg:w-full md:mr-0 md:ml-4 mr-6">
                            <a href="{!! url('admin/blog/' . $post->id . '/unpublish') !!}" class="text-yellow-500 align-middle" title="Unpublish post"><i class="fa fa-undo"></i></a>
                        </button>
                    </div>
                </div>
            @endforeach
        @else
            <div class="card"><p class="list-empty">There are no published posts to display!</p></div>
        @endif
        {!! $posts->appends(Request::all())->render() !!}
    </div>

    <div class="card-col w-full">
        <h3>Drafts</h3>
        @if (count($drafts) > 0)
            @foreach($drafts as $post)
                <div class="bg-white rounded-lg p-3 w-full md:flex mb-2 relative">
                    <div class="lg:w-1/2 md:1/2 sm:w-auto">
                        <a href="{{ url('admin/blog/' . $post->id . '/edit') }}" class="uppercase tracking-wide text-sm text-indigo-600 font-bold hover:underline">{!! $post->title !!}</a>
                        <div class="block mt-1 text-lg text-gray-900"><strong>Author:</strong> {!! $post->author->username !!}</div>
                        <p class="mt-2 text-gray-600">{!! $post->extract !!}</p>
                    </div>
                    <div class="lg:w-2/5 md:w-auto sm:w-auto">
                        <div class="py-4 lg:px-4">
                            <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none rounded-full flex lg:inline-flex" role="alert">
                                <span class="flex rounded-full bg-indigo-500 uppercase px-1 py-1 text-xs font-bold mr-3">Updated</span>
                                <span class="font-semibold mr-2 text-left text-sm flex-auto">{!! $post->updated_at->format('l jS F Y - g:i a') !!}</span>
                            </div>
                        </div>
                        <div class="py-4 lg:px-4">
                            <div class="p-2 bg-teal-900 items-center text-indigo-100 leading-none rounded-full flex lg:inline-flex" role="alert">
                                <span class="flex rounded-full bg-teal-500 uppercase px-2 py-1 text-xs font-bold mr-3">Categories</span>
                                <span class="font-semibold mr-2 text-left text-sm flex-auto">{{ $post->categories_display }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="lg:absolute md:w-auto sm:w-auto top-0 right-0 xl:h-full text-center">
                        <button class="btn btn-blue mt-6 lg:w-full md:mr-0 md:ml-4 mr-6">
                            <a href="{!! url('admin/blog/' . $post->id . '/edit') !!}" class="text-green-500 align-middle" title="Edit post"><i class="fa fa-edit"></i></a>
                        </button>
                        <button class="btn btn-blue mt-6 lg:w-full md:mr-0 md:ml-4 mr-6">
                            <a href="{!! url('admin/blog/' . $post->id . '/delete') !!}" class="text-red-500 align-middle delete-confirm" title="Delete post"><i class="fa fa-trash"></i></a>
                        </button>
                        <button class="btn btn-blue mt-6 lg:w-full md:mr-0 md:ml-4 mr-6">
                            <a href="{!! url('admin/blog/' . $post->id . '/publish') !!}" class="text-blue-500 align-middle" title="Publish post"><i class="fa fa-paper-plane"></i></a>
                        </button>
                    </div>
                </div>
            @endforeach
        @else
            <div class="card"><p class="list-empty">There are no draft posts to display!</p></div>
        @endif
    </div>
</div>
@stop

@section('templates')
<div id="overlay"></div>
{!! Form::open(['route' => 'admin.blog.create', 'id' => 'create-record-form', 'class' => 'card modal max-w-2xl' . (count($errors) ? ' errors' : '')]) !!}
    <header class="mb-4 px-1">
        <h3>Create a new post</h3>
    </header>
    <div>
        <fieldset class="mb-6 px-1">
            {!! Form::label('label', 'Post title', ['class' => 'field-label']) !!}
            {!! Form::text('title', '', ['id' => 'title', 'class' => 'field-input', 'placeholder' => 'Post title', 'data-validation' => 'req']) !!}
            <span class="field-error">{!! $errors->first('title') !!}</span>
        </fieldset>
        <fieldset class="px-1">
            {!! Form::button('Create', ['type' => 'submit', 'class' => 'button green']) !!}
            <a role="cancel-create-record" class="button red thin">Cancel</a>
        </fieldset>
    </div>
{!! Form::close() !!}
@stop

@section('scripts')
@stop
