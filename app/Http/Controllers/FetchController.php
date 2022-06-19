<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Post;

use Illuminate\Routing\Controller as BaseController;

class FetchController extends BaseController
{
    public function fetch($type = null) // Defaults to fetch all posts.
    {
        if (!Session::get('id')) return 0;

        if (!$type) 
            $all_posts = Post::orderBy('id', 'desc')->get();

        else if ($type == "mine")
            $all_posts = Post::where('author', Session::get('id'))->orderBy('id', 'desc')->get();

        else return 0;

        foreach ($all_posts as $row) {
            $user = User::where('id', $row['author'])->first();
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
}