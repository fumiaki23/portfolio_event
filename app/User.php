<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // ユーザーの投稿
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    
    // ユーザーがいいねしている投稿
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    
    // ユーザーが参加している投稿
    public function participants()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
