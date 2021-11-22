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
        $categories->load('products');

        return view('frontend.product.show', compact('categories', 'product'));
    }

    public function byCategory(Category $category)
    {
        $categories = Category::get();
        $categories->load('products');
        $products   = $category->products()->paginate(config('olshop.front_pagination'));

        return view('frontend.product.byCategory', compact('categories', 'products'));
    }
}
