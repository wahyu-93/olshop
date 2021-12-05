<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(env('PAGINATION_PER_PAGE='));
        $orders->load('user');  
        return view('admin.order.index', compact('orders'));
    }

    public function detail(Order $order)
    {
        return view('admin.order.show', compact('order'));
    }
}
