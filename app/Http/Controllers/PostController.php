<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Storage;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Post $post, User $user)
    {
        $today = date("Y-m-d");
        //$today = strtotime($today);
        //$post = $post->whereDate('date','>=',$today)->orderBy('date', 'ASC')->paginate(2);
        //掲載期限が近いものから順に表示
        $post = $post->orderBy('updated_at', 'DESC')->paginate(2);
        //更新順に並び替え
        //dd($today);
        //$post = Post::where('date'<$today);
        return view('index')->with(['posts' => $post, 'user' => $user, 'today' => $today]);
    }
    
    public function profile(Post $post,  User $user)
    {
        return view('profile')->with(['post' => $post,  'user' => $user]);
    }
    
    public function show(Post $post, User $user, Comment $comment)
    {
        $user = Auth::user();
        $comments = $post->comments()->get();
        //dd($comment);
        return view('show')->with(['post' => $post, 'user' => $user, 'comments' => $comments]);
    }
    
    public function create()
    {
        $user = Auth::user();
        return view('create', compact('user'));
    }
    
    public function store(PostRequest $request, Post $post)
    {
        $form = $request->all();
        $image = $request->file('image');
        $path = Storage::disk('s3')->putFile('/hoge', $image, 'public');
        //$image_path = Storage::disk('s3')->url($image);
        //dd($image_path);
        $user = Auth::user();
        $input = $request['post'];
        $input['user_id'] = $user->id;
        $input['image'] = Storage::disk('s3')->url($path);
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function recuruit(Post $post, User $user)
    {
        $user = Auth::user();
        //$user = User::find($user->name);
        $today = date("Y-m-d");
        $post = Post::where('user_id', $user['id'])->whereDate('date','>=',$today)->orderBy('date', 'ASC')->paginate(2);
        //$post = $user->post();
        //$posts = $user->posts();
        //dd($post);
        return view('recuruit')->with(['posts' => $post]);
    }
    
    public function recuruited(Post $post, User $user)
    {
        $user = Auth::user();
        //$user = User::find($user->name);
        $today = date("Y-m-d");
        $post = Post::where('user_id', $user['id'])->whereDate('date','<',$today)->orderBy('date', 'DESC')->paginate(2);
        //$post = $user->post();
        //$posts = $user->posts();
        //dd($post);
        return view('recuruited')->with(['posts' => $post]);
    }
    
    public function history(Post $post, User $user)
    {
        $user = Auth::user();
        //$user = User::find($user->name);
        $today = date("Y-m-d");
        $post = Post::where('user_id', $user['id'])->orderBy('updated_at', 'DESC')->paginate(2);
        //$post = $user->post();
        //$posts = $user->posts();
        //dd($post);
        return view('history')->with(['posts' => $post]);
    }
    
    public function edit($id)
    {
        $user = Auth::user();
        $post = Post::where('id', $id)->where('user_id', $user['id'])->first();
        return view('edit', compact('user'))->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
    public function Participation(Post $post, User $user)
    {
        $today = date("Y-m-d");
        //$today = strtotime($today);
        $post = $post->whereDate('date','>=',$today)->orderBy('date', 'ASC')->paginate(2);
        //dd($today);
        //$post = Post::where('date'<$today);
        return view('participation')->with(['posts' => $post, 'user' => $user]);
    }  // public function member(PostRequest $request, Post $post)
    // {
    //     $user = Auth::user();
    //     $input = $request['post'];
    //     $input['members'] = $user->name;
    //     $post->fill($input)->save();
    //     return redirect('/posts/' . $post->id);
    // }
    
    // public function members(PostRequest $request, Post $post)
    // {
    //      if (is_array($request->skills)) {
    //         $user = Auth::user();
    //         $user->skills()->detach(); //ユーザの登録済みのメンバーを全て削除
    //         $user->skills()->attach($request->skills); //改めて登録
    //     }

    //     return redirect('profile')->with('success', '新しいプロフィールを登録しました');
    // }
    
}