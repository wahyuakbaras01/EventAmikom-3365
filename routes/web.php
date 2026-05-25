<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;

// Soal 4: Public homepage with partners data via WelcomeController
Route::get('/', [WelcomeController::class, 'index']);

// Admin routes for Categories (Soal 1 + Soal 3)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('partners', PartnerController::class);
});
