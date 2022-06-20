<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Post;

use Illuminate\Routing\Controller as BaseController;

class PostController extends BaseController
{
    public function delete($id)
    {
        if (!Session::get('id') || Post::find($id)->author != Session::get('id')) 
            return [
                "authorised" => false,
                "success" => false
            ];

        $del = Post::where('id', $id)->delete();
        return [
            "authorised" => true,
            "success" => $del ? true : false
        ];
    }

    public function create()
    {
        $new_post = new Post;

        $new_post->author = Session::get('id');
        $new_post->title = request('title');
        $new_post->cap = request('story');
        $new_post->gif = request('tenorURL');
        
        $new_post->save();

        return redirect('home')->with('status', 'Your post was posted successfully!');
    }
}