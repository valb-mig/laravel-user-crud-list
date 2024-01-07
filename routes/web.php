<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\UserController;

Route::get('/{search?}',[
    UserController::class, 'index'
]);

Route::post('/user/add',[
    UserController::class, 'add'
]);

Route::get('/user/get/{id}',[
    UserController::class, 'get'
]);

Route::post('/user/edit/{id}',[
    UserController::class, 'edit'
]);

Route::get('/user/delete/{id}',[
    UserController::class, 'delete'
]);