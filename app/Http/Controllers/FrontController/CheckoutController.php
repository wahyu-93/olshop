<?php

namespace App\Http\Controllers\FrontController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = session('cart');
        $couriers = config('olshop.couriers');
    
        return view('frontend.checkout.index', compact('carts', 'couriers'));
    }
}
