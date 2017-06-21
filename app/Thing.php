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
    
    public function getLinkAttribute() {
        return route('thing', ['user' => $this->author->username, 'slug' => $this->slug]);
    }
    
    public function getEditPageLinkAttribute() {
        return route('thing_edit_page', ['user' => $this->author->username, 'slug' => $this->slug]);
    }
    
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
    
    public function photos() {
        return $this->morphMany('App\Photo', 'photoholdable');
    }
    
    public function getMainphotoAttribute() {
        return $this->photos->first();
    }
    
}
