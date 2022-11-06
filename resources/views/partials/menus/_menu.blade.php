@if(count($children) > 0)
    <ul>
        @foreach($children as $child)
            @if($child->show_in_nav)
                <li><a href="{{ url($child->slug) }}" title="{{ $child->title }}">{{ $child->label }}</a>
                {!! View::make('partials.menus._menu')->with(['children' => $child->children, 'currentMenu' => $child]) !!}
            @endif
        @endforeach
    </ul>
@endif
