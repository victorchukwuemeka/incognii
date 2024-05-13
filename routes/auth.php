<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\TokenController;

Route::get('/token', [TokenController::class, 'createToken'])
->name('create.token');
Route::post('/token&ini', [TokenController::class, 'storeToken'])
->name('store.token');

Route::get('/getin', [TokenController::class, 'showGetInPage'])
->name('getin');
Route::post('/getin', [TokenController::class, 'getin'])
->name('store.detail');

Route::get('/exit', [TokenController::class, 'getout'])
  ->name('exit');
