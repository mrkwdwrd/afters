@if($product->type === 'simple')
  <div id="add-to-cart">
    <div id="product-form">
      {!! Form::hidden('orderable_id', $product->id) !!}
      {!! Form::hidden('orderable_type', $orderableTypes['product']) !!}
      @if($product->isOnSale)
        <div id="product-price" class="on-sale">
          <span class="price original">{!! $product->display_price !!}</span>
          <span class="price">{!! $product->display_sale_price !!}</span>
        </div>
      @else
        <div id="product-price">
          <span class="price">{!! $product->display_price !!}</span>
        </div>
      @endif
      {!! Form::number('qty', 1,  ['id' => 'product-qty', 'min' => 1, 'max' => $product->maxQty]) !!}
      {!! Form::button('Add to Cart') !!}
    </div>
  </div>
@endif

@if($product->type === 'variant')
  <div id="add-to-cart">
    <div id="product-variant-form">
      @if (count($product->variants->where('soldOut', false)) > 1)
        {!! Form::select('orderable_id', $product->variants->where('soldOut', false)->pluck('summary', 'id')->all(), null, ['id' => 'select-variant']) !!}
      @else
        {!! $product->variants->where('soldOut', false)->first()->summary !!}
        {!! Form::hidden('orderable_id', $product->variants->where('soldOut', false)->first()->id) !!}
      @endif
      {!! Form::hidden('orderable_type', $orderableTypes['variant']) !!}
      @if($product->variants->where('soldOut', false)->first()->isOnSale)
        <div id="variant-price" class="on-sale">
          <span class="price original">{!! $product->variants->where('soldOut', false)->first()->display_price !!}</span>
          <span class="price">{!! $product->variants->where('soldOut', false)->first()->display_sale_price !!}</span>
        </div>
      @else
        <div id="variant-price">
          <span class="price">{!! $product->variants->where('soldOut', false)->first()->display_price !!}</span>
        </div>
      @endif
      {!! Form::number('qty', 1,  ['id' => 'variant-qty', 'min' => 1, 'max' => $product->variants->where('soldOut', false)->first()->maxQty]) !!}
      {!! Form::button('Add to Cart') !!}
    </div>
    <table id="product-variant-options">
      <tbody>
        @foreach($product->variants as $variant)
          <tr id="variant_{!! $variant->id !!}" class="{!! $variant->isOnSale ? 'on-sale' : '' !!} {!! $variant->soldOut ? 'sold-out' : '' !!}">
            <td class="variant-name">
              {!! $variant->summary !!}
              @if ($variant->soldOut)
                Sold Out
              @endif
            </td>
            @if($variant->isOnSale)
              <td class="variant-price sale">
                  <span class="price original">{!! $variant->display_price !!}</span>
                  <span class="price sale">{!! $variant->display_sale_price !!}</span>
              </td>
              @else
              <td class="variant-price">
                  <span class="price">{!! $variant->display_price !!}</span>
              </td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endif
