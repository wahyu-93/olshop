<?php

namespace App\Http\Controllers\FrontController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function homepage()
    {
        $products = Product::paginate(config('olshop.front_pagination'));
       
        return view('homepage', compact('products'));
    }
}
