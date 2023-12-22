<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\UserController;

Route::post('/', [
    UserController::class, 'addUser'
]);

Route::get('/', function () {
    
    $userController = new UserController();

    return view('home')
    ->with([
        'users' => $userController->getUsers()
    ]);
});