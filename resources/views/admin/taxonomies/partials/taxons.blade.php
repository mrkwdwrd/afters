@if (isset($taxons) && count($taxons) > 0)
    <ul class="nested" data-taxonomy="{{$taxons->first()->taxonomy_id}}" data-parent="{{$taxons->first()->parent_id}}" style="display:none;">
        @foreach($taxons as $taxon)
              <li id="{!! $taxon->id !!}">
                  <span>
                      <a href="{!! url('admin/taxons/'.$taxon->id.'/edit') !!}" title="Edit taxon">
                          <i class="fa fa-list-ul mr-2"></i>
                          {{$taxon->name}}
                      </a>
                      <span class="buttons">
                          <a href="{!! url('admin/taxons/'.$taxon->id.'/edit') !!}" class="text-green-500 mr-2" title="Edit taxon"><i class="fa fa-edit"></i></a>
                          <a href="{!! url('admin/taxons/'.$taxon->id.'/delete') !!}" class="text-red-500 delete-confirm" title="Delete taxon"><i class="fa fa-trash hover:text-red-600"></i></a>
                          @if($taxon->children->count() > 0)
                              <a href="#" class="open-close-button" data-taxon="{{$taxon->id}}"><i class="fa fa-caret-down"></i></a>
                          @endif
                      </span>
                  </span>
              </li>
              @include("admin.taxonomies.partials.taxons", ["taxons" => $taxon->children])
        @endforeach
    </ul>
@endif
