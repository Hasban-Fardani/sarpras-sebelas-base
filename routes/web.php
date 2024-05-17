<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserChartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserManageController;
use App\Http\Controllers\UserPdfController;
use Illuminate\Routing\RedirectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('dashboard');


Route::group(['prefix' => '/petugas', 'middleware' => ['auth', 'can:isPetugas']], function () {
    Route::get('/', AdminController::class)->name('petugas');

    Route::get('/user/chart', UserChartController::class)->name('chart');

    Route::get('/user/pdf', UserPdfController::class)->name('pdf');

    Route::resource('/user', UserManageController::class);
    
    Route::resource('/user/tes', UserManageController::class);
});

Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'can:isAdmin']], function () {
    Route::get('/', AdminController::class)->name('admin');
});

Route::group(['prefix' => '/unit', 'middleware' => ['auth', 'can:isUnit']], function () {
    Route::get('/', UserController::class)->name('unit');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';