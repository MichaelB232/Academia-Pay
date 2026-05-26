<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

#Auth Routes
Route::get('/login', function () {
    return view('auth/login');
});
Route::post('/login', [AuthController::class, 'login'])->name('login');

#Dashboard
Route::get(
    '/dashboard',
    [DashboardController::class, 'index']
);
