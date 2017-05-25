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
    
    public function getFullnameAttribute() {
        return $this->first_name.' '.$this->last_name;
    }
    
    public function getAvatarAttribute() {
        return 'http://i.pravatar.cc/35?img=68'; //tu ma być rzeczywista ścieżka do pliku
    }
    
    public function getLinkAttribute() {
        return route('user', ['username' => $this->username]);
    }
    
}
