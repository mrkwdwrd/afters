@extends('layouts.master')

@section('page-title'){!! $cmsPage->title !!}@stop
@section('page-id'){!! $cmsPage->slug !!}@stop
@section('meta-keywords'){!! $cmsPage->meta_keywords !!}@stop
@section('meta-description'){!! $cmsPage->meta_description !!}@stop
@section('main-class')@stop



@extends('layouts.master')

@section('page-title'){!! $cmsPage->title !!}@stop
@section('meta-title'){!! $cmsPage->meta_title !!}@stop
@section('meta-keywords'){!! $cmsPage->meta_keywords !!}@stop
@section('meta-description'){!! $cmsPage->meta_description !!}@stop
@section('page-id'){!! $cmsPage->slug !!}@stop
@section('main-class')@stop

@section('slider')
    @include('pages.partials._slider', ['slider' => $cmsPage->slider])
@stop

@section('introduction')
    @foreach ($cmsPage->getMedia('images') as $image)
        {!! Html::image($image->getUrl()) !!}
    @endforeach

    <section>
      <h1>{!! $cmsPage->title !!}</h1>
      <h2>{!! $cmsPage->subtitle !!}</h2>
      {!! $cmsPage->content !!}
    </section>
@stop

@section('content')
    @if (isset($tag))
        <p><strong>Posts tagged: {!! $tag->name !!}</strong></p>
    @endif

    @foreach($categories as $category)
        <a href="{!! url('/blog?category=' . $category->slug) !!}">{!! $category->name !!}</a>
    @endforeach

    @if (count($posts))
        @foreach($posts as $post)
            <a href="{!! url('/blog/' . $post->slug) !!}">{!! $post->title !!}</a>
        @endforeach
        {!! $posts->render() !!}
    @else
        <p>There are no posts to display</p>
    @endif
@stop

@section('inline-scripts')
@stop
