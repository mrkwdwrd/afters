<div class="w-full px-2 mb-2">
    <h4>{!! $nodeContent->contentable->name !!}</h4>
    {!! $nodeContent->contentable->description !!}
</div>
<dl class="accordion">
    @foreach($nodeContent->contentable->items as $entry)
        <dt><i class="fa fa-plus"></i> {!! $entry->title !!}</dt>
        <dd>{!! $entry->content !!}</dd>
    @endforeach
</dl>
<div class="w-full px-2 mt-4 text-right">
    <a href="{!! url('/admin/accordions/' . $nodeContent->contentable->id . '/edit') !!}" class="uppercase text-green-500 font-bold text-xs tracking-wider"><i class="fa fa-edit"></i> Edit Accordion</a>
</div>
