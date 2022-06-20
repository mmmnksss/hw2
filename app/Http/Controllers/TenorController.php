<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Post;

use Illuminate\Routing\Controller as BaseController;

class TenorController extends BaseController
{
    public function gif_search($query = null)
    {
        $encoded = urlencode($query);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://g.tenor.com/v1/search?&key=' . env('TENOR_KEY') .'&media_filter=minimal&limit=6&q=' . $encoded,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}
