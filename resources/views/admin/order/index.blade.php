@extends('admin.templates.default')
@section('content')
<div class="row mt-3">
    <div class="col-md-12">
            @include('admin.templates._alert')
            <div class="card card-primary card-outline mt-3">
                <div class="card-header">
                    <h3 class="card-title">List Orders</h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Transaction Id</th>
                            <th>Tanggal Transaksi</th>
                            <th>Nama Pemesan</th>
                            <th>Alamat</th>
                            <th>Courier</th>
                            <th>Shipping Cost</th>
                            <th>Total</th>
                            <th>Tanggal Konfirmasi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>

                        @foreach ($orders as $key => $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->user->address }}</td>
                            <td>{{ $order->courier }}</td>
                            <td>{{ formatRupiah($order->shiping_cost) }}</td>
                            <td>{{ formatRupiah($order->total + $order->shiping_cost) }}</td>
                            
                            @if ($order->status != 'unpaid')
                                <td>{{ $order->updated_at }}</td>
                            @else
                                <td>-</td>
                            @endif

                            <td>
                                <span class="btn btn-outline-danger btn-sm">
                                    {{ ucwords($order->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm">Detail</a>
                                
                                @if ($order->status != 'unpaid')
                                    <a href="" class="btn btn-success btn-sm">Up Process</a>
                                @endif
                                
                            </td>
                        </tr>
                            
                        @endforeach
                    </table>
                    <div class="pagenation mt-3 d-flex justify-content-center">
                        {{ $orders->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
