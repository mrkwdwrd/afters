<!DOCTYPE html>
<html lang="{!! app()->getLocale() !!}" @yield('item-scope')>
	<head>
		<title>@yield('page-title')</title>
		<meta charset="utf8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
		{{-- <meta name="title" content="@yield('meta-title')"> --}}
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
		@yield('meta-other')

		<link rel="stylesheet" href="{!! mix('/css/vendor.css') !!}">
		<link rel="stylesheet" href="{!! mix('/css/app.css') !!}">
	</head>

	<body id="media">
		@include('partials._header')

		<main>
            <div class="container">
                <h3>Media Release</h3>
            </div>
			@yield('introduction')
			@yield('content')
		</main>

		@include('partials._footer')

		<script src="{!! mix('/js/manifest.js') !!}"></script>
		<script src="{!! mix('/js/vendor.js') !!}"></script>
		<script src="{!! mix('/js/app.js') !!}"></script>
	</body>
</html>
