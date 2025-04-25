<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtikelController;

// route utama
Route::get('/', [HomeController::class, 'index']);

// route untuk admin
Route::prefix('admin')->group(function () {
    Route::resource('artikel', ArtikelController::class);
    Route::get('/test', function () {
        return 'ROUTE MASUK!';
    });
});
