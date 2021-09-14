<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getPaginateByLimit(int $limit_count = 2)
    {
        return $this->orderBy('date', 'ASC')->paginate($limit_count);
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
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
