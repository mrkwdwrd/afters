<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Libraries\Utils;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
  /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

  use RegistersUsers;

  /**
   * Where to redirect users after registration.
   *
   * @var string
   */
  protected $redirectTo = RouteServiceProvider::HOME;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest');
  }

  /**
   * Get register view
   *
   * @return \Illuminate\Http\Response
   */
  public function showRegistrationForm()
  {
    return view("auth.register");
  }


  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\Models\User
   */
  protected function create(array $data)
  {
    return User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => Hash::make($data['password']),
    ]);
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param Request $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function register(Request $request)
  {
    $validator = Validator::make($request->all(), [
      "first_name" => "required",
      "surname" => "required",
      "email" => "required|email|unique:users,email",
      "password" => "required",
      "password_confirmation" => "same:password"
    ], [
      "first_name.required" => "Please enter your first name",
      "surname.required" => "Please enter your surname",
      "email.required" => "Please enter your email address",
      "email.email" => "Please enter a valid email address",
      "email.unique" => "Sorry, that email has already been taken",
      "password.required" => "Please enter a password for your account",
      "password_confirmation.same" => "Please make sure your password confirmation matches your password"
    ]);

    if ($validator->fails())
      return redirect()->back()->withErrors($validator)->withInput($request->all());

    $user = User::create([
      "first_name" => $request->first_name,
      "surname" => $request->surname,
      "email" => $request->email,
      "password" => bcrypt($request->password)
    ]);

    Auth::login($user);
    Utils::syncCart($user);

    return redirect()->to("/")->with("success", "You have successfully created an account!!");
  }
}
