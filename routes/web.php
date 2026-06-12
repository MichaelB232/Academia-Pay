<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\KpiAssessmentController;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\PositionController;

Route::redirect('/', '/login');

Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard'); // Dashboard

    Route::resource('departement', DepartementController::class); // master-data/departement

    Route::resource('daftar-karyawan', EmployeeController::class); // Daftar Karyawan

    Route::resource('performance-tracker', KpiAssessmentController::class); //Performance Trackker or KPIAssessment

    Route::resource('master-data', MasterDataController::class);

    Route::Resource('position', PositionController::class);
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout'); // logout
});
