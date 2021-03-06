<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    
    protected $table = "posts";

    protected $fillable = ['author', 'title', 'cap', 'gif'];
}
