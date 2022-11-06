<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Validator;

class OrderController extends Controller
{

  /**
   * Create new order
   *
   * @return Order
   */
  private function createOrder()
  {
    session(['token' => md5(uniqid(mt_rand(), true))]);

    $user = User::whereId(auth()->id())->first();

    $order = Order::create([
      'user_id'             => auth()->id(),
      'email'               =>  $user ? $user->email : null,
      'state'               => 'cart',
      'completed_at'        => null,
      'token'               => session('token'),
      'shipping_address_id' => $user ? $user->shipping_address_id : null,
      'billing_address_id'  => $user ? $user->billing_address_id : null
    ]);

    return $order;
  }

  /**
   * Get our current order
   *
   * @return Order | null
   */
  public function getOrder()
  {
    return Order::where('token', session('token'))->first();
  }

  /**
   * Display cart
   *
   * @return \Illuminate\Http\Response
   */
  public function getCart()
  {
    if (!$order = $this->getOrder()) {
      return redirect()->route('products.index');
    }

    return view('checkout.cart', compact('order'));
  }

  /**
   * Update cart
   *
   * @param Request $request
   * @return \Illuminate\Http\Response
   */
  public function updateCart(Request $request)
  {
    if (!$order = $this->getOrder()) {
      return redirect()->route('products.index');
    }

    foreach ($request->get('quantity') as $id => $qty) {
      $item = OrderItem::where('order_id', $order->id)->where('id', $id)->first();
      $qty = $this->validateItemQty($item, $qty);
      if ($qty > 0) {
        $item->update([
          'quantity' => $qty,
          'price'   =>  $item->orderable->itemPrice,
          'total'   =>  $qty * $item->orderable->itemPrice
        ]);
      } else {
        $item->delete();
      }
    }

    $order = $this->updateOrderTotals($order);

    return redirect()->route('cart.show')->with('success', "Your cart has been updated!");
  }

  /**
   * Add item to cart
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function addItem(Request $request)
  {
    if (!$order = $this->getOrder()) {
      $order = $this->createOrder();
    }

    $validator = Validator::make($request->all(), [
      'orderable_type'  => 'required',
      'orderable_id'    => 'required',
      'quantity'        => 'required|min:1'
    ]);

    if ($validator->fails()) {
      return response()->json(['errors' => $validator->messages()], 400);
    }

    $type = $request->orderable_type::whereId($request->orderable_id)->firstOrFail();

    if ($type->sold_out) {
      return response()->json(['errors' => 'Sold Out'], 400);
    }

    if ($item = $order->items->where('orderable_type', $request->orderable_type)->where('orderable_id', $request->orderable_id)->first()) {
      $item->update([
        'quantity'  => $this->validateItemQty($item, $item->quantity + $request->quantity)
      ]);
    } else {
      $item = OrderItem::create($request->all() + [
        'order_id'    => $order->id
      ]);
    }
    $item->update([
      'price'   => $item->orderable->itemPrice,
      'total'   => $item->quantity * $item->orderable->itemPrice,
      'details' => [
        'sku'     => $item->orderable->sku,
        'name'    => $item->orderable->product ? $item->orderable->product->name : $item->orderable->name,
        'summary' => $item->orderable->product ? $item->orderable->summary : '',
      ]
    ]);

    $order = $this->updateOrderTotals($order);

    return response()->json(['success' => true, 'item' =>  $item], 200);
  }

  /**
   * Remove item from cart
   *
   * @param Request $request
   * @return \Illuminate\Http\Response
   */
  public function removeItem(Request $request)
  {
    $order = $this->getOrder();

    if ($order) {
      OrderItem::where('order_id', $order->id)->where('id', $request->id)->delete();
    }

    $order = $this->updateOrderTotals($order);

    return response()->json(['success' => true], 200);
  }

  /**
   * Completed order screen
   *
   * @return \Illuminate\Http\Response
   */
  public function complete($token)
  {
    if (!$order = Order::where('token', $token)->first()) {
      return redirect()->to('/');
    }

    return view('checkout.complete', compact('order'));
  }

  /**
   * Don't allow item qty to exceed stock_on_hand
   *
   * @param OrderItem $item
   * @param int $qty
   * @return int
   */
  private function validateItemQty(OrderItem $item, $qty)
  {
    if ($item->orderable->is_limited) {
      $stock_on_hand = $item->orderable->stock_on_hand;
      if ($qty  > $stock_on_hand) {
        return $stock_on_hand;
      }
    }
    return $qty;
  }

  /**
   * Update order totals
   *
   * @param Order $order
   * @return Order
   */
  private function updateOrderTotals(Order $order)
  {
    $item_total = $order->item_total;
    $coupon_discount = $order->coupon_discount;
    $subtotal = max($item_total - $coupon_discount, 0);
    $total = $subtotal + $order->shipping_total;
    $tax = $total / 11; // TODO: use rate in sitesettings

    $order->update([
      'item_total'          => $item_total,
      'coupon_discount'     => $coupon_discount,
      'subtotal'            => $subtotal,
      'shipping_total'      => 0,
      'total'               => $total,
      'tax'                 => $tax,
      'shipping_method_id'  => null
    ]);

    return $order;
  }
}
