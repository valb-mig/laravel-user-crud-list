<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\UserController;

Route::get('/',  [UserController::class, 'index']);
Route::post('/', [UserController::class, 'addUser']);