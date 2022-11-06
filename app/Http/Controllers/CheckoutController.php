<?php

namespace App\Http\Controllers;

use App\Jobs\CancelCouponRedeem;
use App\Jobs\HandleCouponRedeem;
use App\Models\Order;
use App\Models\User;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Omnipay\Common\Exception\InvalidCreditCardException;
use Omnipay\Omnipay;
use App\Mail\OrderComplete;
use App\Mail\OrderPlaced;
use App\Models\Address;
use App\Models\Coupon;
use App\Models\ShippingMethod;
use DougSisk\CountryState\CountryState;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Validator;

class CheckoutController extends Controller
{
  /**
   * Create a new instance of CheckoutController
   *
   */
  public function __construct()
  {
    $this->countries = new CountryState();
  }

  /**
   * Get our current order
   *
   * @return Order | null
   */
  public function getOrder()
  {
    $order = Order::where('token', session('token'))->first();

    foreach ($order->items as $item) {
      $item->update([
        'details'  => [
          'sku'     => $item->orderable->sku,
          'name'    => $item->orderable->product ? $item->orderable->product->name : $item->orderable->name,
          'summary' => $item->orderable->product ? $item->orderable->summary : '',
        ],
        'price'   =>  $item->orderable->itemPrice,
        'total'   =>  $item->quantity * $item->orderable->itemPrice
      ]);
    }

    $item_total = $order->items->sum('total');
    $subtotal = $item_total; // TODO: item_total - discount
    $total = $subtotal + $order->shipping_total;
    $tax = $total / 11; // TODO: use rate in sitesettings

    $order->update([
      'item_total'  => $item_total,
      'subtotal'    => $subtotal,
      'tax'         => $tax,
      'total'       => $total
    ]);

    return $order;
  }

  /**
   * Checkout screen
   *
   * @return \Illuminate\Http\RedirectResponse
   */
  public function checkout()
  {
    $order = $this->getOrder();

    if (!$order->user) {
      return view('checkout.email', compact('order'));
    }

    return redirect()->to('/checkout/addresses');
  }

  /**
   * Apply a coupon
   *
   * @param Request $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function applyCoupon(Request $request)
  {
    $coupon = Coupon::where('code', $request->coupon)->first();

    if (!$coupon || Carbon::now() < $coupon->valid_from || ($coupon->valid_to && Carbon::now() > $coupon->valid_to)) {
      return redirect()->back()->with('error', "Sorry, that doesn't look like a valid coupon code");
    }

    if ($coupon->limit_to_users) {
      if ($user = $coupon->users->where('id', Auth::id())->first()) {
        if ($user->redeemed_at) {
          return redirect()->back()->with('error', "Sorry, that doesn't look like a valid coupon code");
        }
      } else {
        return redirect()->back()->with('error', "Sorry, that doesn't look like a valid coupon code");
      }
    }

    $order = $this->getOrder();

    if ($coupon->redeem_threshhold && $order->item_total < $coupon->redeem_threshhold) {
      return redirect()->back()->with('error', sprintf("Sorry, that coupon is only valid on orders over $%s", floatval($coupon->redeem_threshhold)));
    }

    $order->update([
      'coupon_id'           => $coupon->id
    ]);

    $order->update([
      'coupon_discount'     => $order->coupon_discount,
      'subtotal'            => $order->subtotal,
      'total'               => $order->total,
      'tax'                 => $order->total / 11,
    ]);

    HandleCouponRedeem::dispatch($order);

    return redirect()->back()->with('success', "You have successfully applied your coupon!");
  }

  /**
   * Remove the coupon from a cart
   *
   * @return \Illuminate\Http\Response
   */
  public function removeCoupon()
  {
    $order = $this->getOrder();

    $order->update([
      'coupon_id'           => null,
      'coupon_discount'     => $order->coupon_discount,
      'subtotal'            => $order->subtotal,
      'total'               => $order->total,
      'tax'                 => $order->total / 11,
    ]);

    CancelCouponRedeem::dispatch($order);

    return redirect()->back()->with('success', "You have successfully removed your coupon!");
  }

