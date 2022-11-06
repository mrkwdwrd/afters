<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Validator;

class CouponController extends Controller
{
    /**
     * Index of all coupons
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all()->paginate(50);

        $couponTypes = Coupon::COUPON_TYPES;

        return view('admin.coupons.index', compact('coupons', 'couponTypes'));
    }

    /**
     * Create new coupon
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code'      => 'required|alpha_dash|unique:coupons',
            'type'      => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->withInput();
        }

        $coupon = Coupon::create($request->all() + [
            'valid_from' => Carbon::now()
        ]);

        return redirect()->to('/admin/coupons/' . $coupon->id . '/edit')->with('success', 'You have successfully created this coupon!');
    }

    /**
     * Edit existing coupon
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::where('id', $id)->firstOrFail();

        $couponTypes = Coupon::COUPON_TYPES;

        $users = User::all();

        return view('admin.coupons.edit', compact('coupon', 'couponTypes', 'users'));
    }

    /**
     * Update existing coupon
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'code'      => [
                'required',
                'alpha_dash',
                Rule::unique('coupons')->ignore($id)
            ],
            'type'      => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->withInput();
        }

        $coupon = Coupon::where('id', $id)->firstOrFail();
        $coupon->update($request->all() + [
            'limit_to_users' => isset($request->limit_to_users)
        ]);

        if ($coupon->limit_to_users && $request->select_users) {
            $coupon->users()->sync(array_merge($request->select_users, $coupon->users->pluck('id')->toArray()));
        }

        return redirect()->back()->with('success', 'You have successfully updated this coupon!');
    }

    /**
     * Delete existing coupon
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        Coupon::where('id', $id)->delete();

        return redirect()->back()->with('success', 'You have successfully deleted this coupon!');
    }

    /**
     * Delete a coupon user
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser($id, $userId)
    {
        $coupon = Coupon::where('id', $id)->firstOrFail();

        $users = $coupon->users->pluck('id')->toArray();

        if (($key = array_search($userId, $users)) !== false) {
            unset($users[$key]);
        }

        $coupon->users()->sync($users);

        return redirect()->back()->with('success', 'You have successfully deleted this user!');
    }
}
