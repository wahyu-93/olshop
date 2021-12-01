<?php

namespace App\Http\Controllers\FrontController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = session('cart');
        $couriers = config('olshop.couriers');
    
        return view('frontend.checkout.index', compact('carts', 'couriers'));
    }

    public function store(Request $request)
    {
        $carts = collect(session('cart'));
        
        // simpan order
        $order = Order::create([
            'user_id'       => Auth()->user()->id,
            'user_name'     => $request->name,
            'user_phone'    => $request->phone,
            'user_address'  => $request->address,
            'status'        => 'unpaid',
            'total'         => $carts->sum('price'),
            'courier'       => "{$request->courier} ( {$request->service} )",
            'shiping_cost' => $request->cost
        ]);

        // simpan orderDetails
        $detailOrders = array();
        foreach($carts as $cart){
            $detailOrders[] = [
                'order_id'      => $order->id,
                'product_id'    => $cart['product_id'],
                'qty'           => $cart['qty'],
                'price'         => $cart['price'],
                'subtotal'      => $cart['qty'] * $cart['price'],
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ];
        }
        
        OrderDetail::insert($detailOrders);
        session()->forget('cart');
        
        return view('frontend.checkout.detail', compact('order'));
    }
}
