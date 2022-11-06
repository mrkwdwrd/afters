<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\User;
use DougSisk\CountryState\CountryState;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
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
     * Form for updating details
     *
     * @return \Illuminate\Http\Response
     */
    public function getDetails()
    {
        $user = User::whereId(auth()->id())->firstOrFail();

        return view('account.details', compact('user'));
    }

    /**
     * Update details
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDetails(Request $request)
    {
        $user = User::whereId(auth()->id())->firstOrFail();

        $validator = Validator::make($request->all(), [
            'first_name'    => 'required',
            'surname'       => 'required',
            'email'         => [
                'required',
                'email',
                Rule::unique('users')->ignore(auth()->id(), 'id')
            ],
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator);

        $user->update($request->all());

        return redirect()->back()->with('success', "You have successfully updated your details!");
    }

    /**
     * Display user's wishlist
     *
     * @return \Illuminate\Http\Response
     */
    public function getWishlist()
    {
        return view('account.wishlist');
    }

    /**
     * Get order history for user
     *
     * @return \Illuminate\Http\Response
     */
    public function getOrders()
    {
        $orders = Order::where('user_id', auth()->id())
            ->whereIn('state', ['complete', 'shipped', 'paid'])
            ->orderBy('completed_at', 'DESC')
            ->paginate(10);

        return view('account.order_history', compact('orders'));
    }

    /**
     * Show order details
     *
     * @param string $token
     * @return \Illuminate\Http\Response
     */
    public function showOrder($token)
    {
        if (!$order = Order::where('token', $token)->where('user_id', auth()->id())->first()) {
            return redirect()->to('/');
        }

        return view('account.order', compact('order'));
    }

    /**
     * Get user's addresses
     *
     * @return \Illuminate\Http\Response
     */
    public function getAddresses()
    {
        $user = User::whereId(auth()->id())->firstOrFail();

        $countries = $this->countries->getCountries();

        // Set the country for initial load of country select
        $country = [];
        $country['shippingAddress'] = $user->shippingAddress ? $user->shippingAddress->country_iso : config('sitesettings.default_country');
        $country['billingAddress'] = $user->billingAddress ? $user->billingAddress->country_iso : config('sitesettings.default_country');

        // Set the state options for initial load of state select
        $states = [];
        $states['shippingAddress'] = $this->countries->getStates($user->shippingAddress ? $user->shippingAddress->country_iso : config('sitesettings.default_country'));
        $states['billingAddress'] = $this->countries->getStates($user->billingAddress ? $user->billingAddress->country_iso : config('sitesettings.default_country'));

        return view('account.addresses', compact('user', 'countries', 'country', 'states'));
    }

    /**
     * Update addresses
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAddresses(Request $request)
    {

        $user = User::whereId(auth()->id())->firstOrFail();

        $validator = Validator::make($request->all(), [
            // Shipping Address
            'shippingAddress.first_name'    => 'required',
            'shippingAddress.surname'       => 'required',
            'shippingAddress.email'         => 'required|email',
            'shippingAddress.phone'         => 'required',
            'shippingAddress.address1'      => 'required',
            'shippingAddress.city_suburb'   => 'required',
            'shippingAddress.postcode'      => 'required',
            'shippingAddress.state'         => 'filled',
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

        $shippingAddress = Address::create($request->shippingAddress);
        $user->shippingAddress()->associate($shippingAddress);

        if (isset($request->shipping_billing_same)) {
            $request->billingAddress = $request->shippingAddress;
        }

        $billingAddress = Address::create($request->billingAddress);
        $user->billingAddress()->associate($billingAddress);

        $user->save();

        return redirect()->back()->with('success', "You have successfully updated your addresses!");
    }

    /**
     * Form for change password
     *
     * @return \Illuminate\Http\Response
     */
    public function getPassword()
    {
        return view('account.password');
    }

    /**
     * Update password
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postPassword(Request $request)
    {
        $user = User::whereId(auth()->id())->firstOrFail();

        $validator = Validator::make($request->all(), [
            'password1' => 'required',
            'password2' => 'same:password1'
        ], [
            'password1.required' => "Please enter a new password",
            'password2.same' => "Please make sure your passwords match"
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => "Your password was entered incorrectly."]);
        }

        $user->update(['password' => bcrypt($request->password1)]);

        return redirect()->back()->with('success', "You have successfully updated your password!");
    }
}
