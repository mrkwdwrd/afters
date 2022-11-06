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

    <section class="container">
      <h1>{!! $cmsPage->title !!}</h1>
      <h2>{!! $cmsPage->subtitle !!}</h2>
      {!! $cmsPage->content !!}
    </section>
@stop

@section('content')
  @foreach($taxonomies as $taxonomy)
    <nav class="container">
        <h4>{!! $taxonomy->name !!}</h4>
        @if (count($taxonomy->taxons))
          <ul class="row">
          @foreach($taxonomy->taxons as $category)
            <li>
              <a href="{!! url($cmsPage->slug . '/categories/' . $category->slug) !!}">{!! $category->name !!}</a>
            </li>
          @endforeach
          </ul>
        @endif
    </nav>
  @endforeach
@stop

@section('inline-scripts')
<script type="text/javascript">
</script>
@stop