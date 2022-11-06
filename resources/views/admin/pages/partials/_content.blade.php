<fieldset class="mb-2 px-1">
    {!! Form::label('cms_content_title' . $nodeContent->contentable->id, 'Title', ['class' => 'field-label']) !!}
    {!! Form::text('cms_content_title[' . $nodeContent->contentable->id . ']', $nodeContent->contentable->title,  ['id' => 'cms_content_title' . $nodeContent->contentable->id, 'class' => 'field-input']) !!}
</fieldset>
<fieldset class="mb-2 px-1">
    {!! Form::label('cms_content_type' . $nodeContent->contentable->id, 'Type', ['class' => 'field-label']) !!}
    {!! Form::select('cms_content_type[' . $nodeContent->contentable->id . ']', ['text' => 'Text', 'image' => 'Image', 'slider' => 'Slider', 'accordion' => 'Accordion', 'gallery' => 'Gallery'], $nodeContent->contentable->type, ['id' => 'cms_content_type' . $nodeContent->contentable->id, 'class' => 'selectize content_type', 'data-id' => $nodeContent->contentable->id]) !!}
</fieldset>
<fieldset class="mb-2 px-1">
    {!! Form::label('cms_content_body' . $nodeContent->contentable->id, 'Content', ['class' => 'field-label']) !!}
    <div id="text-{{ $nodeContent->contentable->id }}" {{ $nodeContent->contentable->type != 'text' ? 'hidden' : '' }}>
        {!! Form::textarea('cms_content_text[' . $nodeContent->contentable->id . ']', $nodeContent->contentable->content, ['id' => 'cms_content_text' . $nodeContent->contentable->id, 'class' => 'froala_editor', 'data-url' => '/admin/pages/' . $nodeContent->cms_page_id]) !!}
    </div>
    <div id="image-{{ $nodeContent->contentable->id }}" {{ $nodeContent->contentable->type != 'image' ? 'hidden' : '' }}>
        @if ($nodeContent->contentable->type == 'image')
            <img src="{{ $nodeContent->contentable->image }}" />
        @endif
        {!! Form::file('cms_content_image[' . $nodeContent->contentable->id . ']') !!}
    </div>
    <div id="slider-{{ $nodeContent->contentable->id}}" {{ $nodeContent->contentable->type != 'slider' ? 'hidden' : '' }}>
        {!! Form::select('cms_content_slider['.$nodeContent->contentable->id.']', [null => 'Choose Slider'] + $sliders->pluck('name', 'id')->all(), $nodeContent->contentable->content, ['id' => 'cms_content_slider' . $nodeContent->contentable->id, 'class' => 'selectize']) !!}
    </div>
    <div id="accordion-{{ $nodeContent->contentable->id}}" {{ $nodeContent->contentable->type != 'accordion' ? 'hidden' : '' }}>
        {!! Form::select('cms_content_accordion['.$nodeContent->contentable->id.']', [null => 'Choose Accordion'] + $accordions->pluck('name', 'id')->all(), $nodeContent->contentable->content, ['id' => 'cms_content_accordion' . $nodeContent->contentable->id, 'class' => 'selectize']) !!}
    </div>
    <div id="gallery-{{ $nodeContent->contentable->id}}" {{ $nodeContent->contentable->type != 'gallery' ? 'hidden' : '' }}>
        {!! Form::select('cms_content_gallery['.$nodeContent->contentable->id.']', [null => 'Choose Gallery'] + $galleries->pluck('name', 'id')->all(), $nodeContent->contentable->content, ['id' => 'cms_content_gallery' . $nodeContent->contentable->id, 'class' => 'selectize']) !!}
    </div>
</fieldset>
<fieldset class="mb-2 px-1">
    <i class="fa fa-hashtag text-gray-500 text-xs"></i>
    {!! Form::text('cms_content_slug[' . $nodeContent->contentable->type.'_'.$nodeContent->contentable->id . ']', $nodeContent->contentable->slug,  ['id' => 'cms_content_slug' . $nodeContent->contentable->id, 'class' => 'inline px-2 rounded border border-gray-500 bg-gray-100 text-gray-600 font-mono text-xs']) !!}
</fieldset>
