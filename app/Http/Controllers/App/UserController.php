<?php

namespace App\Http\Controllers\App;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getUsers()
    {
        return User::all();
    }

    public function addUser(Request $request) 
    {
        echo '<pre>';
        var_dump($request);
        die();
    }
}