  /**
   * Update email via AJAX
   *
   * @param Request $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function postEmail(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'email'    => 'required|email'
    ]);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator);
    }

    $order = $this->getOrder();
    $order->update(['email' => $request->email]);

    return redirect()->to('/checkout/addresses');
  }

  /**
   * Form for setting addresses
   *
   * @return \Illuminate\Http\Response
   */
  public function getAddresses()
  {
    $order = $this->getOrder();

    $countries = $this->countries->getCountries();

    $country = [];
    $country['shippingAddress'] = config('sitesettings.default_country');
    $country['billingAddress'] = config('sitesettings.default_country');

    $default_states = [];
    foreach ($this->countries->getStates(config('sitesettings.default_country')) as $key => $val) {
      $default_states = Arr::add($default_states, $val, $val);
    }

    $states = [];
    $states['shippingAddress'] = $default_states;
    $states['billingAddress'] = $default_states;

    if ($user = User::whereId(auth()->id())->first()) {
      $country['shippingAddress'] = $user->shippingAddress ? $user->shippingAddress->country_iso : config('sitesettings.default_country');
      $country['billingAddress'] = $user->billingAddress ? $user->billingAddress->country_iso : config('sitesettings.default_country');

      $states['shippingAddress'] = $this->countries->getStates($user->shippingAddress ? $user->shippingAddress->country_iso : config('sitesettings.default_country'));
      $states['billingAddress'] = $this->countries->getStates($user->billingAddress ? $user->billingAddress->country_iso : config('sitesettings.default_country'));
    }

    return view('checkout.addresses', compact('order', 'countries', 'country', 'states'));
  }

