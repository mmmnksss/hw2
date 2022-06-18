<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    
    protected $table = "users";

    protected $fillable = ['username', 'password', 'email', 'firstname', 'lastname'];
    
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}
