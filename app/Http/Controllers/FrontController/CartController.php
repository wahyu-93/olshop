<?php

namespace App\Http\Controllers\FrontController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $carts = session('cart');
        return view('frontend.cart.index', compact('carts'));
    }


    public function addItem(Product $product)
    {
        // session()->forget('cart');
        $data = [
            'product_id'    => $product->id,
            'name'          => $product->name,
            'slug'          => $product->slug,
            'price'         => $product->price,
            'qty'           => 0,
            'image'         => $product->getImage(),
            'description'   => $product->description
        ];
        
        if(session()->has('cart')){
            session()->push('cart', $data);
        }
        else{
            session()->put('cart', [$data]);
        };

        return session('cart');
    }
}
