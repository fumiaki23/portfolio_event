<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //public function getPaginateByLimit(int $limit_count = 2)
    
        //return $this->orderBy('date', 'ASC')->paginate($limit_count);
    
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    
    public function isLikedBy($user): bool {
        return Like::where('user_id', $user->id)->where('post_id', $this->id)->first() !==null;
    }
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
    // public function user()
    // {
    //     return $this->belongsToMany('App\User');
    // }
    
    // public function member()
    // {
    //     return $this->belongsToMany('App\Member');
    // }
    
    protected $fillable = [
        'user_id',
        'image',
        'title',
        'place',
        'address',
        'applicants',
        'body',
        'name',
        'date',
        'content'
    ];
}
