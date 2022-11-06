@extends('layouts.master')

@section('page-title'){!! $cmsPage->title !!}@stop
@section('meta-title'){!! $cmsPage->meta_title !!}@stop
@section('meta-keywords'){!! $cmsPage->meta_keywords !!}@stop
@section('meta-description'){!! $cmsPage->meta_description !!}@stop
@section('page-id'){!! $cmsPage->slug !!}@stop
@section('main-class')@stop

@section('og-image')
    @if($cmsPage->hasMedia('images'))
        <meta property="og:image" content="{!! $cmsPage->getMedia('images')->first()->getUrl() !!}">
    @endif
@stop

@section('slider')
    @include('pages.partials._slider', ['slider' => $cmsPage->slider])
@stop

@section('introduction')
    <section id="page-intro" style="background-image: url({!! $cmsPage->hasMedia('images') ?  $cmsPage->getMedia('images')->first()->getUrl() : '' !!});">
        <video autoplay loop muted poster="{!! url('img/clouds.jpg') !!}">
            <source src="{!! url('img/clouds.mp4') !!}" type="video/mp4">
            <source src="{!! url('img/clouds.webm') !!}" type="video/webm">
            Your browser does not support the video tag.
        </video>
        <div class="container">
            <h1 class="logo">{!! $cmsPage->title !!}</h1>
            <h2>{!! $cmsPage->subtitle !!}</h2>
            {!! $cmsPage->content !!}
            {{-- <nav>
                @include('partials._nav')
            </nav> --}}

            <ul class="links">
                <li><a href="https://facebook.com/aftersband" target="_blank"><i class="icon facebook"></i>Facebook</a></li>
                <li><a href="https://instagram.com/aftersband/" target="_blank"><i class="icon instagram"></i>Instagram</a></li>
                <li><a href="https://twitter.com/aftersband" target="_blank"><i class="icon twitter"></i>Twitter</a></li>
                {{-- <li><a href="http://youtube.com/enolafall"><i class="icon youtube"></i>YouTube</a></li>
                <li><a href="https://open.spotify.com/artist/5Jj7why6grc7rehsSSCtmb?si=f6lSJslYTdypzi80jfLfLw" target="_blank"><i class="icon spotify"></i>Spotify</a></li>
                <li><a href="https://enolafall.bandcamp.com" target="_blank"><i class="icon bandcamp"></i>Bandcamp</a></li> --}}
            </ul>
        </div>
        <div class="next">
            <a href="#" title="Next"></a>
        </div>
    </section>
@stop

@section('content')
    @foreach($cmsPage->nodes as $i => $node)
        <section id="{!! $node->slug !!}">
            <div class="container focus-within:content-block cols-{!! $node->columns !!}">
            @foreach($node->nodeContents as $content)
                <div id="{{ $content->contentable->slug }}" class="{{ $content->type }}">
                    @include('pages.partials._'.$content->type, [$content->type => $content->contentable])
                </div>
            @endforeach
            @if($node->slug === 'about')
                <ul class="links">
                    <li><a href="https://facebook.com/aftersband" target="_blank"><i class="icon facebook"></i>Facebook</a></li>
                    <li><a href="https://instagram.com/aftersband/" target="_blank"><i class="icon instagram"></i>Instagram</a></li>
                    <li><a href="https://twitter.com/aftersband" target="_blank"><i class="icon twitter"></i>Twitter</a></li>
                    {{-- <li><a href="http://youtube.com/enolafall"><i class="icon youtube"></i>YouTube</a></li>
                    <li><a href="https://open.spotify.com/artist/5Jj7why6grc7rehsSSCtmb?si=f6lSJslYTdypzi80jfLfLw" target="_blank"><i class="icon spotify"></i>Spotify</a></li>
                    <li><a href="https://enolafall.bandcamp.com" target="_blank"><i class="icon bandcamp"></i>Bandcamp</a></li> --}}
                </ul>
            @endif
            </div>
            @if (count($cmsPage->nodes) > $i + 1)
                <div class="next">
                    <a href="#" title="Next"></a>
                </div>
            @endif
        </section>
    @endforeach
@stop

@section('inline-scripts')
    <script type="text/javascript">
        $(window).on('scroll', function () {
            const header = $('body > header');
            const scroll = $(window).scrollTop();
            const threshold = header.height();
            if (scroll > threshold) {
                header.addClass('show');
            } else {
                header.removeClass('show');
            }
        });
        $(document).on('click', 'section > .next > a', function () {
            const next = $(this).closest('section').next('section');
            $('html, body').animate({
                scrollTop: next.offset().top
            }, 1000);
        });
    </script>
@stop
