@extends('layouts.master')

@section('page-title'){!! $post->title !!}@stop
@section('meta-title'){!! $post->meta_title !!}@stop
@section('meta-keywords'){!! $post->meta_keywords !!}@stop
@section('meta-description'){!! $post->meta_description !!}@stop
@section('page-id'){!! $post->slug !!}@stop
@section('main-class')@stop

@section('content')
    @foreach ($post->getMedia('images') as $image)
        {!! Html::image($image->getUrl()) !!}
    @endforeach

    {{-- $post --}}

    @if($post->tags)
        <ul>
            @foreach($post->tags as $tag)
                <li><a href="{!! url('/blog?tag=' . $tag->slug) !!}">{!! $tag->name !!}</a></li>
            @endforeach
        </ul>
    @endif
    @stop

@section('inline-scripts')
@stop
