<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GebruikerController;
use App\Http\Controllers\NieuwsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'))->name('home');
Route::get('/dashboard', fn() => redirect()->route('home'))->name('dashboard')->middleware('auth');

Route::resource('news', NieuwsController::class, ['parameters' => ['news' => 'nieuws']])->only(['index', 'show']);
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::resource('contact', ContactController::class)->only(['index', 'store']);

Route::middleware('auth')->group(function () {
    Route::resource('profiel', ProfileController::class)->only(['edit', 'update', 'destroy']);

    Route::prefix('admin')->group(function () {
        Route::resource('news', NieuwsController::class, ['parameters' => ['news' => 'nieuws']])->except(['index', 'show']);
        Route::resource('faq', FaqController::class)->except(['index']);

        Route::get('gebruikers', [GebruikerController::class, 'index'])->name('gebruikers.index');
        Route::get('gebruikers/create', [GebruikerController::class, 'create'])->name('gebruikers.create');
        Route::post('gebruikers', [GebruikerController::class, 'store'])->name('gebruikers.store');
        Route::post('gebruikers/{user}/make-admin', [GebruikerController::class, 'makeAdmin'])->name('gebruikers.makeAdmin');
        Route::post('gebruikers/{user}/remove-admin', [GebruikerController::class, 'removeAdmin'])->name('gebruikers.removeAdmin');
    });
});

require __DIR__.'/auth.php';
