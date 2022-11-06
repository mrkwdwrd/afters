{!! Form::hidden("blog_content_ids[]", $content->content->id) !!}
<fieldset class="mb-2 px-1">
    {!! Form::label('blog_content_title_'.$content->content->id, 'Title', ['class' => 'field-label']) !!}
    {!! Form::text('blog_content_title_'.$content->content->id, $content->content->title,  ['id' => 'cms_content_title'.$content->content->id, 'class' => 'field-input']) !!}
</fieldset>
<fieldset class="mb-2 px-1">
    {!! Form::label('blog_content_content_'.$content->content->id, 'Content', ['class' => 'field-label']) !!}
    {!! Form::textarea('blog_content_content_'.$content->content->id, $content->content->content, ['id' => 'cms_content_text'.$content->content->id, 'class' => 'froala_editor', 'data-url' => '/admin/blog/'.$content->node->blog_id]) !!}
</fieldset>
