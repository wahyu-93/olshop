<?php

namespace App\Http\Controllers\FrontController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(10);
        return view('frontend.history.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('frontend.checkout.detail', compact('order'));
    }
}
