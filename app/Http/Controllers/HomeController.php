<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\User;

use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function landing_home()
    {
        if(Session::get('id')) return redirect('home');

        $err = Session::get('err');
        Session::forget('err');
        return view("landing")->with('err', $err);
    }

}
