<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    //
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    //stelle den View login dar
    public function create()
    {
        return view('login');
    }

    //Erstelle eine Session (login)
    public function store()
    {
        if (! auth()->attempt(request(['email', 'password']))){
            return back()->withErrors([
                'message' => 'Please check your credentials and try again'
            ]);
        }

        return redirect()->home();
    }

    //Zerstöre eine Session (logout)
    public function destroy()
    {
            auth()->logout();

            return redirect()->home();
    }
}
