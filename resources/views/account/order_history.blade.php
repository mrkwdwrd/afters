@extends('layouts.master')
@section('main-class'){!! 'account orders' !!}@stop

@section('introduction')
    <section>
        <h1>Your account</h1>
    </section>
@stop

@section('content')
    @include('account.partials._links', [ 'current' => 'orders' ])

    @if(count($orders))
        {!! $orders->links() !!}
        <table>
            <thead>
                <th>Reference No.</th>
                <th>Completed At</th>
                <th>State</th>
                <th></th>
            </thead>
            @foreach($orders as $order)
                <tr>
                    <td><a href="{!! url('/account/orders/' . $order->token . '/show') !!}">{!! $order->id !!}</a></td>
                    <td>{!! $order->completed_at ? $order->completed_at->format('d/m/Y H:i:s') : '' !!}</td>
                    <td>{!! ucfirst($order->state) !!}</td>
                    <td><a href="{!! url('/account/orders/' . $order->token . '/show') !!}" class="button">View</a></td>
                </tr>
            @endforeach
        </table>
        {!! $orders->links() !!}
    @else
        <p>You haven't placed any orders yet.</p>
    @endif
@stop
