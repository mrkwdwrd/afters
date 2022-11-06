  <li class="taxon">
      <a href="{!! url('shop/categories/' . $taxon->slug) !!}" title="{!! $taxon->name !!}" class="image" style="background-image: url({!! $taxon->image->getUrl() !!});">
      </a>
      <div>
        <h4><a href="{!! url('shop/categories/' . $taxon->slug) !!}" title="{!! $taxon->name !!}">{!! $taxon->name !!}</a></h4>
      </div>
  </li>