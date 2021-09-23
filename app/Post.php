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
    
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
    // public function user()
    // {
    //     return $this->belongsToMany('App\User');
    // }
    
    public function member()
    {
        return $this->belongsToMany('App\Member');
    }
    
    protected $fillable = [
        'user_id',
        'title',
        'place',
        'applicants',
        'body',
        'name',
        'date',
        'content'
    ];
}
