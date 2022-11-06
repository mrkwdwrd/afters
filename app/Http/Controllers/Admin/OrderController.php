<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::when(isset(request()->email), function ($query) {
            return $query->where('email', 'LIKE', '%' . request()->email . '%');
        })->when(isset(request()->status), function ($query) {
            return $query->where('state', request()->status);
        })->whereNotNUll('completed_at')->orderBy('id', 'DESC')->paginate(50);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * View order
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::where('id', $id)->firstOrFail();

        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update order
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $order = Order::where('id', $id)->firstOrFail();

        $order->update($request->all());

        return redirect()->back()->with('success', 'You have successfully updated this order!');
    }

    /**
     * Mark order as cancelled
     *
     * @param int $id
     * @return void
     */
    public function orderCancelled($id)
    {
        $order = Order::where('id', $id)->firstOrFail();

        $order->update([
            'state' => Order::CANCELLED
        ]);

        return redirect()->back()->with('success', 'You have successfully marked this order as cancelled!');
    }

    /**
     * Mark order as refunded
     *
     * @param int $id
     * @return void
     */
    public function orderRefunded($id)
    {
        $order = Order::where('id', $id)->firstOrFail();

        $order->update([
            'state' => Order::REFUNDED
        ]);

        return redirect()->back()->with('success', 'You have successfully marked this order as refunded!');
    }

    /**
     * Mark order as shipped
     *
     * @param int $id
     * @return void
     */
    public function orderShipped($id)
    {
        $order = Order::where('id', $id)->firstOrFail();

        $order->update([
            'state'         => Order::SHIPPED,
            'shipped_at'    => Carbon::now()
        ]);

        Mail::to($order->shippingAddress->email)->send(new OrderShipped($order));

        return redirect()->back()->with('success', 'You have successfully marked this order as shipped!');
    }
}
