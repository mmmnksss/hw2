<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\User;

use Illuminate\Routing\Controller as BaseController;

class FetchController extends BaseController
{
    public function fetch_all()
    {
        if(!Session::get('id')) return [];

        $user = User::find(Session::get('id')); 
    }
}
