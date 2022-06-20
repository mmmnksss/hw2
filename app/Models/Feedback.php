<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Feedback extends Model
{
    public $timestamps = false;
    
    protected $table = "posts";

    protected $fillable = ['author', 'title', 'cap', 'gif'];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
