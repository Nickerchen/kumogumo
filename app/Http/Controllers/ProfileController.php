<?php

namespace App\Http\Controllers;

use App\User;
//use Request;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('user', compact('user'));
    }

    public function find(Request $request)
    {
      $name = $request->input('name');
      $user = User::where('name', '=', $name)->first();
      if ($user== "")
      return back()->withErrors([
          'message' => 'this user does not exist'
      ]);
      else
      return redirect()->action('ProfileController@show', $user->id);

    }

    public function update(Request $request, User $user)
    {
        $description = $request->input('body');
        $user->description = $description;
        $user->save();
        return redirect()->action('ProfileController@show', $user->id);

    }

}
