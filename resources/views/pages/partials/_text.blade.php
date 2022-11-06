@if ($content->contentable->type == "text")
    @if ($content->contentable->title)
        <h2>{!! $content->contentable->title !!}</h2>
    @endif
    @if ($content->contentable->content)
        {!! $content->contentable->content !!}
    @endif
@elseif($content->contentable->type == "image")
    {!! HTML::image($content->contentable->image) !!}
@elseif($content->contentable->type == "slider")
    @include("pages.partials._slider", ["slider" => $content->contentable->slider])
@elseif($content->contentable->type == "accordion")
    @include("pages.partials._accordion", ["accordion" => $content->contentable->accordion])
@elseif($content->contentable->type == "gallery")
    @include("pages.partials._gallery", ["gallery" => $content->contentable->gallery])
@endif
