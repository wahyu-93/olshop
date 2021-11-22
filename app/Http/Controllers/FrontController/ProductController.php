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
        return view('frontend.product.show', compact('product'));
    }

    public function byCategory(Category $category)
    {
        $products   = $category->products()->paginate(config('olshop.front_pagination'));

        return view('frontend.product.byCategory', compact('products'));
    }
}
