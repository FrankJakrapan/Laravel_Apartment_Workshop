<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RoomController;
use App\Http\Middleware\Authenticate;

Route::get('/', function () {
    return view('welcome');
})->name('login');
 
Route::middleware([Authenticate::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('/company/index', [CompanyController::class, 'index']);
    Route::get('/room', [RoomController::class, 'index']);
});



