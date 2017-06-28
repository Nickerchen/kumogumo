<?php

namespace App\Http\Controllers;

use App\User;
use App\Follower;
use Auth;

class FollowController extends Controller
{

    //Folge einem User
    public function follows($username)
    {
        $user = User::where('name', '=', $username)->firstOrFail();
        $me = Auth::user();
        $me->following()->attach($user->id);
        return redirect('/user/' . $user->id);
    }

    //Folge einem User nicht mehr
    public function unfollows($username)
    {
        $user = User::where('name','=', $username)->firstOrFail();
        $me = Auth::user();
        $me->following()->detach($user->id);
        return redirect('/user/' . $user->id);
    }

    //Zeige alle User die einem folgen
    public function followers(User $user)
    {
        $users = User::find($user->id)->followers;

        return view('followers', compact('users'));
    }

    //Zeige alle user denen man folgt
    public function following(User $user)
    {
        $users = User::find($user->id)->following;

        return view('following', compact('users'));

    }
}
