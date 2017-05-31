<?php

namespace App\Http\Controllers;

use App\Post;
use Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    

    public function timeline()
    {
      $posts = Post::latest()->simplePaginate(10);;

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
