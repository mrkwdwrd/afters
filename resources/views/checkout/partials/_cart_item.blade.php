<li id="item-{!! $item->id!!}" class="cart-item">
    <div class="item-image">
        {!! $item->orderable->product ? $item->orderable->product->getMedia('images')->first() : $item->orderable->getMedia('images')->first() !!}
    </div>
    <div class="item-details">
        <div class="name">{!! $item->details['name'] !!}</div>
        <div class="summary">{!! $item->details['summary'] !!}</div>
    </div>
    <div class="item-qty">
        {!! Form::number('quantity[' . $item->id . ']', $item->quantity, ['min' => 0, 'max' => $item->max_qty] ) !!}
    </div>
    <div class="item-price">{!! '$' . $item->total !!}</div>
    <div class="item-remove">
        {!! Form::button('Remove from cart', ['data-item' => $item->id]) !!}
    </div>
</li>
