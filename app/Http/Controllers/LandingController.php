<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\User;

use Illuminate\Routing\Controller as BaseController;

class LandingController extends BaseController
{
    public function landing_home()
    {
        if(Session::get('id')) return redirect('home');

        $err = Session::get('err');
        Session::forget('err');
        return view("landing")->with('err', $err);
    }

    public function do_signup()
    {
        if(Session::get('id')) return redirect('home');

        if (strlen(request('firstname') == 0) ||
            strlen(request('lastname') == 0) ||
            strlen(request('s_username') == 0) ||
            strlen(request('s_password') == 0) ||
            strlen(request('email') == 0))
        {
            Session::put('err', 's_incomplete');
            return redirect('landing')->withInput();
        }

        else if (strlen (request('firstname')) == 0 || strlen (request('firstname')) > 16)
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

        else if (!filter_var(request('email'), FILTER_VALIDATE_EMAIL))
        {
            Session::put('err', 'email_invalid');
            return redirect('landing')->withInput();
        }

        else if (User::where('email', request('email'))->first())
        {
            Session::put('err', 'email_taken');
            return redirect('landing')->withInput();
        }

        $user= new User;
        $user->firstname=request('firstname');
        $user->lastname=request('lastname');
        $user->email=request('email');
        $user->username=request('s_username');
        $user->password=password_hash(request('s_password'), PASSWORD_BCRYPT);
        $user->save();
        
        Session::put('id', $user->id);
        return redirect('home');
    }

    public function do_login()
    {
        if(Session::get('id')) return redirect('home');

        if (strlen(request('l_username') == 0) || strlen(request('l_password') == 0))
        {
            Session::put('err', 'l_incomplete');
            return redirect('landing')->withInput();
        }

        $user = User::where('username', request('l_username'))->first();
        if(!$user || !password_verify(request('l_password'), $user->password))
        {
            Session::put('err', 'bad_credentials');
            return redirect('landing')->withInput();
        }

        Session::put('id', $user->id);
        return redirect('home');
    }

    public function user_check(){
        $query = request();
        $bool = User::where('username',$query['q'])->exists();
        return ['exists'=>$bool];
    }

    public function email_check(){
        $query = request();
        $bool = User::where('email',$query['q'])->exists();
        return ['exists'=>$bool];
    }

    public function logout()
    {
        Session::flush();
        return redirect('landing');
    }
}
