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

    public function getCity($provinceId = null, $cityId = null)
    {
        $client = new Client;
        $req = $client->request(
                "GET", 
                "https://api.rajaongkir.com/starter/city?province={$provinceId}&id={$cityId}", 
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

    public function getCost()
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
                        'destination'   => 452,
                        'weight'        => 1000,
                        'courier'       => 'pos'
                    ]
                ]
            );

        $rajaOngkir = json_decode($req->getBody(), true);
        return $rajaOngkir['rajaongkir'];
    }
}
