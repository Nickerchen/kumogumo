<?php

namespace App\Http\Controllers;

use App\User;
use App\Follower;
use Auth;

class FollowController extends Controller
{

    public function follows($username)
    {
        $user = User::where('name', '=', $username)->firstOrFail();
        $me = Auth::user();
        $me->following()->attach($user->id);
        return redirect('/user/' . $user->id);
    }


    public function unfollows($username)
    {
        $user = User::where('name','=', $username)->firstOrFail();
        $me = Auth::user();
        $me->following()->detach($user->id);
        return redirect('/user/' . $user->id);
    }

    public function followers(User $user)
    {
        $users = User::find($user->id)->followers;
         //echo "<script>console.log( 'Debug Objects: " . $users . "' );</script>";


        return view('followers', compact('users'));
    }

    public function following(User $user)
    {
        $users = User::find($user->id)->following;
         //echo "<script>console.log( 'Debug Objects: " . $users . "' );</script>";


        return view('following', compact('users'));

    }
}
