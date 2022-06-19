<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Post;

use Illuminate\Routing\Controller as BaseController;

class PostController extends BaseController
{
    public function fetch_all()
    {
        if(!Session::get('id')) return [];

        $all_posts = Post::orderBy('id','desc')->get();
        foreach($all_posts as $row)
        {
            $user=User::where('id',$row['author'])->first();
            $posts[] = [
                "postId" => $row["id"], 
                "author" => $user->username, 
                "content" => array(
                    "title" => $row["title"], 
                    "caption" => $row["cap"], 
                    "gif" => $row["gif"]
                    )
                ];
        }
        
        return $posts;
    }

    public function fetch_mine()
    {
        if(!Session::get('id')) return [];
    }
}
