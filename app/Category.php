<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    
    public function things()
    {
        return $this->belongsToMany('App\Thing');
    }
    
    public function getTranslationAttribute() {
        return __('categories.'.$this->name);
    }
}
