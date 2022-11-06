@if ($slider && $slider->hasMedia('images'))
    <section id="slider-{!! $slider->slug !!}" class="main-slider">
        @foreach($slider->getMedia('images') as $slide)
            <div class="item {{ $slide->type }}">
                @if ($slide->type == 'image')
                    <figure>
                        <div class="slide-{{ $slide->type }} slide-media" style="background-image:url({{ $slide->getUrl() }}");">
                            <img data-lazy="{{ $slide->getUrl() }}" class="image-entity" />
                        </div>
                    </figure>
                @elseif($slide->type == 'video')
                    <video class="slide-{{ $slide->type }} slide-media" loop muted preload="metadata" poster="{{ $slide->getUrl() }}">
                        <source src="{{ $slide->getUrl() }}" type="video/mp4" />
                    </video>
                @endif
                @if ($slide->name || $slide->getCustomProperty('description'))
                    <figcaption class="caption {!! $slide->getCustomProperty('position') !!}">
                        @if ($slide->name)
                            <h1>{!! $slide->name !!}</h1>
                        @endif
                        @if($slide->getCustomProperty('headline'))
                            <h2 class="headline">{!! nl2br($slide->getCustomProperty('headline')) !!}</h2>
                        @endif
                        @if($slide->getCustomProperty('subhead'))
                            <h3 class="subhead">{!! nl2br($slide->getCustomProperty('subhead')) !!}</h3>
                        @endif
                        @if($slide->getCustomProperty('description'))
                            <p class="description">{!! nl2br($slide->getCustomProperty('description')) !!}</p>
                        @endif
                        @if($slide->getCustomProperty('price_text'))
                            <h3 class="price_text">{!! nl2br($slide->getCustomProperty('price_text')) !!}</h3>
                        @endif
                        @if($slide->getCustomProperty('button_text'))
                            <p><a href="{!! $slide->getCustomProperty('button_url') ? $slide->getCustomProperty('button_url') : '#' !!}">{!! nl2br($slide->getCustomProperty('button_text')) !!}</a></p>
                        @endif
                    </figcaption>
                @endif
            </div>
        @endforeach
    </section>
@endif
