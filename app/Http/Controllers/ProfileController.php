<?php

namespace App\Http\Controllers;

use App\User;
use Request;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('user', compact('user'));
    }

    public function find(Request $request)
    {
      $users = User::where("name","=",$request)->select("id");
      $parameter=["user"=>$users];
      return redirect()->action('ProfileController@show', $users);



    //  $keyword = Request::get('keyword', '');
  //    $users = User::SearchByKeyword($keyword)->get();
      // return redirect()->action('ProfileController@show', users->id  );
  //     return redirect()->action('ProfileController@show', ['id' => 1]);

    }

}
