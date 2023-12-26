<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\UserController;

Route::get('/',  [UserController::class, 'index']);
Route::post('/', [UserController::class, 'addUser']);

Route::get('/edit/{id}',   [UserController::class, 'getUserInfo']);
Route::post('/edit/{id}',  [UserController::class, 'editUser']);

Route::get('/remove/{id}', [UserController::class, 'removeUser']);