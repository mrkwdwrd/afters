@foreach($pages as $page)
    <li id="{{ $page->id }}" data-id="{{$page->id}}">
        <span>
            <a href="{!! url('admin/pages/'. $page->id .'/edit') !!}" title="{!! $page->title !!}">{!! $page->label !!}</a>
            <span class="buttons">
                <a href="{!! url('admin/pages/'.$page->id.'/edit') !!}" class="text-green-500 mr-2" title="Edit page"><i class="fa fa-edit"></i></a>
                <a href="#" class="text-blue-500 create-child mr-2" title="Create child page" data-id="{{$page->id}}"><i class="fa fa-plus-circle"></i></a>
                <a href="{!! url('admin/pages/'.$page->id.'/delete') !!}" class="text-red-500 delete-confirm" title="Delete page and its children"><i class="fa fa-trash"></i></a>
            </span>
        </span>
        <ul class="sortable nested" data-context="pages">
            @if(count($page->children) > 0)
                {!! View::make('admin.pages.partials._page')->with('pages', $page->children) !!}
            @endif
        </ul>
    </li>
@endforeach
