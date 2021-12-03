@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="is-size-1 has-text-weight-bold has-text-centered" text-align="center">Order Detail</h1>
        <p class="has-text-centered is-size-5">This your order detail, please make a payment to this account below to confirm your order</p>
        <div class="columns is-centered">
            <div class="column is-10 mt-3 is-centered">
                <table class="table is-bordered is-fullwidth">
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
                            <td colspan="4" class="has-text-right">Shiping Cost</td>
                            <td>{{ formatRupiah($order->shiping_cost) }}</td>
                        </tr>

                        <tr>
                            <td colspan="4" class="has-text-right">Grand Total</td>
                            <td>{{ formatRupiah($order->shiping_cost + $order->total) }}</td>
                        </tr>

                    </tbody>
                </table>

                <table class="table">
                    <tr>
                        <td>Bank Name</td>
                        <td>:</td>
                        <td><b>{{ config('olshop.bank.bank_name') }}</b></td>
                    </tr>

                    <tr>
                        <td>Account Name</td>
                        <td>:</td>
                        <td><b>{{ config('olshop.bank.account_name') }}</b></td>
                    </tr>

                    <tr>
                        <td>Account Number</td>
                        <td>:</td>
                        <td><b>{{ config('olshop.bank.account_number') }}</b></td>
                    </tr>

                    <tr>
                        <td>Amount</td>
                        <td>:</td>
                        <td><b>{{ formatRupiah($order->shiping_cost + $order->total) }}</b></td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
@endsection