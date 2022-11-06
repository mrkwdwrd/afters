<div id="node-{{ $node->id }}" class="card-group node" data-id="{{$node->id}}">
    <div class="card-col w-full">
        <div class="card flex content-between w-full bg-gray-600 px-1 py-1 mb-1">
             <div class="self-start flex-grow align-stretch">
                <span class="inline-block">
                    <a href="#" class="bg-gray-400 hover:bg-gray-200 inline-block w-6 h-6 flex-grow-0 text-center rounded sortup" title="Move up" data-node-id="{{$node->id}}">
                        <i class="fa fa-chevron-up text-gray-700"></i>
                    </a>
                    <a href="#" class="bg-gray-400 hover:bg-gray-200 inline-block w-6 h-6 flex-grow-0 text-center rounded sortdown" title="Move down" data-node-id="{{$node->id}}">
                        <i class="fa fa-chevron-down text-gray-700"></i>
                    </a>
                </span>
            </div>
            <div class="self-end">
                <a href="{!! url('admin/nodes/' . $node->id .'/remove') !!}" class="bg-gray-400 hover:bg-gray-200 inline-block w-6 h-6 flex-grow-0 text-center rounded delete-node" title="Remove this node" data-id="{{$node->id}}">
                    <i class="fa fa-trash text-red-600"></i>
                </a>
            </div>
        </div>
        <div class="card">
            <div class="flex flex-wrap w-full flex-auto">
                @foreach($node->contents as $content)
                    <div class="w-{{$node->width}}">
                        @include("admin.blog.partials._".$content->node_type)
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
