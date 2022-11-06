@extends('layouts.master')
@section('main-class'){!! 'account wishlist' !!}@stop

@section('content')>
    @include('account.partials._links')
    <h2>Wishlist</h2>
    @if(auth()->user()->wishlist->count() > 0)
        @foreach(auth()->user()->wishlist as $item)
            @include('partials._product', ['product' => $item->product])
        @endforeach
    @else
        <p>You haven't added any items to your wishlist yet!</p>
    @endif
@stop
