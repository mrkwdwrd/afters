{{-- <h3>{!! $content->contentable->name !!}</h3> --}}
@if ($gallery->description)
    {!! $gallery->description !!}
@endif

@if ($gallery->hasMedia('images'))
    <ul>
        @foreach($gallery->getMedia('images') as $asset)
            <li>
                <figure id="{!! $gallery->slug . '-' . $asset->id !!}" class="{!! $asset->type !!} {!! $asset->extension !!}">
                    @if ($asset->type == "image")
                        {!! HTML::image($asset->getUrl(), $asset->getCustomProperty('alt')) !!}
                    @else
                        @if ($asset->icon)
                            {!! HTML::image('uploads/gallery/' . $asset->id . '/' . $asset->icon, $asset->name) !!}
                        @else
                            <img src="{!! url('img/file-icons/512px/' . $asset->extension . '.png') !!}" alt="{!! $asset->name !!}">
                        @endif
                        <a href="{!! url('uploads/gallery/' . $asset->id . '/' . $asset->file_name) !!}">{!! $asset->name !!}</a>
                    @endif

                    <figcaption>
                        @if ($asset->name)
                            <h4>{!! $asset->name !!}</h4>
                        @endif
                        @if ($asset->hasCustomProperty('description'))
                            {!! $asset->getCustomProperty('description')!!}
                        @endif
                    </figcaption>
                </figure>
            </li>
        @endforeach
    </ul>
@endif
