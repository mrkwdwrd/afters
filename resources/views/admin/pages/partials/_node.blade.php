<div id={{ $node->id }} class="card-group node">
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
                <span class="inline-block ml-4 w-auto">
                    <i class="fa fa-hashtag text-gray-400 text-xs"></i>
                    {!! Form::text('cms_node_slug[' . $node->id . ']', $node->slug,  ['id' => 'cms_node_slug' . $node->id, 'class' => 'inline w-auto px-2 rounded border border-gray-400 bg-gray-400 text-gray-600 font-mono text-xs']) !!}
                </span>
            </div>
            <div class="self-end">
                <a href="{!! url('admin/nodes/' . $node->id .'/remove') !!}" class="bg-gray-400 hover:bg-gray-200 inline-block w-6 h-6 flex-grow-0 text-center rounded delete" title="Remove this node">
                    <i class="fa fa-trash text-red-600"></i>
                </a>
            </div>
        </div>
        <div class="card">
            <div class="flex flex-wrap w-full flex-auto">
            @foreach($node->nodeContents as $nodeContent)
                <div class="{!! count($node->nodeContents) > 1 ? 'w-1/' . count($node->nodeContents) : 'w-full' !!}">
                    @if($nodeContent->contentable_type=="App\\Models\\CmsAccordion")
                        @include("admin.pages.partials._accordion")
                    @elseif($nodeContent->contentable_type=="App\\Models\\CmsGallery")
                        @include("admin.pages.partials._gallery")
                    @elseif($nodeContent->contentable_type=="App\\Models\\CmsContent")
                        @include("admin.pages.partials._content")
                    @elseif($nodeContent->contentable_type == "App\\Models\\CmsSlider")
                        @include("admin.pages.partials._slider")
                    @elseif($nodeContent->contentable_type == "App\\Models\\CmsTileGroup")
                        @include("admin.pages.partials._tile_group")
                    @endif
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
