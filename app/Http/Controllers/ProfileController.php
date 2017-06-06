<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('user', compact('user'));
    }


    //public function update(Request $request, $id)
    //{
    //$this->validate($request, [
    //    'body' => 'required'
    //]);
    //
    //$user = User::findOrFail($id);
    //$user->description=$request->input('body');
    //$user->save();
    //return redirect('/timeline');
    //}
}
