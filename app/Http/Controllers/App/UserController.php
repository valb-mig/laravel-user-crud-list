<?php

namespace App\Http\Controllers\App;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::paginate(5);

        return view('home', ['users' => $users]);
    }

    public function addUser(Request $request) 
    {
        $rules = [
            'form_name' => 'required|string',
            'form_email' => 'required|email',
        ];

        $messages = [
            'form_name.required'  => '',
            'form_email.required' => '',
            'form_email.email'    => '',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        $name  = $request->input('form_name');
        $email = $request->input('form_email');

        $user = new User();
        $user->user_name  = $name;
        $user->user_email = $email;
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        return redirect('/')->with('success', 'User created!')->withInput();
    }

    public function removeUser($id) 
    {
        $user = User::find($id);

        if (!$user) {
            return redirect('/');
        }

        $user->delete();

        return redirect('/')->with('success', 'User removed!')->withInput();
    }

    public function editUser($id, Request $request) 
    {
        $rules = [
            'form_name' => 'required|string',
            'form_email' => 'required|email',
        ];

        $messages = [
            'form_name.required'  => '',
            'form_email.required' => '',
            'form_email.email'    => '',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find($id);

        if (!$user) {
            return redirect('/');
        }

        $name  = $request->input('form_name');
        $email = $request->input('form_email');

        $user->user_name =  $name;
        $user->user_email = $email;
        $user->save();
 
        return redirect('/')->with('success', 'User updated!')->withInput();
    }

    public function getUserInfo($id) 
    {
        $user = User::find($id);

        if ($user) {
            return response()->json([
                'user_name'  => $user->user_name,
                'user_email' => $user->user_email
            ]);
        } else {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }
    }
}
