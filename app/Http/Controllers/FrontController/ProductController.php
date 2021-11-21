<?php

namespace App\Http\Controllers\FrontController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $categories = Category::get();
        return view('frontend.product.show', compact('categories', 'product'));
    }
}
