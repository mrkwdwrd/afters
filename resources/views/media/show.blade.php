@extends('layouts.media')

@section('introduction')
@stop

@section('content')
    <div class="container">
        <header>
            <h1>Placeholders</h1>
            <h2>Debut Single from Afters</h2>
        </header>

        <div class="media">
            <div class="soundcloud">
                <iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1475630557%3Fsecret_token%3Ds-hTmogxdWAuD&color=%23cacac8&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"><a href="https://soundcloud.com/afters-316312086" title="Afters" target="_blank" style="color: #cccccc; text-decoration: none;">Afters</a> · <a href="https://soundcloud.com/afters-316312086/placeholders-16-44-master/s-hTmogxdWAuD" title="Placeholders" target="_blank" style="color: #cccccc; text-decoration: none;">Placeholders</a></div>
            </div>
            <div class="download">
                <a class="button">
                    Download
                </a>
            </div>
        </div>

        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Maecenas faucibus mollis interdum. Curabitur blandit tempus porttitor.</p>

        <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nullam quis risus eget urna mollis ornare vel eu leo. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec ullamcorper nulla non metus auctor fringilla. Cras mattis consectetur purus sit amet fermentum.</p>

        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Curabitur blandit tempus porttitor. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Maecenas sed diam eget risus varius blandit sit amet non magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

        <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Curabitur blandit tempus porttitor. Donec id elit non mi porta gravida at eget metus. Donec ullamcorper nulla non metus auctor fringilla.</p>

        <div class="contact">
            <ul class="links">
                <li><a href="https://facebook.com/aftersband" target="_blank"><i class="icon facebook"></i></a></li>
                <li><a href="https://instagram.com/aftersband/" target="_blank"><i class="icon instagram"></i></a></li>
                <li><a href="https://twitter.com/aftersband" target="_blank"><i class="icon twitter"></i></a></li>
                {{-- <li><a href="http://youtube.com/enolafall"><i class="icon youtube"></i></a></li>
                <li><a href="https://open.spotify.com/artist/5Jj7why6grc7rehsSSCtmb?si=f6lSJslYTdypzi80jfLfLw" target="_blank"><i class="icon spotify"></i></a></li>
                <li><a href="https://enolafall.bandcamp.com" target="_blank"><i class="icon bandcamp"></i></a></li> --}}
            </ul>
            <p><a href="mailto:us@afters.band" target="_blank">us@afters.band</a></p>
            <p><a href="https://afters.band" target="_blank">afters.band</a></p>
        </div>
    </div>

@stop

@section('inline-scripts')
@stop
