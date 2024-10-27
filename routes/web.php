<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;

use App\Http\Controllers\ReservationController;

Route::get('/', [HomeController::class, 'index']);
Route::middleware(['isAdmin'])->group(function () {
    Route::resource('/users', UserController::class);
    Route::resource('/rooms', RoomController::class, ['except' => 'edit', 'except' => 'show']);
    Route::put('/orders/{payment}', [OrderController::class, 'update']);
    Route::resource('/types', TypeController::class);
    Route::get('/rooms/{room_number}/edit', [RoomController::class, 'edit']);
});


Route::get('/login', [LoginController::class, 'index']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('auth.logout');
Route::post('/login', [LoginController::class, 'authenticate']);



Route::get('/rooms/{room_number}', [RoomController::class, 'show']);



Route::get('/reservations/{room_number}', [ReservationController::class, 'booking']);
Route::get('/reservations/menu', [ReservationController::class, 'menu']);
Route::post('/reservations', [ReservationController::class, 'store']);

Route::get('/reservations/payment/{id}', [ReservationController::class, 'payment']);

Route::post('/payments', [PaymentController::class, 'store']);
Route::get('/payments', [PaymentController::class, 'index']);
Route::get('/payments/{id}', [PaymentController::class, 'detail']);
Route::put('/payments/{payment}', [PaymentController::class, 'update']);
Route::delete('/payments/{id}', [PaymentController::class, 'destroy']);

Route::get('/orders', [OrderController::class, 'index']);
Route::get('/orders/{id}', [OrderController::class, 'detail']);
