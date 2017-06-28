<?php

namespace App\Http\Controllers;

use App\User;
use App\Follower;
use Auth;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    //Zeige die genaue Menge für die Felder Follower und Following
    public function show(User $user)
    {
        $me = Auth::user();
        $is_follow_button = !$me->isFollowing($user);
        $followingarray = Follower::where('follower_user_id' , '=', $user->id )->pluck('user_id');
        $followingnumber = sizeof($followingarray);
        $followersarray = Follower::where('user_id' , '=', $user->id )->pluck('user_id');
        $followersnumber = sizeof($followersarray);
        return view('user', compact('user'), ['is_follow_button' => $is_follow_button,'followingnumber' => $followingnumber, 'followersnumber' => $followersnumber]);
    }

    //Alte find function, findet user account wenn im suchfeld der genaue name steht
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

    //speicher die Userbeschreibung
    public function update(Request $request, User $user)
    {
        $description = $request->input('body');
        $user->description = $description;
        $user->save();
        return redirect()->action('ProfileController@show', $user->id);

    }

}
