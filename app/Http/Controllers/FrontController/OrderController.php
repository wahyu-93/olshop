<?php

namespace App\Http\Controllers\FrontController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;

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

    public function konfirmasiPost(Request $request, Order $order)
    {
        $this->validate($request, [
            'foto'  => 'required'
        ],[
            'foto.required' => 'Foto Bukti Harus Diupload'
        ]);

        $image = $request->file('foto') ?? null;
        if($request->has('foto')){
            Storage::delete($order->foto_tf);
            $image = $request->file('foto')->store('confirm');
        };

        $order->update([
            'foto_tf'   => $image,
            'catatan'   => $request->catatan,
            'status'    => 'pending'
        ]);

        return redirect()->route('order.history.index');        
    }
}
