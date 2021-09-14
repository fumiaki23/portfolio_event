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
        $today = date("Y-m-d");
        //$today = strtotime($today);
        $post = $post->whereDate('date','>=',$today)->orderBy('date', 'ASC')->paginate(2);
        //dd($today);
        //$post = Post::where('date'<$today);
        return view('index', compact('user'))->with(['posts' => $post]);
    }
    
    public function profile(Post $post,  User $user)
    {
        return view('profile')->with(['post' => $post,  'user' => $user]);
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
    
    public function recuruitment(Post $post, User $user) {
        $user = Auth::user();
        //$posts = $user->with('posts');
        $posts = $user->posts();
        $posts = $post->paginate(2);
        return view('recuruitment')->with(['posts' => $posts]);
    }
}