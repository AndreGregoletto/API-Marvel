<?php

namespace App\Http\Controllers;

use App\Models\Marvel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Nette\Utils\DateTime;
use Psy\TabCompletion\Matcher\KeywordsMatcher;

class CatchingApiSpaceFlightController extends Controller
{
    public function apiConsume()
    {
        $date       = New DateTime;
        $timestamp  = $date->getTimestamp();
        $publicKey  = '9df1de1561b4af5f774d50b2cad697b3';
        $privateKey = '3e8ba6aeb54e5c97f236c664bc1c60f4c7a01de1';

        $keys   = $privateKey.$publicKey;
        $string = $timestamp.$keys;
        $hash   = hash('md5', $string);

        $response = Http::get('http://gateway.marvel.com/v1/public/stories?ts='.$timestamp.'&apikey='.$publicKey.'&hash='.$hash);

        $marvel = $response->json();
        $marvel = $marvel['data']['results'];

        foreach ($marvel as $universe) {
            // dd($universe['type']);
            $teste = [
                'title'       => $universe['title'],
                'description' => $universe['description'],
                'type'        => $universe['type'],
            ];

            Marvel::create($teste);
        }

    }
}
