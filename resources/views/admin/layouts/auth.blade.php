<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Bridgeway Publisher</title>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! HTML::style('vendor/fileuploader/dist/jquery.fileuploader.min.css') !!}
    {!! HTML::style('vendor/fileuploader/dist/font/font-fileuploader.css') !!}
    <link rel="stylesheet" href="{{ mix('/css/admin/vendor.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/admin/app.css') }}">
</head>
<body class="bg-blue-900">
	<main id="login">
			<section>
				<div class="card-group">
					<h1 class="text-white text-2xl align-middle block mx-auto my-5">
						<svg id="nav-icon" viewBox="0 0 40 40" class="w-16 h-16 -ml-8 p-1 inline-block align-middle">
							<use id="disc" xlink:href="{!! url('img/admin/digital-bridge-icon.svg') !!}#disc"></use>
							<use id="pixels" xlink:href="{!! url('img/admin/digital-bridge-icon.svg') !!}#pixels"></use>
						</svg>
						<span class="text-white align-middle">Bridgeway Publisher</span>
					</h1>
					@include('admin.partials._messages')
					@yield('content')
				</div>
		</section>
	</main>

		<script src="{{ mix('js/admin/manifest.js') }}"></script>
		<script src="{{ mix('js/admin/vendor.js') }}"></script>
    <script src="{{ mix('js/admin/app.js') }}"></script>

    @yield('scripts')

</body>
</html>
