<?php

namespace App\Http\Controllers\FrontController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = session('cart');
        return view('frontend.checkout.index', compact('carts'));
    }
}
