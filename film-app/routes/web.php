<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/films', [FilmController::class, 'index'])->name('films.index');
Route::get('/films/about', [FilmController::class, 'about']);
Route::get('/films/create', [FilmController::class, 'create'])->middleware(['auth', 'can:edit']);
Route::post('/films', [FilmController::class, 'store'])->middleware(['auth', 'can:edit']);
Route::get('/films/{film}', [FilmController::class, 'show'])->middleware('auth');
Route::get('/films/{film}/edit', [FilmController::class, 'edit'])->middleware(['auth', 'can:edit']);

// Add the PATCH route for updating a film
Route::patch('/films/{film}', [FilmController::class, 'update'])->middleware(['auth', 'can:edit'])->name('films.update');

// Add the DELETE route for deleting a film
Route::delete('/films/{film}', [FilmController::class, 'destroy'])->middleware(['auth', 'can:edit'])->name('films.destroy');

Route::get('/login', [AuthController::class, 'index'])->name("login");
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);