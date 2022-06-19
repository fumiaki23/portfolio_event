<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Comment;
use App\Profile;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post, Profile $profile)
    {
        $user = Auth::user();
        $input = $request['profile'];
        $input['user_id'] = $user->id;
        $input['post_id'] = $post->id;
        $profile->fill($input)->save();
        return redirect;
    }    
}