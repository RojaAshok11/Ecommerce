<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\mail\UserEmail;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Route::post('/useremail/{id}', [AdminController::class,'sendMail'])->name('sendmail');

Route::get('/redirect', [HomeController::class,'redirect'])->middleware('auth','verified');

Route::get('/view_catagory', [AdminController::class,'view_catagory']);

Route::post('/add_catagory', [AdminController::class,'add_catagory']);

Route::get('/delete_catagory/{id}', [AdminController::class,'delete_catagory']);

Route::get('/view_product', [AdminController::class,'view_product']);

Route::POST('/add_product', [AdminController::class,'add_product']);

Route::get('/show_product', [AdminController::class,'show_product'])->name('showproduct');

Route::get('/delete_product', [AdminController::class,'delete_product']);

Route::get('/update_product/{id}', [AdminController::class,'update_product']);

Route::post('/update_product_confirm/{id}', [AdminController::class,'update_product_confirm']);

Route::get('/product_details/{id}', [HomeController::class,'product_details']);

Route::get('/order_details/{id}', [HomeController::class,'order_details'])->name('orderdetails');

Route::post('/send_info/{id}', [AdminController::class, 'send_user_email']);


Route::post('/add_cart/{id}', [HomeController::class,'add_cart']);

Route::get('/show_cart', [HomeController::class,'show_cart'])->name('cart');

Route::get('/byuknow', [HomeController::class,'byuknow'])->name('buy');

Route::get('/detailsform', [HomeController::class,'detailsform']);

Route::post('/confirm', [HomeController::class,'confirm'])->name('confirm');

Route::get('/show_order', [HomeController::class,'show_order']);

Route::post('/add_comment', [HomeController::class,'add_comment']);

Route::post('/add_reply', [HomeController::class,'add_reply']);

Route::get('/products', [HomeController::class,'product']);

Route::get('/product_search', [HomeController::class,'product_search']);

Route::get('/search_product', [HomeController::class,'search_product']);

Route::get('/cancel_order/{id}', [HomeController::class,'cancel_order']);

Route::get('/remove_cart/{id}', [HomeController::class,'remove_cart']);

Route::get('/order', [AdminController::class,'order'])->name('order');

Route::get('/Delivered/{id}', [AdminController::class,'Delivered']);

Route::get('/print_pdf/{id}', [AdminController::class,'print_pdf']);

Route::get('/send_email/{id}', [AdminController::class,'send_email']);

Route::post('/send_user_eamil/{id}', [AdminController::class,'send_user_eamil']);

Route::get('/search', [AdminController::class,'searchdata']);

Route::get('/cash_order', [HomeController::class,'cash_order']);

Route::get('/stripe/{totalprice}', [HomeController::class,'stripe']);

Route::post('stripe', [HomeController::class,'stripePost'])->name('stripe.post');


// roja@example.com//Ganapathy@11//strip psw:Ganap@26
// Name: Test

// Number: 4242 4242 4242 4242

// CSV: 123

// Expiration Month: 12

// Expiration Year: 2028//purushoth552@gmail.com
