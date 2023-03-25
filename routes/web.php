<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CountryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route patterns */

Route::pattern('slug', '[a-z0-9\-]+');

/* Admin Routes */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => ['auth', 'admin_access']], function () {

        Route::get('/{index?}', [AdminHomeController::class, 'index'])->name('home')->where('index', 'home');

        Route::get('user', [UserController::class, 'editSelf'])->name('user');

        Route::view('/style', 'admin.style');

        foreach (File::allFiles(__DIR__ . '/admin') as $partial) {
            require_once $partial->getPathname();
        }
    });
});
Route::group(['prefix' => 'media', 'namespace' => 'Media', 'as' => 'media.'], function () {
    Route::view('placeholders', 'media.show');
});

Auth::routes();

Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout']);

/* Frontend Routes */
Route::get('/{index?}', [HomeController::class, 'show'])->name('home')->where('index', 'home');

Route::post('enquiry', [ContactController::class, 'sendEnquiry'])->name('enquiry');

Route::group(['prefix' => 'blog', 'as' => 'blog'], function () {
    Route::get('/', [BlogPostController::class, 'index'])->name('index');
    Route::get('{slug}', [BlogPostController::class, 'show'])->name('show');
});

Route::group(['prefix' => 'shop', 'as' => 'products.'], function () {
    Route::group(['prefix' => 'categories', 'as' => 'products.categories.'], function () {
        Route::get('/', [ProductController::class, 'categories'])->name('index');
        Route::get('/{slug}', [ProductController::class, 'category'])->name('show');
    });
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/{slug}', [ProductController::class, 'show'])->name('show');
});

Route::get('variant/{id}', [VariantController::class, 'show']);

Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
    Route::group(['middleware' => 'order_exists'], function () {
        Route::get('/', [OrderController::class, 'getCart'])->name('show');
        Route::post('/', [OrderController::class, 'updateCart'])->name('update');
    });

    Route::group(['middleware' => 'cart_details'], function () {
        Route::post('add', [OrderController::class, 'addItem'])->name('add');
        Route::post('remove', [OrderController::class, 'removeItem'])->name('remove');
    });
});

Route::group(['prefix' => 'account', 'as' => 'account.', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return redirect()->to('/account/details');
    });

    Route::get('details', [AccountController::class, 'getDetails'])->name('details');
    Route::post('details', [AccountController::class, 'postDetails'])->name('details');

    Route::get('orders', [AccountController::class, 'getOrders'])->name('orders.index');
    Route::get('order/{token}', [AccountController::class, 'showOrder'])->name('order.show');

    Route::get('addresses', [AccountController::class, 'getAddresses'])->name('addresses');
    Route::post('addresses', [AccountController::class, 'postAddresses'])->name('addresses');

    Route::get('password', [AccountController::class, 'getPassword'])->name('password');
    Route::post('password', [AccountController::class, 'postPassword'])->name('password');
});

Route::group(['prefix' => 'checkout', 'as' => 'checkout.', 'middleware' => 'order_exists'], function () {

    Route::get('/', [CheckoutController::class, 'checkout']);
    Route::post('email', [CheckoutController::class, 'postEmail'])->name('email');

    Route::post('coupon', [CheckoutController::class, 'applyCoupon'])->name('coupon');
    Route::get('coupon', [CheckoutController::class, 'removeCoupon'])->name('coupon');

    Route::get('addresses', [CheckoutController::class, 'getAddresses'])->name('addresses');
    Route::post('addresses', [CheckoutController::class, 'postAddresses'])->name('addresses');

    Route::get('shipping', [CheckoutController::class, 'getShipping'])->name('shipping');
    Route::post('shipping', [CheckoutController::class, 'postShipping'])->name('shipping');

    Route::get('payment', [CheckoutController::class, 'getPayment'])->name('payment');
    Route::post('payment', [CheckoutController::class, 'postPayment'])->name('payment');

    Route::get('confirm', [CheckoutController::class, 'confirmPayment'])->name('confirm');
});

Route::get('checkout/cancelled', [CheckoutController::class, 'paymentCancelled'])->name('checkout.cancelled');

Route::group(['prefix' => 'countries', 'as' => 'countries.'], function () {
    Route::get('/', [CountryController::class, 'getCountries']);
    Route::get('/{name}/states', [CountryController::class, 'getStates']);
});

Route::get('order/{token}/complete', [OrderController::class, 'complete'])->name('order.complete');

Route::get('{slug}', [PageController::class, 'show'])->name('pages.show');
