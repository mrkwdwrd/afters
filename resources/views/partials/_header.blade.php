<header>
    <div class="container">
        <div class="row">
            <a href="{!! url('/') !!}" class="logo" title="{{ env("APP_NAME") }}">{{ env("APP_NAME") }}</a>
            <a href="#" id="show-nav" title="Menu"></a>
            <nav hidden>
                @include('partials._nav')
            </nav>
        </div>
    </div>
</header>
@include('partials._messages')
