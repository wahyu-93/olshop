@extends('admin.templates.default')
@section('content')
<div class="row mt-3">
    <div class="col-md-12">
            @include('admin.templates._alert')
            <div class="card card-primary card-outline mt-3">
                <div class="card-header">
                    <h3 class="card-title">List Product</h3>
                    <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm float-right" title="Tambah Data">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Slug</th>
                            <th>Price</th>
                            <th>Descripton</th>
                            <th>Aksi</th>
                        </tr>

                        @foreach ($products as $key => $product)
                        <tr>
                            <td width="15px">{{ $products->firstItem() +  $key }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->slug }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-warning btn-sm" title="Edit Data">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <button 
                                    class="btn btn-danger btn-sm" 
                                    title="Hapus Data" 
                                    id="delete"
                                    data-title="{{ $product->name }}">
                                        <i class="fa fa-trash"></i>
                                </button>

                                <form method="post" action="{{ route('product.destroy', $product) }}" id="hapusForm">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" style="display: none">
                                </form>
                            </td>
                        </tr>
                            
                        @endforeach
                    </table>
                    <div class="pagenation mt-3 d-flex justify-content-center">
                        {{ $products->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('button#delete').on('click',function(){
            let title = $(this).data('title')
            
            swal({
                title: "Apakah Anda Yakin ?",
                text: "Ingin Menghapus Product '" + title +"'",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    document.getElementById('hapusForm').submit();
                    swal("Product Berhasil dihapus", {
                        icon: "success",
                    });
                };
            });
        })
    </script>
@endpush