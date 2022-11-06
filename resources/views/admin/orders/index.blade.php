@extends("admin.layouts.master")

@section('content')
<div class="section-head">
    <div class="content">
        <h2 class="mb-2">Orders</h2>
        <div class="text-sm md:text-base">
            <p>Manage Orders</p>
        </div>
    </div>
</div>
<div class="card-group">
    {!! Form::open(['route' => 'admin.orders.index', 'class' => 'w-full flex flex-wrap', 'method' => 'GET']) !!}
        <div class="flex-auto mr-2 mb-2">
            {!! Form::label('email', 'Email', ['class' => 'field-label']) !!}
            {!! Form::text("email", !empty(request()->email) ? request()->email : null, ['id' => 'email', 'class' => 'field-input small flex-auto', 'placeholder' => 'Search by Email']) !!}
        </div>
        <div class="flex-auto mr-2 mb-2">
            {!! Form::label('completed', 'Completed After', ['class' => 'field-label']) !!}
            {!! Form::text("completed", !empty(request()->completed) ? request()->completed : null, ['id' => 'completed', 'class' => 'field-input small flex-auto flatpickr', 'placeholder' => 'Completed After...', 'data-alt-input' => 'true']) !!}
        </div>
        <div class="self-end text-center mb-2">
            {!! Form::submit('Apply', ['class' => 'button bg-gray-600 hover:bg-blue-500 text-white']) !!}
            <a href="{!! url()->current() . '?' . http_build_query(Arr::only(request()->query(), ['page'])) !!}" class="button red thin"><i class="fa fa-ban"></i> Clear</a>
        </div>
    {!! Form::close() !!}
</div>
<div class="card-group">
    <div class="card-col w-full">
        <ul class="pagination">
            {!! $orders->appends(request()->query())->links() !!}
        </ul>
    </div>
</div>
<div class="card-group">
    <div class="card-col w-full">
        <div class="card">
            @if (count($orders) > 0)
                <div class="table-container overflow-scroll">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Items</th>
                                <th>Shipping</th>
                                <th>Subtotal</th>
                                <th>Discount</th>
                                <th>Shipping</th>
                                <th>Total</th>
                                <th>Payment</th>
                                <th>State</th>
                                <th>Completed At</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{!! $order->number !!}</td>
                                    <td>{!! $order->billingAddress ? $order->billingAddress->name : '' !!}</td>
                                    <td>{!! $order->email !!}</td>
                                    <td>{!! $order->cart_count !!}</td>
                                    <td>{!! $order->shippingMethod->name !!}</td>
                                    <td>{!! '$' . $order->item_total !!}</td>
                                    <td>{!! $order->coupon_discount ? '-$' . number_format($order->coupon_discount, 2) : '' !!}</td>
                                    <td>{!! '$' . $order->shipping_total !!}</td>
                                    <td>{!! '$' . $order->total !!}</td>
                                    <td>{!! ucfirst(str_replace('_', ' ', $order->payment_method)) !!}</td>
                                    <td>{!! ucfirst($order->state) !!}</td>
                                    <td>{!! $order->completed_at ? $order->completed_at->format('d-m-Y H:i:s') : '' !!}</td>
                                    <td><a href="{!! url('/admin/orders/' . $order->id . '/edit') !!}" class="text-green-500 mr-2" title="View order">View</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <span class="list-empty">There are no orders to display.</span>
            @endif
        </div>
    </div>
</div>
<div class="card-group">
    <div class="card-col w-full">
        <ul class="pagination">
            {!! $orders->appends(request()->query())->links() !!}
        </ul>
    </div>
</div>
@stop

@section('templates')
@stop

@section('scripts')
@stop
