<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\StallController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

///// Public Api Routes  /////
Route::get('/admin', [AdminController::class, 'index'])->name('login');
Route::post('/admin_login', [AdminController::class, 'login'])->name('admin_login');

Route::get('/exhibition', [StallController::class, 'getExhibition'])->name('getExhibition');
Route::post('/search_number', [StallController::class, 'searchNumber'])->name('searchNumber');
Route::get('/stall_register', [StallController::class, 'getStall'])->name('getStall');
Route::post('/stall_register', [StallController::class, 'stallRegister'])->name('stallRegister');
Route::get('/payment-success', [StallController::class, 'paymentTranactionStatus'])->name('paymentSuccess');
Route::get('/payment-failure', [StallController::class, 'paymentTranactionStatus'])->name('paymentSFailure');
Route::post('/razorpay-payment',[RazorpayController::class,'store'])->name('razorpay.payment.store');
Route::get('/razorpay-payment', [RazorpayController::class, 'index']);
Route::post('/webhook', [RazorpayController::class, 'webhook']);

Route::get('/payment-form', [PaymentController::class, 'showForm'])->name('payment.form');
Route::post('/initiate-payment', [PaymentController::class, 'initiatePayment'])->name('payment.initiate');
Route::post('/payment-callback', [PaymentController::class, 'paymentCallback'])->name('payment.callback');
Route::get('/payment-success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment-failure', [PaymentController::class, 'failure'])->name('payment.failure');

///// Middleware authenticvation are access Routes /////
Route::group(['middleware' => 'is_admin'], function () {
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('is_admin');
Route::get('/logout_admin', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/admin_profile/{id}', [AdminController::class, 'getAdminProfile'])->name('admin.profile');
Route::post('/admin_update/{id}', [AdminController::class, 'updateAdminProfile'])->name('admin.profileUpdate');


Route::get('/stall_list', [StallController::class, 'getStallList'])->name('getStallList');
Route::post('/stall_status_update/{id}', [StallController::class, 'stallStatusUpdate'])->name('stallStatusUpdate');
Route::delete('/stall_delete/{id}', [StallController::class, 'deleteStall'])->name('stallDelete');

Route::get('/admin_stall_add', [AdminController::class, 'adminStallAdd'])->name('adminStallAdd');
Route::post('/admin_stall_register', [AdminController::class, 'adminStallARegister'])->name('adminStallARegister');

Route::post('/update-payment-mode/{id}', [StallController::class, 'updatePaymentMode'])->name('update.payment.mode');
Route::post('/update-logo-design/{id}', [StallController::class, 'updateLogoDesign'])->name('update.logo.design');
Route::post('/update-extra-notes', [StallController::class, 'updateExtraNotes'])->name('update.extra.notes');






});
