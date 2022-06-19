<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Post;

use Illuminate\Routing\Controller as BaseController;

class PostController extends BaseController
{
    // public function delete_post($id){

    //     $deletePost= Post::where('id',$id)->delete();   

    // }

    // public function deletePost($q)
    // {
    //     if (session('username') == null) {
    //         return redirect('login');
    //     }
    //     $postDeleted  =  Post::where('postID', $q)->delete();
    //     if ($postDeleted) {
    //         return array('deleted' => true);
    //     } else return array('deleted' => false);
    // }

    public function delete($id)
    {
        if (!Session::get('id') || Post::find($id)->author != Session::get('id')) 
            return [
                "authorised" => false,
                "success" => false
            ];

        $del = Post::where('id', $id)->delete();
        // return ($del ? [
        //     "authorised" => true,
        //     "success" => true
        // ] : [
        //     "authorised" => true,
        //     "success" => false 
        // ]);
        return [
            "authorised" => true,
            "success" => $del ? true : false
        ];
    }
}