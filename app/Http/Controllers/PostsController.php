<?php

namespace App\Http\Controllers;

use App\Post;
use App\Follower;
use App\User;
use Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    public function timeline()
    {
       /*
        * Alter versuch das darzustellen mit paginate
        *
        * $me = Auth::user();

        $users = User::find($me->id)->following;

        $users = $users->pluck('id');


        $test = User::find($me->id)->followingPosts;


        $posts = Post::where('user_id', $users)->get();


        echo "<script>console.log( 'me id: " . $me->id . "' );</script>";
        echo "<script>console.log( 'users: " . $users . "' );</script>";
        echo "<script>console.log( 'posts: " . $posts . "' );</script>";
        echo "<script>console.log( 'test: " . $test . "' );</script>";


        $posts = Post::where('user_id', )->latest()->simplePaginate(10);
        return view('timeline', compact('posts'));




        *
        * Die alte Version die funktioniert aber nicht filtert
        *
            $posts = Post::latest()->simplePaginate(10);
            return view('timeline', compact('posts'));
        */


        //$posts = Post::latest()->get();
        //return view('timeline', compact('posts'));

        $me = Auth::user();

        $following = $me->following()->with(['posts' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->get();
        // By default, the tweets will group by user.
        // [User1 => [Tweet1, Tweet2], User2 => [Tweet1]]
        // The timeline needs the tweets without grouping.
        // Flatten the collection.
        $timeline = $following->flatMap(function ($values) {
            return $values->posts;
        });
        // Sort descending by the creation date
        $sorted = $timeline->sortByDesc(function ($post) {
            return $post->created_at;
        });


        $posts = $sorted->values()->all();

        echo "<script>console.log( 'following: " . $following . "' );</script>";
        //echo "<script>console.log( 'posts: " . $posts . "' );</script>";


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
