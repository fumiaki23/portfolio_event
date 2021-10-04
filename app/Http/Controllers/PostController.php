<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Like;
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
        //$post = $post->orderBy('updated_at', 'DESC')->paginate(2);
        $userAuth = \Auth::user();

        $post->load('likes');

        $defaultCount = count($post->likes);

        // $defaultLiked = $post->likes->where('user_id', $userAuth->id)->first();
        // if(count($defaultLiked) == 0) {
        //     $defaultLiked == false;
        // } else {
        //     $defaultLiked == true;
        // }        // ユーザの投稿の一覧を作成日時の降順で取得
        //withCount('テーブル名')とすることで、リレーションの数も取得できます。
        $posts = Post::withCount('likes')->orderBy('id', 'desc')->paginate(10);
        $like_model = new Like;

        $param = [
                'posts' => $posts,
                'like_model' => $like_model,
                'user' => $user,
                'today' => $today,
                'post' => $post,
                'userAuth' => $userAuth,
                // 'defaultLiked' => $defaultLiked,
                'defaultCount' => $defaultCount
            ];

        //更新順に並び替え
        //dd($today);
        //$post = Post::where('date'<$today);
        return view('index', $param);
    }
    
    public function like(Request $request)
    {
        $user_id = Auth::user()->id; //1.ログインユーザーのid取得
        $post_id = $request->post_id; //2.投稿idの取得
        $already_liked = Like::where('user_id', $user_id)->where('post_id', $post_id)->first(); //3.
    
        if (!$already_liked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
            $like = new Like; //4.Likeクラスのインスタンスを作成
            $like->review_id = $post_id; //Likeインスタンスにreview_id,user_idをセット
            $like->user_id = $user_id;
            $like->save();
        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            Like::where('post_id', $post_id)->where('user_id', $user_id)->delete();
        }
        //5.この投稿の最新の総いいね数を取得
        $review_likes_count = Review::withCount('likes')->findOrFail($post_id)->likes_count;
        $param = [
            'post_likes_count' => $post_likes_count,
        ];
        return response()->json($param); //6.JSONデータをjQueryに返す
    }
    
    public function profile(Post $post,  User $user)
    {
        return view('profile')->with(['post' => $post,  'user' => $user]);
    }
    
    public function show(Post $post, User $user, Comment $comment)
    {
        $user = Auth::user();
        $comments = $post->comments()->get();
        //$comments = $comment->orderBy('updated_at', 'ASC')->paginate(10);
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