  /**
   * Update addresses
   *
   * @param Request $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function postAddresses(Request $request)
  {
    $validator = Validator::make($request->all(), [
      // Shipping Address
      'shippingAddress.first_name'    => 'required',
      'shippingAddress.surname'       => 'required',
      'shippingAddress.email'         => 'required|email',
      'shippingAddress.phone'         => 'required',
      'shippingAddress.address1'      => 'required',
      'shippingAddress.city_suburb'   => 'required',
      'shippingAddress.postcode'      => 'required',
      'shippingAddress.state'         => 'sometimes|required',
      'shippingAddress.country_iso'   => 'required',

      // Billing Addtress - only validate if not same as shipping
      'billingAddress.first_name'    => 'required_without:shipping_billing_same',
      'billingAddress.surname'       => 'required_without:shipping_billing_same',
      'billingAddress.email'         => 'required_without:shipping_billing_same|nullable|email',
      'billingAddress.phone'         => 'required_without:shipping_billing_same',
      'billingAddress.address1'      => 'required_without:shipping_billing_same',
      'billingAddress.city_suburb'   => 'required_without:shipping_billing_same',
      'billingAddress.postcode'      => 'required_without:shipping_billing_same',
      'billingAddress.state'         => 'sometimes|required_without:shipping_billing_same',
      'billingAddress.country_iso'   => 'required_without:shipping_billing_same',
    ], [
      'shippingAddress.first_name.required'    => 'First name is required',
      'shippingAddress.surname.required'       => 'Surname is required',
      'shippingAddress.email.required'         => 'Email is required',
      'shippingAddress.email.email'            => 'Must be a valid email address',
      'shippingAddress.phone.required'         => 'Phone number is required',
      'shippingAddress.address1.required'      => 'Address is required',
      'shippingAddress.city_suburb.required'   => 'City/Suburb is required',
      'shippingAddress.postcode.required'      => 'Post code is required',
      'shippingAddress.state.required'         => 'State is required',
      'shippingAddress.country_iso.required'   => 'Country is required',

      'billingAddress.first_name.required_without'    => 'First name is required',
      'billingAddress.surname.required_without'       => 'Surname is required',
      'billingAddress.email.required_without'         => 'Email is required',
      'billingAddress.email.email'                    => 'Must be a valid email address',
      'billingAddress.phone.required_without'         => 'Phone number is required',
      'billingAddress.address1.required_without'      => 'Address is required',
      'billingAddress.city_suburb.required_without'   => 'City/Suburb is required',
      'billingAddress.postcode.required_without'      => 'Post code is required',
      'billingAddress.state.required_without'         => 'State is required',
      'billingAddress.country_iso.required_without'   => 'Country is required',
    ]);

    if ($validator->fails()) {
      return redirect()->back()->withInput()->withErrors($validator);
    }

    $order = $this->getOrder();
    $user = User::whereId(auth()->id())->first();

    if ($validator->fails()) {
      return redirect()->back()->withInput()->withErrors($validator);
    }

    // Create new shipping address if not set for order or request doesn't match existing
    if (!$order->shippingAddress || $order->shippingAddress->only($order->shippingAddress->getFillable()) !== $request->shippingAddress) {
      $shippingAddress = Address::create($request->shippingAddress);
      $order->shippingAddress()->associate($shippingAddress);
    }

    // Copy shipping address to billing address if they're to be the same
    if (isset($request->shipping_billing_same)) {
      $request->billingAddress = $request->shippingAddress;
    }

    // Create new billing address if not set for order or request doesn't match existing
    if (!$order->billingAddress || $order->billingAddress && $order->billingAddress->only($order->billingAddress->getFillable()) !== $request->billingAddress) {
      $billingAddress = Address::create($request->billingAddress);
      $order->billingAddress()->associate($billingAddress);
    }

    // Update the user's saved addresses if requested
    if ($user && isset($request->update_user_addresses)) {
      if ($shippingAddress) {
        $user->shippingAddress()->associate($shippingAddress);
      }
      if ($billingAddress) {
        $user->billingAddress()->associate($billingAddress);
      }
      $user->save();
    }

    // Reset shipping method and total, in case user has changed counrties
    $order->shipping_method_id = null;
    $order->shipping_total = null;

    $order->save();

    return redirect()->to('/checkout/shipping');
  }

  /**
   * Let user choose their shipping
   *
   * @return \Illuminate\Http\Response
   */
  public function getShipping()
  {
    $order = $this->getOrder();

    if (!$shippingAddress = $order->shippingAddress) {
      return redirect()->to('/checkout/addresses');
    }

    $country_iso = $shippingAddress->country_iso;
    $shippingMethods = [];
    $shippingCharges = [];
    $countryNotEnabled = true;
    $shippableItems = [];

    foreach (ShippingMethod::all() as $method) {
      if ($method->isEnabledForCountry($country_iso)) {
        $countryNotEnabled = false;
        $methodShippingItems = $method->getChargesForCountry($country_iso)->pluck('shipping_item_id')->toArray();
        foreach ($order->items as $item) {
          if ($charge = $method->getChargesForCountry($country_iso)->where('shipping_item_id', $item->orderable->shipping_item_id)->first()) {
            array_push($shippableItems, $item->id);
            $shippingMethods[$method->id] = $method;
            $shippingCharges[$method->id][$item->id] = collect([
              'base_charge' => $charge->base_charge,
              'item_charge' => $item->quantity * $charge->item_charge
            ]);
          }
        }
      }
    }

    $unshippableItems = $order->items->filter(function ($item, $key) use ($shippableItems) {
      if (!in_array($item->id, $shippableItems)) {
        return $item;
      }
    });

    foreach ($shippingMethods as $method) {
      $base_charge = collect($shippingCharges[$method->id])->max('base_charge');
      $item_charge = collect($shippingCharges[$method->id])->sum('item_charge');
      $method['shipping_charge'] = $base_charge + $item_charge;
    }

    return view('checkout.shipping', compact('order', 'shippingMethods', 'unshippableItems', 'countryNotEnabled'));
  }

