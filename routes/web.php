<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Api\ApiProdukController;
use App\Http\Controllers\Api\ApiLoginController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CompleteController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\usAboutController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\OngkirController;
use App\Http\Controllers\SiteMapsController;


// Route::get('/', function () {
//     return view('home');
// });


    Route::get('/produk', [ApiProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/detail/{id}', [DetailController::class, 'index'])->name('produk.detail');
    Route::get('/produk/contact', [ContactController::class, 'show'])->name('produk.contact');
    Route::post('/produk/contact', [ContactController::class, 'send'])->name('produk.contact.send');
    Route::get('/change/address', [AddressController::class, 'index'])->name('change.address');
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('loginproses', [LoginController::class, 'login'])->name('loginproses');
    Route::post('/register/proses', [LoginController::class, 'register'])->name('register.proses');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/logout/proses', [ApiLoginController::class, 'logoutproses'])->name('logoutproses');
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('complete', [CompleteController::class, 'index'])->name('complete');
    Route::get('privacyPolicy', [PrivacyPolicyController::class, 'index'])->name('privacyPolicy');
    Route::get('/usabout', [usAboutController::class, 'index'])->name('usabout');
    Route::post('/save-subtotal', [CheckoutController::class, 'saveSubtotal'])->name('saveSubtotal');
    Route::get('/provinces', [OngkirController::class, 'getProvinces']);
    Route::get('/city', [OngkirController::class, 'getCity']);

    Route::get('cart', [ShoppingCartController::class, 'index'])->name('cart');
    Route::middleware('auth')->group(function () {});


