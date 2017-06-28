<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller
{
    //Stelle den view register dar
    public function create()
    {
        return view('register');
    }

    //Validiere und erstelle einen neuen Account
    public function store()
    {
        //validate
        $this->validate(request(),[
            'name' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ]);

        //create and save the user
        $user = User::create([
        'name' => request('name'),
        'email' => request('email'),
        'password' => bcrypt(request('password'))
        ]);

        //sign in
        auth()->login($user);

        //redirect
        return redirect()->home();
    }
}
