<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
        protected $fillable = [
        'id',
        'user_id',
        'post_id',
        'text'
    ];
    
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}