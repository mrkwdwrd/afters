<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::when(!empty(request()->search_field) && !empty(request()->search), function($query) {
                            return $query->where(request()->search_field, "LIKE", "%".request()->search."%");
                        })->paginate(50);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Create a new user
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'                => 'required',
            'surname'                   => 'required',
            'email'                     => 'required|email|unique:users',
            'password'                  => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'username' => Str::slug($request->first_name . ' ' . $request->surname),
            'first_name' => $request->first_name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('admin.users.edit', $user->id)->with('success', 'You have successfully created this user!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     *
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name'                => 'required',
            'surname'                   => 'required',
            'username'                  => 'required',
            'email'                     => [
                'required',
                'email',
                Rule::unique('users')->ignore($id, 'id')
            ],
            'password'                  => 'nullable|min:8',
            'password_confirmation'     => 'nullable|required_with:password|min:8|same:password'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->withInput();
        }

        $user = User::find($id);
        $data = $request->except('password');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->update($data);
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'You have successfully updated this user!');
    }

    /**
     * Send a password reset to the user
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function sendPasswordReset($id)
    {
        $user = User::find($id);
        Password::broker()->sendResetLink(['email' => $user->email]);

        return redirect()->route('admin.users.edit', $user->id)->with('success', 'You have successfully sent this user a password reset!');
    }

    /**
     * Edit your own details
     *
     * @return \Illuminate\Http\Response
     */
    public function editSelf()
    {
        $user = Auth::user();

        return $this->edit($user->id);
    }

    /**
     * Delete a user
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        User::where('id', $id)->delete();

        return redirect()->route('admin.users.index')->with('success', 'You have successfully deleted this user!');
    }
}
