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

<body class="bg-gray-400">
    @include('admin.partials._messages')
    <header id="main-header" class="flex h-12 bg-white border-b border-gray-500 w-full pl-16 pr-6 fixed items-center z-50">
        <div class="app-title flex-1 overflow-hidden">
            <a href="/" target="_blank" class="font-bold text-gray-900  truncate">
                <h2 class="text-base">{!! env('APP_NAME') !!}</h2>
            </a>
        </div>
        <div class="account flex-1 text-right text-xs whitespace-nowrap">
            <a href="{!! url(env('APP_URL')) !!}" target="_blank" class="font-semibold  pl-3 text-gray-600 hover:text-blue-500 ">
                <i class="fa fa-lg fa-globe mr-1"></i>
                <span class="hidden md:inline">Open Website</span>
            </a>
            <a href="{!! route('admin.user') !!}" title="Edit User" class="font-semibold  pl-3 text-gray-600 hover:text-blue-500 ">
                <i class="fa fa-lg fa-user-circle mr-1"></i>
                <span class="hidden md:inline">{!! auth()->user()->name !!}</span>
            </a>
            {!! Form::open(['url' => 'logout', 'class' => 'inline-block pl-3']) !!}
                <button type="submit" class="font-semibold text-gray-600 hover:text-blue-500 ">
                    <i class="fa fa-lg fa-power-off mr-1"></i>
                    <span class="hidden md:inline">Log Out</span>
                </button>
            {!! Form::close() !!}
        </div>
        <nav class="bg-blue-900 absolute left-0 top-0 h-screen w-12 pr-3 overflow-hidden border-r border-blue-900 shadow-md">
            <header class="absolute top-0 h-12 w-full flex overflow-hidden items-center border-b border-blue-800">
                <h1 class="text-white text-sm align-middle block w-full">
                    <a href="{!! url('admin') !!}" title="Admin Home" class=" whitespace-nowrap">
                        <svg id="nav-icon"  viewBox="0 0 40 40" class="w-12 h-12 p-1 inline-block align-middle">
                            <use id="disc" xlink:href="{!! url('img/admin/digital-bridge-icon.svg') !!}#disc"></use>
                            <use id="pixels" xlink:href="{!! url('img/admin/digital-bridge-icon.svg') !!}#pixels"></use>
                        </svg>
                        <span class="text-white align-middle">Bridgeway Publisher</span>
                    </a>
                </h1>
            </header>
            <ul class="mt-12 px-0">
                @include('admin.partials._menu')
            </ul>
        </nav>
    </header>
    <main class="flex bg-gray-400 h-full w-full pl-16 pr-6 py-6 pt-16 z-0">
        <section class="content container mx-auto">
            @yield('content')
        </section>
    </main>

    @yield('templates')
    <script src="{{ mix('/js/admin/manifest.js') }}"></script>
    <script src="{{ mix('/js/admin/vendor.js') }}"></script>
    <script src="{{ mix('/js/admin/app.js') }}"></script>

    {!! HTML::script('vendor/fileuploader/dist/jquery.fileuploader.min.js') !!}

    @yield('scripts')

</body>
</html>