  /**
   * Update user's shipping
   *
   * @param Request $request
   * @return \Illuminate\Http\Response
   */
  public function postShipping(Request $request)
  {
    $order = $this->getOrder();

    $validator = Validator::make($request->all(), [
      'shipping_method_id' => 'required'
    ], [
      'shipping_method_id.required' => 'Please select your shipping method'
    ]);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator);
    }

    $shippingMethod = ShippingMethod::whereId($request->shipping_method_id)->firstOrFail();

    $shippingCharges = [];

    foreach ($order->items as $item) {
      $charge = $shippingMethod->getChargesForCountry($order->shippingAddress->country_iso)->where('shipping_item_id', $item->orderable->shipping_item_id)->first();

      $shippingCharges[$item->id] = collect([
        'base_charge' => $charge->base_charge,
        'item_charge' => $item->quantity * $charge->item_charge
      ]);
    }
    $base_charge = collect($shippingCharges)->max('base_charge');
    $item_charge = collect($shippingCharges)->sum('item_charge');

    $order->update([
      'shipping_method_id' => $request->shipping_method_id,
      'shipping_total' => $base_charge + $item_charge
    ]);

    return redirect()->to('/checkout/payment');
  }

  /**
   * Show checkout.
   *
   * @return \Illuminate\Http\Response
   */
  public function getPayment()
  {
    $order = $this->getOrder();

    return view('checkout.payment', compact('order'));
  }

  /**
   * Post order and payment to gateway
   *
   * @param Request $request
   *
   * @return \Illuminate\Http\RedirectResponse
   */
  public function postPayment(Request $request)
  {
    $order = Order::where('token', session('token'))->first();

    $cc = $request->payment_method === Payment::CREDIT_CARD;

    $validator = Validator::make($request->all(), [
      'payment_method'    => 'required',
      'card_name'         => Rule::requiredIf($cc),
      'card_number'       => [Rule::requiredIf($cc), 'nullable', 'digits_between:15,16'],
      'card_expiry_month' => [
        Rule::requiredIf($cc), 'nullable', 'digits:2'
      ],
      'card_expiry_year'  => [
        Rule::requiredIf($cc),
        'nullable',
        'digits:4'
      ],
      'card_cvv'          => [
        Rule::requiredIf($cc),
        'nullable',
        'digits_between:3,4'
      ]
    ], [
      'card_name.required_if'         => 'The card name field is required.',
      'card_number.required_if'       => 'The card number field is required.',
      'card_expiry_month.required_if' => 'The card expiry month field is required.',
      'card_expiry_year.required_if'  => 'The card expiry year field is required.',
      'card_cvv.required_if'          => 'The card cvv field is required.'
    ]);

    if ($validator->fails()) {
      return redirect()->back()->withInput()->withErrors($validator);
    }

    // check order stock levels
    if ($outOfStockItems = $this->checkOrderStock($order)) {
      // return adjusted quitities/out of stock items
      return redirect()->to('/checkout/cancelled')->with(['items', $outOfStockItems]);
    }

    $order->update([
      'payment_method'    => $request->payment_method,
      'state'             => Order::PAYMENT
    ]);

    $payment = Payment::create([
      'amount'            => $order->total,
      'order_id'          => $order->id,
      'payment_method'    => $order->payment_method,
      'state'             => Payment::NEW_PAYMENT,
    ]);

    // Set up gateway base on payment type --- abort if none set
    if (!$gateway = $this->setupPaymentGateway($request->payment_method)) {
      return redirect()->back()->withInput()->with('error', 'Could not set payment gateway');
    }

    $purchase = [
      'amount'      => $order->total,
      'currency'    => 'AUD',
      'name'        => config('app.name') . ': Order Number - ' . $order->id,
      'description' => config('app.name') . ': Order Number - ' . $order->id . ' Payment ID - ' . $payment->id . ', Charge for ' . $order->email
    ];

    // Handle credit card checkout
    if ($request->payment_method === Payment::CREDIT_CARD) {
      // Set up card details.
      // May need to include address info for verifcation purposes (possibly gateway/region dependant)
      // https://omnipay.thephpleague.com/api/cards/
      $card = [
        'number'      => $request->get('card_number'),
        'expiryMonth' => $request->get('card_expiry_month'),
        'expiryYear'  => $request->get('card_expiry_year'),
        'cvv'         => $request->get('card_cvv'),
      ];

      $purchase['card'] = $card;

      // Update payment with card details from form request.
      // Will be overwritten by the response or available for debugging payment failure
      $payment->update([
        'card_type'         => null, // figure it out? or just wait for response?
        'card_name'         => $request->get('card_name'),
        'card_expiry'       => $request->get('card_expiry_month') . '/' . $request->get('card_expiry_year'),
        'card_last_digits'  => Str::substr($request->get('card_number'), -4)
      ]);

      try {
        $response = $gateway->purchase($purchase)->send();
      } catch (InvalidCreditCardException $e) {
        $payment->update([
          'state'            => Payment::FAILED,
          'response_details' => response()->json($e->getMessage()),
        ]);
        return back()->withInput()->with(['error' => $e->getMessage()]);
      } catch (\Exception $e) {
        $payment->update([
          'state'            => Payment::FAILED,
          'response_details' => response()->json($e->getMessage()),
        ]);
        return back()->withInput()->with(['error' => "There was an error with your payment."]);
      }

      if ($response->isSuccessful()) {
        $data = $response->getData();
        return $this->paymentCallback($order, $payment, $data, $response->getTransactionReference());
      } else {
        $payment->update([
          'state'            => Payment::FAILED,
          'response_details' => response()->json($response->getData()),
        ]);
        return back()->withInput()->with(['error' => $response->getMessage()]);
      }
    }

    // Handle PayPal checkout
    if ($request->payment_method === Payment::PAYPAL) {
      // Set up purchase details for PayPal
      $purchase['cancelUrl'] = config('services.paypal.cancel_url');
      $purchase['returnUrl'] = config('services.paypal.return_url');

      try {
        $response = $gateway->purchase($purchase)->send();
      } catch (\Exception $e) {
        $payment->update([
          'state'             => Payment::FAILED,
          'response_details'  => response()->json($e->getMessage()),
        ]);

        $order->update(['payment_reference' => false]);
        return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
      }

      if ($response->isRedirect()) {
        $payment->update([
          'state'             => Payment::AUTHORIZE,
          'token'             => $response->getData()['TOKEN'],
          'response_details'  => response()->json($response->getData())
        ]);

        session(['purchase'   => $purchase]);
        session(['payment'    => $payment->id]);
        session()->save();

        return redirect($response->getRedirectUrl());
      } else {
        $payment->update([
          'state'             => Payment::FAILED,
          'response_details'  => response()->json($response->getData())
        ]);

        $order->update(['payment_reference' => false]);

        return response()->json(['status' => 'error', 'message' => $response->getMessage()], 500);
      }
    }
  }

  /**
   * Complete the order and payment, send order confirmation email.
   *
   * @param Order   $order
   * @param Payment $payment
   * @param array   $data
   * @param string  $transactionReference
   *
   * @return \Illuminate\Http\RedirectResponse
   */
  private function paymentCallback(Order $order, Payment $payment = null, array $data = null, $transactionReference = null)
  {
    if ($payment) {
      $details = [];

      if (isset($data['payment_method_details'])) {
        // Update payment info with response
        // Card name isn't returned for some reason, so we retain this from form request
        $details = [
          'fingerprint'           => $data['payment_method_details']['card']['fingerprint'],
          'card_type'             => $data['payment_method_details']['card']['brand'],
          'card_expiry'           => $data['payment_method_details']['card']['exp_month'] . '/' . $data['payment_method_details']['card']['exp_year'],
          'card_last_digits'      => $data['payment_method_details']['card']['last4']
        ];
      }

      $payment->update([
        'state'                 => Payment::COMPLETE,
        'transaction_reference' => $transactionReference,
        'response_details'      => $payment->response_details . ' ' . response()->json($data),
      ] + $details);
    }

    $order->update([
      'state'             => Order::COMPLETE,
      'completed_at'      => Carbon::now(),
      'payment_reference' => $transactionReference
    ]);

    Mail::to($order->email)->send(new OrderComplete($order));
    if (!empty(env('EMAIL_ENQUIRY'))) {
      Mail::to(env('EMAIL_ENQUIRY'))->send(new OrderPlaced($order));
    }

    session(['token' => null]);

    return redirect('/order/' . $order->token . '/complete');
  }


  /**
   * Get stripe gateway.
   *
   * @return \Omnipay\PayPal\ExpressGateway
   */
  private function setupPaymentGateway($method)
  {
    if ($method === Payment::CREDIT_CARD) {
      $gateway = Omnipay::create(config('services.stripe.gateway'));
      return $gateway->setApiKey(config('services.stripe.secret'));
    }

    if ($method === Payment::PAYPAL) {
      $gateway = Omnipay::create(config('services.paypal.gateway'));
      $gateway->setUsername(config('services.paypal.username'));
      $gateway->setPassword(config('services.paypal.password'));
      $gateway->setSignature(config('services.paypal.signature'));
      if (!app()->environment('production')) {
        $gateway->setTestMode(true);
      }
      return $gateway;
    }
  }

  /**
   * Confirm Paypal Payment
   *
   * @param Request $request
   *
   * @return \Illuminate\Http\Response
   */
  public function confirmPayment(Request $request)
  {
    $order = Order::where('token', session('token'))->first();

    if (!$payment = Payment::whereId(session('payment'))->where('token', $request->get('token'))->first()) {
      return redirect()->route('checkout.payment');
    }

    $purchase = session('purchase');
    $purchase['token'] = $request->get('token');
    $purchase['PayerID'] = $request->get('PayerID');
    session(['purchase' => $purchase]);
    session()->save();

    $gateway = $this->setupPaymentGateway(Payment::PAYPAL);

    try {
      $response = $gateway->fetchCheckout($purchase)->send();
    } catch (\Exception $e) {
      $payment->update([
        'state'             => Payment::FAILED,
        'response_details'  => $payment->response_details . ' ' . response()->json($e->getMessage()),
      ]);

      $order->update(['payment_reference' => false]);

      return redirect()->route('checkout.payment')->with(['error' => trans('messages.payment_error')]);
    }
    if ($response->isSuccessful()) {
      $payment->update([
        'state'             => Payment::CONFIRMED,
        'payer_id'          => $purchase['PayerID'],
        'response_details'  => $payment->response_details . ' ' . response()->json($response->getData())
      ]);
      try {
        $response = $gateway->completePurchase($purchase)->send();
      } catch (\Exception $e) {
        $payment->update([
          'state' => Payment::FAILED,
          'response_details' => $payment->response_details . ' ' . response()->json($e->getMessage()),
        ]);

        $order->update(['payment_reference' => false]);

        return redirect()->route('checkout.payment')->with(['error' => trans('messages.payment_error')]);
      }

      if ($response->isSuccessful()) {
        return $this->paymentCallback($order, $payment, $response->getData(), $response->getTransactionReference());
      } else {
        $payment->update([
          'state' => Payment::FAILED,
          'response_details' => $payment->response_details . ' ' . response()->json($response->getData())
        ]);

        $order->update(['payment_reference' => false]);

        return redirect()->route('checkout.show')->with(['error' => $response->getMessage()]);
      }
    } else {
      $payment->update([
        'state'             => Payment::FAILED,
        'response_details'  => $payment->response_details . ' ' . response()->json($response->getData())
      ]);

      $order->update(['payment_reference' => false]);

      return redirect()->route('checkout.show')->with(['error' => $response->getMessage()]);
    }
  }

  public function paymentCancelled()
  {
    $order = $this->getOrder();
    if (!$order->item_count) {
      $order->update([
        'state' => Order::CART,
        'payment_method' => null,
        'shipping_method_id' => null,
        'shipping_total' => null,
      ]);
    }

    return view('checkout.cancelled', compact('order'));
  }
  /**
   * Check order items have enough stock, update stock on hand
   *
   * @param Order $order
   * @return void
   */
  private function checkOrderStock(Order $order)
  {
    $outOfStockItems = [];
    foreach ($order->items as $item) {
      // if orderable is stock limited
      if ($item->orderable->is_limited) {
        // if item qty is greater than orderable soh
        if ($item->quantity > $item->orderable->stock_on_hand) {
          // add item to outOfStockItems
          array_push(
            $outOfStockItems,
            collect([
              'name'            => $item->details['name'],
              'summary'         => $item->details['summary'],
              'requested_qty'   => $item->quantity,
              'stock_qty'       => $item->orderable->stock_on_hand
            ])
          );
          // update item qty w/ orderable soh
          $item->update(['quantity' => $item->orderable->stock_on_hand]);
        }
      }
    }
    // if order contains out of stock items
    if (count($outOfStockItems)) {
      // abort - show outOfStockItems
      return $outOfStockItems;
    }
    // otherwise, loop through items again
    foreach ($order->items as $item) {
      // if orderable is stock limited
      if ($item->orderable->is_limited) {
        // update soh with item qty
        $item->orderable->update(['stock_on_hand' => $item->orderable->stock_on_hand - $item->quantity]);
      }
    }
  }

  /**
   * Return order items to stock on hand
   *
   * @param Order $order
   * @return void
   */
  private function returnOrderStock(Order $order)
  {
    foreach ($order->items as $item) {
      // if orderable is stock limited
      if ($item->orderable->is_limited) {
        // update soh with item qty
        $item->orderable->update(['stock_on_hand' => $item->orderable->stock_on_hand + $item->quantity]);
      }
    }
  }
}
