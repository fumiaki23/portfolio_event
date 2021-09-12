<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index(Post $post)
    {
        $user = Auth::user();
        return view('index', compact('user'))->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function profile(Post $post, User $user)
    {   
        return view('profile')->with(['post' => $post, 'user' => $user]);
    }
    
    public function show(Post $post)
    {
        return view('show')->with(['post' => $post]);
    }
    
    public function create()
    {
        $user = Auth::user();
        return view('create', compact('user'));
    }
    
    public function store(Request $request, Post $post)
    {
        $user = Auth::user();
        $input = $request['post'];
        $input['user_id'] = $user->id;
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function recuruitment(Post $post, User $user)
    {
        return view('recruitment')->with(['post' => $post, 'user' => $user]);
    }

    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
    
        return redirect('/posts/' . $post->id);
    }
    
    }
