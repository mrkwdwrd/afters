<div class="fileuploader-item card-col w-1/2 sm:w-1/3 md:w-1/4" data-id="{{$media->id}}">
    <div class="card image">
        <a class="text-red-500 fileuploader-action-remove remove-media" data-id="{{$media->id}}"><i class="fa fa-trash"></i></a>
        <figure class="bg-gray-100">
            <div class="fileuploader-item-image">
                <img src="{{$media->getUrl()}}" />
            </div>
        </figure>
        <fieldset class="mb-2 px-1">
            <label class="field-label">Title</label>
            {!! Form::text('media_name['.$media->id.']', $media->name, ['class' => 'field-input']) !!}
        </fieldset>
        <fieldset class="mb-2 px-1">
            <label class="field-label">Description</label>
            {!! Form::textarea('media_description['.$media->id.']', $media->getCustomProperty('description'), ['class' => 'field-input h-32']) !!}
        </fieldset>
    </div>
</div>
