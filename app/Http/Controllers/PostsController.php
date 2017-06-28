<?php

namespace App\Http\Controllers;

use App\Post;
use App\Follower;
use App\User;
use App\Role;
use Auth;
use Input;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    // Zeige die Posts auf der Timeline an, von einem selbst und den Usern denen man folgt
    public function timeline()
    {
        $me = Auth::user();

        //get Posts der anderen
        $following = $me->following()->with(['posts' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->get();

        //get eigene Posts
        $selfposts = $me->where('id', $me->id)->with(['posts' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->get();

           $poststoshow = $following->merge($selfposts);

        // Flatmap auf die Collection
        $timeline = $poststoshow->flatMap(function ($values) {
            return $values->posts;
        });
        // Sortieren nach Erstellungszeit, so dass die neusten oben dargestellt werden
        $sorted = $timeline->sortByDesc(function ($post) {
            return $post->created_at;
        });

        $posts = $sorted->values();

        return view('timeline', compact('posts'));
    }

    //stelle den View posts.show dar
    public function show(Post $post)
    {

        return view('posts.show', compact('post'));
    }

    //stelle den View newpost dar
    public function create()
    {
        return view('newpost');
    }

    //speicher den neuen Post in der Datenbank
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

    //Lösche einen Post falls der User der Besitzer oder ein Admin ist
    public function destroy($post_id)
    {
        $posts = Post::where('id', $post_id)->first();
        if (Auth::user() != $posts->user && !(Auth::user()->hasRole('Admin'))){
            return redirect()->back();
        }
        $posts->delete();
        return redirect('/timeline');
    }
}
