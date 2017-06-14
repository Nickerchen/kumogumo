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

    /*public function followers(User $user)
    {
        $user = User::where('name', $user)->firstOrFail();
        $followers_count =  $user->followers()->count();
        $list = $user->followers()->orderBy('name')->get();
        $is_following = false;

        if (Auth::check()) {
            //$is_edit_profile = (Auth::id() == $user->id);
            $me = Auth::user();
        //    $following_count = $is_edit_profile ? $me->following()->count() : 0;
            $is_following = $me->isFollowing($user);
        }
        return view('followers', [
            'user' => $user,
            'followers_count' => $followers_count,
            'following_count' => $following_count,
            'is_following' => $is_following,
            'list' => $list,
        ]);
    }*/

    public function following(User $user)
    {
        $users = User::find($user->id)->following;
         //echo "<script>console.log( 'Debug Objects: " . $users . "' );</script>";


        return view('following', compact('users'));

    }
}
