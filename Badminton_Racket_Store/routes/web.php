<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RacketController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/rackets', [RacketController::class, 'index']);
Route::get('/rackets/create', [RacketController::class, 'create']);
Route::get('/rackets/about', [RacketController::class, 'about']);
Route::post('/rackets', [RacketController::class, 'store']);
Route::get('/rackets/{id}', [RacketController::class, 'show']);
Route::get('/rackets/{id}/edit', [RacketController::class, 'edit']);

Route::patch('/rackets', [RacketController::class, 'update']);
Route::delete('/rackets', [RacketController::class, 'destroy']);
