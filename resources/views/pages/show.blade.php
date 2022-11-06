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
    @foreach($cmsPage->nodes as $node)
        <section id="{!! $node->slug !!}" class="content-block cols-{!! $node->columns !!}">
            @foreach($node->nodeContents as $content)
                <div id="{!! $content->contentable->slug !!}" class="{!! $content->type !!}">
                    @include('pages.partials._'.$content->partial, [$content->type => $content->contentable])
                </div>
            @endforeach
        </section>
    @endforeach
@stop

@section('inline-scripts')
@stop
