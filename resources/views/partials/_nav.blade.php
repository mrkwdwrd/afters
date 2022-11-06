<ul>
    <li><a href="https://enolafall.bandcamp.com" title="Shop" target="_blank">Shop</a>
    <li><a href="#stream" title="Stream">Stream</a>
    <li><a href="#about" title="About">About</a>
    <li><a href="#contact" title="Contact">Contact</a>
</ul>

{{-- @if(count($menus) > 0)
    <ul class="site">
        @foreach($menus as $menu)
            @if($menu->show_in_nav)
                <li><a href="{{ url($menu->slug) }}">{{ $menu->label }}</a>
                {!! View::make('partials.menus._menu')->with(['children' => $menu->children, 'currentMenu' => $menu]) !!}
            @endif
        @endforeach
    </ul>
@endif --}}
