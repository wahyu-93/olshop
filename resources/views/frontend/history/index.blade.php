@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="is-size-1 has-text-weight-bold has-text-centered" text-align="center">Transaction History</h1>
        <p class="has-text-centered is-size-5">This is your transaction history</p>
        <div class="columns is-centered">
            <div class="column is-10 mt-3 is-centered">
                <table class="table is-bordered is-fullwidth">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal order</th>
                            <th>Status</th>
                            <th>Total Price</th>
                            <th>Tanggal Konfirmasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                         @foreach ($orders as $order)     
                            @php
                                $color = '';
                                if($order->status == 'unpaid'){
                                    $color = 'is-danger';
                                }
                                else if($order->status == 'paid'){
                                    $color = 'is-success';
                                }
                                else {
                                    $color = 'is-info';
                                }
                            @endphp

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <span class="tag is-medium {{ $color }}">{{ ucwords($order->status) }}</span>
                                </td>
                                <td>{{ formatRupiah($order->total) }}</td>
                                @if ($order->status == 'unpaid')
                                    <td>-</td>
                                @else
                                    <td>{{ $order->updated_at }}</td>
                                @endif
                                <td>
                                    <a href="{{ route('order.show', $order) }}" class="button is-info">Detail</a>
                                    <a href="" class="button is-success">Konfirmasi</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection