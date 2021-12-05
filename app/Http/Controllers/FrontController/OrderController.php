<?php

namespace App\Http\Controllers\FrontController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::ByAuth()->latest()->paginate(10);
        return view('frontend.history.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('frontend.checkout.detail', compact('order'));
    }

    public function konfirmasi(Order $order)
    {
        return view('frontend.checkout.konfirmasi', compact('order'));
    }

    public function konfirmasiPost(Request $request)
    {
        dd($request);
    }
}
