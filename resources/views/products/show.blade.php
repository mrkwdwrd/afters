@extends('layouts.master')

@section('page-title'){!! $product->meta_title ? $product->meta_title : $product->name !!}@stop
@section('meta-title'){!! $product->meta_title !!}@stop
@section('meta-keywords'){!! $product->meta_keywords !!}@stop
@section('meta-description'){!! $product->meta_description !!}@stop
@section('page-id'){!! $product->slug !!}@stop
@section('main-class'){!! 'products single' !!}@stop

@section('introduction')
    <section class="container">
        <div class="images">
            @foreach ($product->getMedia('images') as $image)
                {!! Html::image($image->getUrl()) !!}
            @endforeach
        </div>
        <div class="product details">
            <h1>{!! $product->name !!}</h1>
            @if($product->soldOut)
                <div class="product-sold-out">
                    <p>Sold Out</p>
                </div>
            @else
                @include('products.partials._add-to-cart', ['product' => $product])
            @endif
            <div class="content">
                {!! $product->introduction !!}
            </div>
        </div>
    </section>
@stop

@section('content')
<section class="container">
    <div>
        {!! $product->isOnSale ? 'On Sale' : '' !!}
        {!! $product->description !!}
    </div>
</section>
@stop

@section('inline-scripts')
@stop
