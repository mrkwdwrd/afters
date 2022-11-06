        <!-- Favicons -->
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">

        <!-- Open Graph / Facebook Meta -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ env('APP_URL') }}">
        <meta property="og:title" content="{{ config('app.name') }} | @yield('page-title')">
        <meta property="og:description" content="@yield('meta-description')">
        <meta property="og:image" content="{{ asset('img/mb_metaimg.jpg') }}">

        <!-- Twitter Meta -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ env('APP_URL') }}">
        <meta property="twitter:title" content="{{ config('app.name') }} | @yield('page-title')">
        <meta property="twitter:description" content="@yield('meta-description')">
        <meta property="twitter:image" content="{{ asset('img/mb_metaimg.jpg') }}">

        <!-- Theme Color -->
        <meta name="theme-color" content="#000000">
