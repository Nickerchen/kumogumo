<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, Post $post)

    {

        $this->validate($request, ['body' => 'required|min:2']);

        auth()->user()->commentsOn($post, $request->body);


        return back();

    }
}
