<!DOCTYPE html>
<html lang="{!! app()->getLocale() !!}" @yield('item-scope')>
	<head>
		<title>@if (View::hasSection('page-title'))@yield('page-title') | @endif{!! config('app.name') !!}</title>
		<meta charset="utf8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
		<meta name="title" content="@yield('meta-title')">
		<meta name="keywords" content="@yield('meta-keywords')">
		<meta name="description" content="@yield('meta-description')">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta property="og:title" content="@yield('page-title')">
		<meta property="og:url" content="{!! \Request::url() !!}">
		<meta property="og:type" content="website">
		@yield('og-image')
		<link rel="icon" href="{!! url('/favicon.ico') !!}" />
		<link rel="apple-touch-icon" sizes="180x180" href="{!! url('/apple-touch-icon.png') !!}">
		<link rel="icon" type="image/png" sizes="32x32" href="{!! url('/favicon-32x32.png') !!}">
		<link rel="icon" type="image/png" sizes="16x16" href="{!! url('/favicon-16x16.png') !!}">
		<link rel="manifest" href="{!! url('/site.webmanifest') !!}">

		<script src='https://www.google.com/recaptcha/api.js'></script>

		@yield('meta-other')

		<link rel="stylesheet" href="{!! mix('/css/vendor.css') !!}">
		<link rel="stylesheet" href="{!! mix('/css/app.css') !!}">
	</head>

	<body id="@yield('page-id')">
		@yield('slider')
		@include('partials._header')

		<main class="@yield('main-class')">
			@yield('slider')
			@yield('introduction')
			@yield('content')
		</main>

		@include('partials._footer')

		<div class="overlay"></div>

		<script src="{!! mix('/js/manifest.js') !!}"></script>
		<script src="{!! mix('/js/vendor.js') !!}"></script>
		<script src="{!! mix('/js/app.js') !!}"></script>

		{!! HTML::script('/js/jqvalidate-additional-methods.js') !!}

		<!-- Polyfill for ES6 Promises for IE11, UC Browser and Android browser support -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
            @yield('inline-scripts')
            <script type="text/javascript">
                $(document).on('click', '#show-nav', function (e) {
                    e.preventDefault();
                    $(this).toggleClass('active').next('nav').toggle();
                    $('body').toggleClass('locked');
                });

                $(document).on('click', 'header nav > ul > li > a[href^="#"]', function (e) {
                e.preventDefault();
                const target = $($(this).attr('href'));
                            $('#show-nav').toggleClass('active').next('nav').toggle();
                            $('body').toggleClass('locked');
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
            });
			</script>
	</body>
</html>
