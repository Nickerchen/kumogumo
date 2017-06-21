<?php

namespace App\Http\Controllers;

use App\Post;
use App\Follower;
use App\User;
use Auth;
use Input;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    public function timeline()
    {
        /*
        * Die alte Version die funktioniert aber nicht filtert
        *
            $posts = Post::latest()->simplePaginate(10);

            echo "<script>console.log( 'posts: " . $posts . "' );</script>";

            return view('timeline', compact('posts'));
        */


        $me = Auth::user();

        $following = $me->following()->with(['posts' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->get();

        $selfposts = $me->where('id', $me->id)->with(['posts' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->get();

           $poststoshow = $following->merge($selfposts);

        // Flatmap auf die Collection
        $timeline = $poststoshow->flatMap(function ($values) {
            return $values->posts;
        });
        // Sortieren
        $sorted = $timeline->sortByDesc(function ($post) {
            return $post->created_at;
        });



        //$posts = Post::latest()->get();

        $posts = $sorted->values();

        $posts2 = Post::latest()->simplePaginate(3);

        echo "<script>console.log( 'posts: " . $posts . "' );</script>";
        echo "<script>console.log( 'posts: " . $posts2 . "' );</script>";




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
