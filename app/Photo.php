<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function getLinkAttribute() {
        if(starts_with($this->filename, 'http'))
            return $this->filename;
        else
            return asset('storage/'.$this->filename);
    }
}
