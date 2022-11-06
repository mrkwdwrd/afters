<div class="fileuploader-item card-col w-full sm:w-1/2" data-id="{{$slide->id}}">
    <div class="card image">
        <a class="text-red-500 remove-media" data-id="{{$slide->id}}"><i class="fa fa-trash"></i></a>
        <figure class="wide bg-gray-100">
            <div class="fileuploader-item-image">
                {!! HTML::image($slide->getUrl()) !!}
            </div>
        </figure>

        <fieldset class="mb-2 px-1">
            <label class="field-label">Title</label>
            {!! Form::text('media_name['.$slide->id.']', $slide->name, ['class' => 'field-input']) !!}
        </fieldset>
        <fieldset class="mb-2 px-1">
            <label class="field-label">Headline</label>
            {!! Form::text('media_headline['.$slide->id.']', $slide->getCustomProperty('headline'), ['class' => 'field-input']) !!}
        </fieldset>
        <fieldset class="mb-2 px-1">
            <label class="field-label">Subhead</label>
            {!! Form::text('media_subhead['.$slide->id.']', $slide->getCustomProperty('subhead'), ['class' => 'field-input']) !!}
        </fieldset>
        <fieldset class="mb-2 px-1">
            <label class="field-label">Description</label>
            {!! Form::textarea('media_description['.$slide->id.']', $slide->getCustomProperty('description'), ['class' => 'field-input h-32']) !!}
        </fieldset>
        <fieldset class="mb-2 px-1">
            <label class="field-label">Box Position</label>
            <select name="media_position[{{$slide->id}}]" class="selectize" data-sort="[]">
                @foreach($positions as $key => $value)
                    <option value="{!! $key !!}" {{$slide->getCustomProperty('position') == $key ? 'selected' : ''}}>{{ $value }}</option>
                @endforeach
            </select>
        </fieldset>
    </div>
</div>
