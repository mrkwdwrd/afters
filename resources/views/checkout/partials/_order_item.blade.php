<li id="item-{!! $item->id!!}" class="cart-item">
    <div class="item-details">
        <div class="name"><h4>{!! $item->details['name'] !!}</h4></div>
        <div class="summary">{!! $item->details['summary'] !!}</div>
    </div>
    <div class="item-qty">
        {!! $item->quantity !!}
    </div>
    <div class="item-price">{!! '$' . number_format($item->total, 2) !!}</div>
</li>
