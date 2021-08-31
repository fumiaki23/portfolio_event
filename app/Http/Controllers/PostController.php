<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        $user = \Auth::user();
        return view('index', compact('user'))->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function profile(Post $post)
    {
        return view('profile')->with(['post' => $post]);
    }
    
    public function show(Post $post)
    {
        return view('show')->with(['post' => $post]);
    }
    
    public function create()
    {
        $user = \Auth::user();
        return view('create', compact('user'));
    }
    
    public function store(Request $request, Post $post)
{
    $input = $request['post'];
    $post->fill($input)->save();
    return redirect('/posts/' . $post->id);
}
}
