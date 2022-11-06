<h4>{!! $nodeContent->contentable->name !!}</h4>

@if($nodeContent->contentable->media->count() > 0)
    <ul class="flex flex-wrap">
        @foreach ($nodeContent->contentable->media as $media)
            <li>
                {!! HTML::image($media->getUrl(), $media->name, ["style" => "max-height: 200px;", "class" => "px-2"]) !!}
            </li>
        @endforeach
    </ul>
@endif

<div class="w-full px-2 mt-4 text-right">
    <a href="{!! url('/admin/sliders/' . $nodeContent->contentable->id . '/edit') !!}" class="uppercase text-green-500 font-bold text-xs tracking-wider"><i class="fa fa-edit"></i> Edit Slider</a>
</div>
