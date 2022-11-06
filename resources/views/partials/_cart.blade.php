<div class="cart {!! $cart && count($cart->items) ? 'has-items' : '' !!}" id="preview-cart">
  <div class="cart-empty">
    Your cart is empty.
  </div>
  <ul class="cart-items">
    @if($cart)
      @foreach($cart->items as $item)
        <li id="item-{!! $item->id!!}" class="cart-item">
          <div class="item-details">
            <div class="name">{!! $item->details['name'] !!}</div>
            <div class="summary">{!! $item->details['summary'] !!}</div>
          </div>
          <div class="item-qty">{!! $item->quantity !!}</div>
          <div class="item-price">{!! '$' . $item->total !!}</div>
          <div class="item-remove">
            {!! Form::button('Remove from cart', ['data-item' => $item->id, 'title' => 'Remove from cart']) !!}
          </div>
        </li>
      @endforeach
    @endif
  </ul>
  <div class="cart-summary">
    <div class="totals">
      <div class="items">
        {!! $cart ? $cart->cart_count : '0 Items' !!}
      </div>
      <div class="total">
        ${!! $cart ? $cart->item_total : '0.00' !!}
      </div>
    </div>
    <a href="{!! url('cart') !!}" title="Go to checkout" class="button">Checkout</a>
  </div>
</div>

<script type="html/template" id="cart-item-template">
  <li id="item-{id}" class="cart-item">
    <div class="item-details">
      <div class="name">{productName}</div>
      <div class="summary">{variantSummary}</div>
    </div>
    <div class="item-qty">{itemQuantity}</div>
    <div class="item-price">${itemTotal}</div>
    <div class="item-remove">
      <button data-item="{id}">Remove from cart</button>
    </div>
  </li>
</script>