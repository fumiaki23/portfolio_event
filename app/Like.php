<?php

namespace App;

use App\Post;
use App\User;
use App\Like;
use Storage;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
     //Like.phpに下記を追記
     //いいねしているユーザー
     public function user()
    {
        return $this->belongsTo(User::class);
    }

     //いいねしている投稿
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    //いいねが既にされているかを確認
    public function like_exist($id, $post_id)
    {
        $exist = Like::where('user_id', '=', $id)->where('post_id', '=', $post_id)->get();
                // レコード（$exist）が存在するなら
        if (!$exist->isEmpty()) {
            return true;
        } else {
        // レコード（$exist）が存在しないなら
            return false;
        }
    }
}

