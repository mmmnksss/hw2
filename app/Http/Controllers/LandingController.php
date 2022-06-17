<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\User;

use Illuminate\Routing\Controller as BaseController;

class LandingController extends BaseController
{
    public function landing_home()
    {
        $err = Session::get('err');
        Session::forget('err');
        return view("landing")->with('err', $err);
    }

    public function do_signup()
    {
        if (strlen (request('firstname')) == 0 || strlen (request('firstname')) > 16)
        {
            Session::put('err', 'f_name_invalid');
            return redirect('landing')->withInput();
        }

        else if (strlen (request('lastname')) == 0 || strlen (request('firstname')) > 16)
        {
            Session::put('err', 'l_name_invalid');
            return redirect('landing')->withInput();
        }

        else if (!preg_match('/^[a-zA-Z0-9_]{1,16}$/', request('s_username')))
        {
            Session::put('err', 'user_invalid');
            return redirect('landing')->withInput();
        }

        else if (User::where('username', request('s_username'))->first())
        {
            Session::put('err', 'user_taken');
            return redirect('landing')->withInput();
        }

        else if (strlen(request('s_password')) < 8)
        {
            Session::put('err', 'pass_invalid');
            return redirect('landing')->withInput();
        }

        else if (strcmp(request("s_password"), request("s_confirm_password")) != 0)
        {
           Session::put('err', 'pass_match');
           return redirect('landing')->withInput();
        }

        //if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        //{
          //  $s_error[] = "Invalid email address";
        //}

        return "ok";
    }

    public function do_login()
    {
        
    }
}
