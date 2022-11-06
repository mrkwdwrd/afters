<div class="w-full px-2 mb-2">
    <h4>{!! $nodeContent->contentable->name !!}</h4>
    {!! $nodeContent->contentable->description !!}
</div>
<ul class="gallery">
    @foreach($nodeContent->contentable->getMedia('images') as $asset)
        <li>
            {!! HTML::image($asset->getUrl(), $asset->name); !!}
        </li>
    @endforeach
</ul>
<div class="w-full px-2 mt-4 text-right">
    <a href="{!! url('/admin/galleries/' . $nodeContent->contentable->id . '/edit') !!}" class="uppercase text-green-500 font-bold text-xs tracking-wider"><i class="fa fa-edit"></i> Edit Gallery</a>
</div>
