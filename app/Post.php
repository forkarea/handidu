<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const UPDATED_AT = null;
    
    public function author() {
        return $this->hasOne('App\User', 'id', 'author_id');
    }
    
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
