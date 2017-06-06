<?php

namespace App\Http\Controllers;

use App\Follower;
use App\User;
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
}
