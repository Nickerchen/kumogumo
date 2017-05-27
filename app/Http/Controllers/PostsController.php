<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function timeline()
    {
      $posts = Post::latest()->get();

      return view('timeline', compact('posts'));

    }

    public function index()
    {

        $posts = Post::latest()->get();

        return view('welcome', compact('posts'));
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
}
