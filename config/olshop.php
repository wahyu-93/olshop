<?php
    return [
        'pagination'    => env('PAGINATION_PER_PAGE') ?? 15,
        'front_pagination' => env('FRONT_PAGINATION_PER_PAGE') ?? 12,
        'rajaongkir_key' => env('RAJAONGKIR_KEY', null),
        'shop_origin'   => env('SHOP_ORIGIN', null),
        'couriers' => [
            'jne'   => 'JNE',
            'tiki'  => 'TIKI',
            'pos'   => 'POS Indonesia',
        ],
        'bank'  => [
            'bank_name' => 'Mandiri',
            'account_name'  => 'Wahyu',
            'account_number'    => '082353089050'
        ],
    ];