<figure class="fileuploader-item bg-gray-100 rounded" data-id="{{$media->id}}">
    <figure class="bg-gray-100">
        <div class="fileuploader-item-image">
            <img src="{{$media->getUrl()}}" />
        </div>
    </figure>
    <a class="text-red-500 remove-media" data-id="{{$media->id}}"><i class="fa fa-trash"></i></a>
</figure>
