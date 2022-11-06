@extends('layouts.master')

@section('page-title'){!! $cmsPage->title !!}@stop
@section('meta-title'){!! $cmsPage->meta_title !!}@stop
@section('meta-keywords'){!! $cmsPage->meta_keywords !!}@stop
@section('meta-description'){!! $cmsPage->meta_description !!}@stop
@section('page-id'){!! $cmsPage->slug !!}@stop
@section('main-class'){!! 'products all' !!}@stop

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
  @foreach($taxonomies as $taxonomy)
    <nav class="container">
        <h4>{!! $taxonomy->name !!}</h4>
        @if (count($taxonomy->taxons))
          <ul class="row">
          @foreach($taxonomy->taxons as $taxon)
            <li>
              <a href="{!! url($cmsPage->slug . '/categories/' . $taxon->slug) !!}">{!! $taxon->name !!}</a>
            </li>
          @endforeach
          </ul>
        @endif
    </nav>
  @endforeach

  <section class="container">
    <ul class="row">
      @foreach($products as $product)
        @include('products.partials._product', ['product' => $product])
      @endforeach
    </ul>
    {!! $products->render('vendor.pagination.default') !!}
  </section>
@stop

@section('inline-scripts')
<script type="text/javascript">
</script>
@stop