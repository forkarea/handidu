<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function things() {
        return $this->hasMany('App\Thing', 'author_id');
    }
    
    public function posts() {
        return $this->hasMany('App\Post', 'author_id');
    }
    
    public function getFullnameAttribute() {
        return $this->first_name.' '.$this->last_name;
    }
    
    public function getAvatarAttribute() {
        return 'https://api.adorable.io/avatars/35/abott@adorable.io.png'; //tu ma być rzeczywista ścieżka do pliku
    }
    
    public function getLinkAttribute() {
        return route('user', ['username' => $this->username]);
    }
    
}
