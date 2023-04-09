<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\Release_dateController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CartController;
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
Route::group(['prefix' => '/'], function(){
    Route::get('/',[HomeController::class, 'index'])->name('home.index');
    Route::get('/login',[HomeController::class, 'login'])->name('home.login');
    Route::post('/login',[HomeController::class, 'check_login']);
    Route::get('/logout',[HomeController::class, 'logout'])->name('home.logout');
    Route::get('/main',[HomeController::class,'main'])->name('home.main');
    Route::get('//{idFilm}-{slug}',[HomeController::class,'detail'])->name('home.detail');
    Route::get('//{idFilm}/{idDate}-{slug}-{slugDate}',[HomeController::class,'detailDate'])->name('home.detailDate');
    Route::get('//{idFilm}/{idDate}/{idTimeline}-{slug}-{slugDate}',[HomeController::class,'ticket'])->name('home.ticket');
    Route::put('/detail',[HomeController::class,'getTicket'])->name('home.getTicket')->middleware('acc');
    Route::resource('account', AccountController::class);
    Route::get('profile',[AccountController::class, 'index'])->name('account.index')->middleware('acc');
    Route::put('profile', [HomeController::class, 'update_profile']);
    Route::get('change_password', [HomeController::class, 'change_password'])->name('home.change_password')->middleware('acc');
    Route::put('change_password', [HomeController::class, 'update_password']);
    Route::post('checkout',[CartController::class, 'order_checkout']);
    Route::get('checkout',[CartController::class, 'checkout'])->name('cart.checkout')->middleware('acc');
    Route::get('verify_account/{token}',[HomeController::class, 'verifyAccount'])->name('home.verify_account');
    Route::get('verify',[HomeController::class, 'verify'])->name('home.verify');
    Route::get('reset-password',[HomeController::class, 'resetPassword'])->name('home.resetPassword');
    Route::get('forgetPassword',[HomeController::class, 'forgetPassword'])->name('home.forgetPassword');
    Route::post('forgetPassword',[HomeController::class, 'takeEmailForget'])->name('home.takeEmailForget');
    Route::get('verifyAccountForget/{token}',[HomeController::class, 'verifyAccountForget'])->name('home.verifyAccountForget');
    Route::get('resetPassword/{account}',[HomeController::class, 'resetPassword'])->name('home.resetPassword');
    Route::put('resetPassword/{account}',[HomeController::class, 'setNewPassword']);
    Route::get('/verify_order/{token}', [CartController::class, 'verifyOrder'])->name('cart.verify_order');
    
});
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'check_login']);
Route::group(['prefix'=>'admin','middleware'=>'auth'], function(){
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::put('profile', [AdminController::class, 'update_profile']);
    Route::get('change_password', [AdminController::class, 'change_password'])->name('admin.change_password');
    Route::put('change_password', [AdminController::class, 'update_password']);
    Route::get('',[AdminController::class, 'index'])->name('admin.index');
    Route::get('films',[AdminController::class, 'films'])->name('admin.films');
    Route::post('release_date',[AdminController::class, 'addrd'])->name('admin.addrd');
    Route::resource('film', FilmController::class);
    Route::resource('release_date', Release_dateController::class);
    Route::resource('timeline', TimelineController::class);
    Route::resource('ticket', TicketController::class);
});
Route::group(['prefix' => 'cart'], function() {
    Route::get('/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
});
