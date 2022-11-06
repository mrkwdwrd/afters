@extends('layouts.master')

@section('page-title'){!! $person->first_name . ' ' . $person->surname !!}@stop
@section('page-id'){!! $person->slug !!}@stop
@section('meta-keywords')@stop
@section('meta-description')@stop
@section('main-class')@stop

@section('content')

    @foreach ($person->getMedia('images') as $image)
        {!! Html::image($image->getUrl()) !!}
    @endforeach
    {{--
        $person->first_name
        $person->surname
        $person->slug
        $person->title
        $person->content
        $person->sort_order
    --}}
@stop

@section('inline-scripts')
@stop
