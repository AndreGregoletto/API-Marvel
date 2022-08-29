<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CatchingApiSpaceFlightController extends Controller
{
    public function apiConsume()
    {
        $response = Http::get('https://api.spaceflightnewsapi.net');

        dd($response->json());
    }
}
