<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest'])->controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('login');
    Route::get('/forgot-password', 'forgotPasswordView')->name('password.request');
    Route::post('/forgot-password', 'forgotPassword')->name('password.email');
    Route::get('/reset-password/{token}', 'resetPasswordView')->name('password.reset');
    Route::post('/reset-password', 'resetPassword')->name('password.update');
    Route::get('/register', 'registerView')->name('register');
    Route::post('/register', 'register')->name('register');
});

Route::middleware(['auth'])->controller(AuthController::class)->group(function () {
    Route::get('/verify-email', 'verifyEmail')->name('verification.notice');
    Route::post('/email/verification-notification', 'verificationSend')->middleware(['throttle:6,1'])->name('verification.send');
    Route::get('/email/verify/{id}/{hash}', 'verificationVerify')->middleware(['signed'])->name('verification.verify');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware(['auth', 'verified'])->controller(AuthController::class)->group(function () {
    Route::get('/confirm-password', 'confirmPasswordView')->name('password.confirm');
    Route::post('/confirm-password', 'confirmPassword')->name('password.confirm')->middleware('throttle:6,1');
});


Route::prefix("admin")->name("admin.")->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/index', [AdminController::class, 'index'])->name('index');
    Route::get('/users/list', [UserController::class, 'index'])->name('users.list');
    Route::get('/users/edit/{id?}', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/update/{id?}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/delete/{id?}', [UserController::class, 'delete'])->name('users.delete');

    Route::get('/settings', [SettingsController::class, 'edit'])->name('settings');
});

Route::get('/', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.index');
Route::get('/text-confirmpassword', [AdminController::class, 'index'])->middleware('password.confirm');



//Route::get('/', function () {
//    return redirect()->route('admin.dashboard');
//});


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

// Admin routes

//
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//
//
//
//    Route::get('/users/store', [UserController::class, 'store'])->name('users.store');
//

//
//
//    Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');
//    // Route::get('/pages', [PagesController::class, 'index'])->name('pages');
//    // Route::get('/pages/edit/{id}', [PagesController::class, 'edit'])->name('pages.edit');
//    //
//    //
//
//
////
////    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
////
////    Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
////    Route::get('/user/verifyEmailSend/{id}', [UserController::class, 'verifyEmailSend'])->name('user.verify_email_send');
////    Route::post('/user/passChangeSend/{id}', [UserController::class, 'passChangeSend'])->name('user.pass_change_send');
//
//
//    Route::get('/', [AdminController::class, 'dashboard'])
//});


////
////    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});


