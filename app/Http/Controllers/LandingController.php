<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class LandingController extends BaseController
{
    public function landing_form()
    {
        return view("landing");
    }
}
