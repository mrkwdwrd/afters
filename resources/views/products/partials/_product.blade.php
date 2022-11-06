  <li class="product">
      <a href="{!! url('shop/' . $product->slug) !!}" title="{!! $product->name !!}" class="image" style="background-image: url({!! $product->hasMedia('images') ? $product->getMedia('images')->first()->getUrl() : '' !!});">
        {{-- {!! $product->getMedia('images')->first()->getUrl() !!} --}}
      </a>
      <div>
        <h4><a href="{!! url('shop/' . $product->slug) !!}" title="{!! $product->name !!}">{!! $product->name !!}</a></h4>
        @if($product->soldOut)
          Sold Out
        @endif
      </div>
  </li>