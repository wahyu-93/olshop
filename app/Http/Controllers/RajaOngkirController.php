<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class RajaOngkirController extends Controller
{
    public function getProvince()
    {
        $client = new Client;

        $req = $client->request(
                'GET', 
                'https://api.rajaongkir.com/starter/province', 
                [
                    'headers' => [
                        'key'   => config('olshop.rajaongkir_key'),
                        'Accept' => 'Application/json'
                    ]
                ]
            );

        $rajaOngkir = json_decode($req->getBody(), true);
        return $rajaOngkir['rajaongkir']['results'];
    }

    public function getCity(Request $request)
    {
        $client = new Client;
        $req = $client->request(
                "GET", 
                "https://api.rajaongkir.com/starter/city?province={$request->province}", 
                [
                    'headers' => [
                        'key'   => config('olshop.rajaongkir_key'),
                        'Accept' => 'Application/json'
                    ]
                ]
            );

        $rajaOngkir = json_decode($req->getBody(), true);
        return $rajaOngkir['rajaongkir']['results'];
    }

    public function getCost(Request $request)
    {
        $client = new Client;
        $req = $client->request(
                "POST", 
                "https://api.rajaongkir.com/starter/cost", 
                [
                    'headers' => [
                        'key'   => config('olshop.rajaongkir_key'),
                        'Accept' => 'Application/json'
                    ],
                    'form_params' => [
                        'origin'        => config('olshop.shop_origin'),
                        'destination'   => $request->city,
                        'weight'        => 1000,
                        'courier'       => 'pos'
                    ]
                ]
            );

        $rajaOngkir = json_decode($req->getBody(), true);
        return $rajaOngkir['rajaongkir']['results'];
    }
}
