<div id="accordion-items-{{$item->id}}" class="card-group accordion-item" data-item-id="{{$item->id}}">
    <div class="card-col w-full">
        <div class="card flex content-between w-full bg-gray-600 px-1 py-1 mb-1">
            <div class="self-start flex-grow align-stretch">
                <span class="inline-block">
                    <a href="#" class="bg-gray-400 hover:bg-gray-200 inline-block w-6 h-6 flex-grow-0 text-center rounded sortup" title="Move up" data-item-id="{{$item->id}}">
                        <i class="fa fa-chevron-up text-gray-700"></i>
                    </a>
                    <a href="#" class="bg-gray-400 hover:bg-gray-200 inline-block w-6 h-6 flex-grow-0 text-center rounded sortdown" title="Move down" data-item-id="{{$item->id}}">
                        <i class="fa fa-chevron-down text-gray-700"></i>
                    </a>
                </span>
                <span class="inline-block ml-4 w-auto">
                    <i class="fa fa-hashtag text-gray-400 text-xs"></i>
                    {!! Form::text('anchor['.$item->id.']', '', ['id' => 'anchor-'.$item->id, 'class' => 'inline w-auto px-2 rounded border border-gray-400 bg-gray-400 text-gray-600 font-mono text-xs']) !!}
                </span>
            </div>
            <div class="self-end">
                <a href="{!! url('admin/accordions/'.$item->accordion_id.'/items/'.$item->id.'/delete') !!}" class="bg-gray-400 hover:bg-gray-200 inline-block w-6 h-6 flex-grow-0 text-center rounded delete" title="Remove this node" data-id="{{$item->id}}">
                    <i class="fa fa-trash text-red-600"></i>
                </a>
            </div>
        </div>
        <div class="card">
            <fieldset class="mb-2 px-1">
                {!! Form::label('title', 'Title', ['class' => 'field-label']) !!}
                {!! Form::text('title['.$item->id.']', $item->title, ['id' => 'title-'.$item->id, 'class' => 'field-input']) !!}
                <span class="error">{!! $errors->first('title['.$item->id.']') !!}</span>
            </fieldset>
            <fieldset class="mb-6 px-1">
                {!! Form::label('content', 'Content', ['class' => 'field-label']) !!}
                {!! Form::textarea('content['.$item->id.']', $item->content, array('id' => 'content-'.$item->id, 'class' => 'field-input', 'class' => 'froala_editor lite')) !!}
                <span class="error">{!! $errors->first('content['.$item->id.']') !!}</span>
            </fieldset>
        </div>
    </div>
</div>
