<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    public function categories() {
        return $this->belongsToMany('App\Category');
    }
    
    public function author() {
        return $this->hasOne('App\User', 'id', 'author_id');
    }
}
