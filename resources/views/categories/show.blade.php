@extends('layouts.master')

@section('page-title'){!! $category->name !!}@stop
@section('meta-title'){!! $cmsPage->meta_title !!}@stop
@section('meta-keywords'){!! $cmsPage->meta_keywords !!}@stop
@section('meta-description'){!! $cmsPage->meta_description !!}@stop
@section('page-id'){!! $category->slug !!}@stop
@section('main-class'){!! 'products category' !!}@stop

@section('slider')
    @include('pages.partials._slider', ['slider' => $cmsPage->slider])
@stop

@section('introduction')
    @foreach ($cmsPage->getMedia('images') as $image)
        {!! Html::image($image->getUrl()) !!}
    @endforeach

    <section class="container">
        @include('categories.partials._breadcrumbs')
        <h1>{!! $category->name !!}</h1>
        {!! $cmsPage->content !!}
    </section>

@stop

@section('content')
    @if($category->children)
        <nav class="container">
            <ul class="row">
                @foreach($category->children as $category)
                <li>
                    <a href="{!! url($cmsPage->slug . '/categories/' . $category->slug) !!}">{!! $category->name !!}</a>
                </li>
                @endforeach
            </ul>
        </nav>
    @endif
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
@stop