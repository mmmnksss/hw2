<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\Feedback;
use App\Models\User;

class FeedbackController extends BaseController{
    public function send_feedback()
    {
        $user = User::find(Session::get('id'));

        $feedback = new Feedback();
        $feedback->userid = $user->id;
        $feedback->name = $user->username;
        $feedback->content = request('content');
        $feedback->save();
        
        return redirect('home')->with('status', 'Your feedback has been sent!');
    }
}