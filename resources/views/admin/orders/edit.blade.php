@extends("admin.layouts.master")

@section('content')
<a href="{!! url('admin/orders/') !!}" title="Orders" class="block text-xs font-semibold text-gray-600 hover:text-blue-500 -mb-2"><i class="fa fa-caret-left mr-2"></i>Back to orders</a>
{!! Form::model($order, ['route' => ['admin.orders.update', $order->id], 'method' => 'PUT',  'enctype' => 'multipart/form-data']) !!}
    <div class="section-head">
        <div class="content">
            <h2 class="mb-2">Order #{!! $order->number !!}</h2>
            <div class="text-sm md:text-base">
            </div>
        </div>
        @if($order->state === 'shipped')
        <span class="mb-2">
            <span class="button green light">Shipped: {!! $order->shipped_at->format('d-m-Y H:i:s') !!}</span>
        </span>
        @elseif($order->state === 'refunded')
            <span class="button yellow light">Refunded</span>
        @elseif($order->state === 'cancelled')
            <span class="button red light">Cancelled</span>
        @else
        <span class="mb-2">
            <a href="{!! url('admin/orders/' . $order->id . '/cancelled') !!}" title="Mark order as Cancelled" class="button red thin flex-shrink-0 mb-2">Cancelled</a>
            <a href="{!! url('admin/orders/' . $order->id . '/refunded') !!}" title="Mark order as Refunded" class="button yellow thin flex-shrink-0">Refunded</a>
            <a href="{!! url('admin/orders/' . $order->id . '/shipped') !!}" title="Mark order as Shipped" class="button green flex-shrink-0 mb-5">Mark As Shipped</a>
        </span>
        @endif
    </div>

    <div class="card-group">
        <div class="card-col w-full">
            <div class="card">
                <div class="flex flex-wrap">
                    <div class="w-1/3">
                        <h4>Shipping Address</h4>
                        <p>{!! $order->shippingAddress->name !!}<br/>
                        {!! $order->shippingAddress->company !!}<br/>
                        {!! $order->shippingAddress->address1 !!}<br/>
                        @if($order->shippingAddress->address2)
                        {!! $order->shippingAddress->address2 !!}<br/>
                        @endif
                        {!! $order->shippingAddress->city_suburb !!} {!! $order->shippingAddress->state !!} {!! $order->shippingAddress->postcode !!}<br/>
                        {!! $order->shippingAddress->country->getName() !!}</p>
                    </div>

                    <div class="w-1/3">
                        <h4>Billing Address</h4>
                        <p>{!! $order->billingAddress->name !!}<br/>
                        {!! $order->billingAddress->company !!}<br/>
                        {!! $order->billingAddress->address1 !!}<br/>
                        @if($order->billingAddress->address2)
                        {!! $order->billingAddress->address2 !!}<br/>
                        @endif
                        {!! $order->billingAddress->city_suburb !!} {!! $order->billingAddress->state !!} {!! $order->billingAddress->postcode !!}<br/>
                        {!! $order->billingAddress->country->getName() !!}</p>
                    </div>

                    <div class="w-1/3">
                        {!! Form::label('tracking_number', 'Tracking Number', ['class' => 'field-label']) !!}
                        <fieldset class="mb-6 px-1 flex">
                            {!! Form::text('tracking_number', null, ['class' => 'field-input', 'placeholder' => 'Tracking Number']) !!}
                            {!! Form::submit('Add', ['class' => 'button blue ml-4']) !!}
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full mt-8 mb-4 px-2">
            <h3>Order details</h3>
        </div>
        <div class="card-col w-full">
            <div class="card">
                <div class="flex flex-wrap">
                    <div class="w-3/5">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                    <tr>
                                        <td>{!! $item->details['name'] !!} {!! $item->details['summary'] !!}</td>
                                        <td>{!! $item->quantity !!}</td>
                                        <td>{!! '$' . $item->total !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="w-2/5 pl-5">
                        <table class="w-full">
                            <tbody>
                                <tr>
                                    <th>{!! $order->cart_count !!}</td>
                                    <td class="text-right">{!! '$' . $order->item_total !!}</td>
                                </tr>
                                <tr>
                                    <th>Subtotal</th>
                                    <td class="text-right">${!! $order->item_total !!}</td>
                                </tr>
                                <tr>
                                    <th>Discount</th>
                                    <td class="text-right">- ${!! $order->coupon_discount !!}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td class="text-right font-bold">${!! $order->total !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="w-full mt-8 mb-4 px-2">
        <h3>Payment attempts</h3>
    </div>
    <div class="card-group">
        <div class="card-col w-full">
            <div class="card">
                <div class="flex flex-wrap">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th>Payment Method</th>
                                <th>Amount</th>
                                <th>State</th>
                                <th>Reference</th>
                                <th>Card Type</th>
                                <th>Card Name</th>
                                <th>Card Expiry</th>
                                <th>Card Last Digits</th>
                                <th>Attempted at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->payments as $payment)
                            <tr>
                                <th>{!! ucfirst(str_replace('_', ' ', $payment->payment_method)) !!}</th>
                                <th>{!! '$' . $payment->amount !!}</th>
                                <th>{!! ucfirst($payment->state) !!}</th>
                                <th>{!! $payment->transaction_reference !!}</th>
                                <th>{!! $payment->card_type !!}</th>
                                <th>{!! $payment->card_name !!}</th>
                                <th>{!! $payment->card_expiry !!}</th>
                                <th>{!! $payment->card_last_digits !!}</th>
                                <th>{!! $payment->updated_at->format('d-m-Y H:i:s') !!}</th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('scripts')
@stop
