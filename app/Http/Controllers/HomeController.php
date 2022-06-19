<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\User;

use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        if(!Session::get('id')) return redirect('landing');

        $user = User::find(Session::get('id'));
        return view('home')->with('username', $user->username);
    }

    public function profile()
    {
        if(!Session::get('id')) return redirect('landing');

        $user = User::find(Session::get('id'));
        return view('profile')->with('username', $user->username);
    }
}
