<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\NieuwsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'))->name('home');

Route::resource('news', NieuwsController::class)->only(['index', 'show']);
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::resource('contact', ContactController::class)->only(['index', 'store']);

Route::middleware('auth')->group(function () {
    Route::resource('profiel', ProfileController::class)->only(['edit', 'update', 'destroy']);

    Route::prefix('admin')->group(function () {
        Route::resource('news', NieuwsController::class)->except(['index', 'show']);
        Route::resource('faq', FaqController::class)->except(['index']);
    });
});

require __DIR__.'/auth.php';
