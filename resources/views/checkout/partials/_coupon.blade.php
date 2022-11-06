{!! Form::open(['route' => 'checkout.coupon', 'method' => 'POST']) !!}
    {!! Form::text('coupon', null) !!}
    {!! Form::button('Apply', ['class' => 'button', 'type' => 'submit']) !!}
    @if($order->coupon)
        <a href="{!! url('checkout/coupon') !!}">Remove Coupon</a>
    @endif
{!! Form::close() !!}