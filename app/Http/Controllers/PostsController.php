<?php

namespace App\Http\Controllers;

use App\Post;
use App\Follower;
use Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }



    public function timeline()
    {
        $me = Auth::user();

        $followingarray = Follower::where('follower_user_id' , '=', $me->id )->pluck('user_id');
        $posts=collect();

        foreach($followingarray as $followinguser){
                $posts = Post::where('user_id', '=', $followinguser )->latest()->simplePaginate(10);
            }
    //    $posts = $posts->sortByDesc(function ($post) {
    //    return $post->created_at;
    //});

        echo("<script>console.log('followingarray: ".$followingarray."');</script>");
        echo("<script>console.log('posts: ".$posts."');</script>");
        echo("<script>console.log('following: ".sizeof($followingarray)."');</script>");

        //$posts = Post::latest()->simplePaginate(10);

        return view('timeline', compact('posts'));



    }

    public function show(Post $post)
    {

        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('newpost');
    }

    public function store()
    {

        $this->validate(request(), [

            'body' => 'required'
        ]);

        auth()->user()->publish(
            new Post(request(['body']))
        );


        return redirect('/timeline');
    }

    public function destroy($post_id)
    {
        $posts = Post::where('id', $post_id)->first();
        if (Auth::user() != $posts->user){
            return redirect()->back();
        }
        $posts->delete();
        return redirect('/timeline');
    }
}
