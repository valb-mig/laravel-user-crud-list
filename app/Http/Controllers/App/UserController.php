<?php

namespace App\Http\Controllers\App;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index($search = null) 
    {
        $users = null;

        if (!is_null($search)) 
        {
            $users = User::where('user_name', 'like', "%$search%")->paginate(5);
        } 
        else 
        {
            $users = User::paginate(5);
        }

        return view('home', ['users' => $users]);
    }

    public function add(Request $request) 
    {
        $name  = $request->input('form_name');
        $email = $request->input('form_email');

        User::create([
            'user_name'  => $name,
            'user_email' => $email
        ]);

        return redirect('/')->with([
            'alert' => [
                'text' => 'User created!',
                'type' => 'success'
            ]
        ])->withInput();
    }

    public function delete($id) 
    {
        $user = User::find($id);

        if (!$user) {
            return redirect('/');
        }

        $user->delete();

        return redirect('/')->with([
            'alert' => [
                'text' => 'User deleted!',
                'type' => 'danger'
            ]
        ])->withInput();
    }

    public function edit($id, Request $request) 
    {
        $user = User::find($id);

        if (!$user) {
            return redirect('/');
        }

        $name  = $request->input('form_name');
        $email = $request->input('form_email');

        $user->user_name =  $name;
        $user->user_email = $email;
        $user->save();
 
        return redirect('/')->with([
            'alert' => [
                'text' => 'User updated!',
                'type' => 'info'
            ]
        ])->withInput();   
    }

    public function get($id) 
    {
        $user = User::find($id);

        if ($user) {
            return response()->json([
                'user_name'  => $user->user_name,
                'user_email' => $user->user_email
            ]);
        } else {
            return response()->json(['error' => 'user not found'], 404);
        }
    }
}
