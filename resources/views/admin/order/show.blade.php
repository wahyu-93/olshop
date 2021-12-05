@extends('admin.templates.default')
@section('content')
    <div class="row mt-3">
        <div class="col-md-10 offset-1 mt-3">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h1 class="card-title" style="font-size: 32px">Detail Order</h1>
                    <a href="{{ route('admin.order') }}" class="btn btn-danger btn-sm float-right">
                        <span>
                            <i class="fa fa-arrow-left"></i>
                        </span>
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered col-md-6 mb-2">
                        <tbody>
                            <tr>
                                <td>Transactio Id</td>
                                <td>:</td>
                                <td><strong> {{ $order->id }} </strong> </td>
        
                                <td>Bank Name</td>
                                <td>:</td>
                                <td><b>{{ config('olshop.bank.bank_name') }}</b></td>
                            </tr>
        
                            <tr>
                                <td>Order Name</td>
                                <td>:</td>
                                <td><strong> {{ $order->user->name }} </strong></td>
        
                                <td>Account Name</td>
                                <td>:</td>
                                <td><b>{{ config('olshop.bank.account_name') }}</b></td>
                            </tr>
        
                            <tr>
                                <td>Address Order</td>
                                <td>:</td>
                                <td><strong>{{ $order->user->address }}</strong></td>
        
                                <td>Account Number</td>
                                <td>:</td>
                                <td><b>{{ config('olshop.bank.account_number') }}</b></td>
                            </tr>
        
                            <tr>
                                <td>Courier</td>
                                <td>:</td>
                                <td><strong>{{ $order->courier }}</strong></td>
        
                                <td>Amount</td>
                                <td>:</td>
                                <td><b>{{ formatRupiah($order->shiping_cost + $order->total) }}</b></td>
                            </tr>

                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td colspan="4"><strong>{{ ucwords($order->status) }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                   
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            @foreach ($order->orderDetails as $item)     
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ formatRupiah($item->price) }}</td>
                                    <td>{{ formatRupiah($item->qty * $item->price) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="text-right">Shiping Cost</td>
                                <td>{{ formatRupiah($order->shiping_cost) }}</td>
                            </tr>
                    
                            <tr>
                                <td colspan="4" class="text-right">Grand Total</td>
                                <td>{{ formatRupiah($order->shiping_cost + $order->total) }}</td>
                            </tr>
                    
                        </tbody>
                    </table>
                </div>
            </div>           
        </div>
    </div>
@endsection
