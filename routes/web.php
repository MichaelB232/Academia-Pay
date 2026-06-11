<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\EmployeeController;

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
Route::resource('departemen', DepartemenController::class);

// master-data
Route::get(
    '/master-data',
    function () {
        return view("master-data/index");
    }
);

//Employee / Daftar Karyawan routes
Route::get('/daftar-karyawan/search', [EmployeeController::class, 'search'])->name('daftar-karyawan.search');
Route::resource('daftar-karyawan', EmployeeController::class);
