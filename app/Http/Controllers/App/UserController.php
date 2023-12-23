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
        return view('home')->with(['users' => User::all()]);
    }

    public function addUser(Request $request) 
    {
        $rules = [
            'form_name' => 'required|string',
            'form_email' => 'required|email',
        ];

        $messages = [
            'form_name.required'  => 'O campo nome é obrigatório.',
            'form_email.required' => 'O campo e-mail é obrigatório.',
            'form_email.email'    => 'Por favor, insira um endereço de e-mail válido.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        $nome  = $request->input('form_name');
        $email = $request->input('form_email');

        $user = new User();
        $user->user_name  = $nome;
        $user->user_email = $email;
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        return redirect('/')->with('success', 'User created!')->withInput();
    }
}
