<?php
    return [
        'pagination'    => env('PAGINATION_PER_PAGE') ?? 15,
        'front_pagination' => env('FRONT_PAGINATION_PER_PAGE') ?? 12,
        'rajaongkir_key' => env('RAJAONGKIR_KEY', null),
        'shop_origin'   => env('SHOP_ORIGIN', null)
    ];