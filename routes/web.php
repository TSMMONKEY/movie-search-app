<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchedMovieController;

Route::get('/', [SearchedMovieController::class, 'index'])->name('home');
Route::get('/single-movie/{id}/{name}', [SearchedMovieController::class, 'single'])->name('movie.single');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
