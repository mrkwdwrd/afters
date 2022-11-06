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
    {!! Form::open(['route' => 'enquiry', 'id' => 'contact-form', 'method' => 'POST']) !!}
        {!! Form::text('name', null, ['id' => 'name', 'required', 'placeholder' => 'Name']) !!}
        <span class="error">{!! $errors->first('name') !!}</span>

        {!! Form::text('email', null, ['id' => 'email', 'required', 'placeholder' => 'Email']) !!}
        <span class="error">{!! $errors->first('email') !!}</span>

        {!! Form::text('phone', null, ['id' => 'phone', 'placeholder' => 'Phone']) !!}

        {!! Form::textarea('message', null, ['id' => 'message', 'required', 'placeholder' => 'Message', 'rows' => '8']) !!}
        <span class="error">{!! $errors->first('message') !!}</span>

        <div class="g-recaptcha" data-sitekey="{{env('INVISIBLE_RECAPTCHA_SITEKEY')}}"></div>
        <span class="error">{{ $errors->first('g-recaptcha-response') }}</span>

        {!! Form::button('Submit', array('type' => 'submit', 'class' => 'button')) !!}
    {!! Form::close() !!}

    @foreach($cmsPage->nodes as $node)
        <section id="{!! $node->slug !!}" class="content-block cols-{!! $node->columns !!}">
            @foreach($node->nodeContents as $content)
                <div id="{!! $content->contentable->slug !!}" class="{!! $content->type !!}">
                    @include('pages.partials._'.$content->type, [$content->type => $content->contentable])
                </foreach>
            @endforeach
        </section>
    @endforeach
@stop

@section('inline-scripts')
    <script type="text/javascript">
        $('#contact-form').validate({
            errorElement: 'span',
            rules: {
                email: {
                    email: true
                },
                name: {
                    required: true
                },
                message: {
                    required: true
                }
            }
        });
    </script>
@stop
