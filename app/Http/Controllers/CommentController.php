<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Comment;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(PostRequest $request, Post $post, Comment $comment)
    {
        dd($request);
        $user = Auth::user();
        $input = $request['comment'];
        $input['user_id'] = $user->id;
        $input['post_id'] = $post->id;
        $comment->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
}