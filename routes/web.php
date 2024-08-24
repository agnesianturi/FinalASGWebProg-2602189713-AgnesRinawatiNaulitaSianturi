<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\FriendshipController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;

use Illuminate\Support\Facades\Route;


Route::get('/register', function(){
    return view('auth.register');
});

Route::post('/register', [AuthenticationController::class, 'register'])->name('saveRegister');

Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthenticationController::class, 'login'])->name('login');

Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::get('/payment', function() {
    $user = Auth::user();
    $registerPrice = $user->registerPrice;
    return view('payment', compact('registerPrice'));
})->name('payment');

Route::post('/payment', [AuthenticationController::class, 'pay'])->name('paymentProcess');

Route::post('/keepToWallet', [AuthenticationController::class, 'keepToWallet'])->name('keepToWallet');

Route::get('/', [UserController::class, 'index'])->name('user.index');

Route::get('/locale/{loc}', function ($loc) {
    Session::put('locale', $loc);
    return redirect()->back();
})->name('locale');

Route::middleware(['auth', 'paid'])->group(function () {

    Route::resource('user', UserController::class);
    Route::resource('requests', RequestsController::class);
    Route::resource('friendship', FriendshipController::class);

    Route::resource('message', MessageController::class);

    Route::get('/user/{id}', [UserController::class, 'profile'])->name('profile');

    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');

});