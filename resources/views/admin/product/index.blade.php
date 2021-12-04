@extends('admin.templates.default')
@section('content')
<div class="row mt-3">
    <div class="col-md-12">
            @include('admin.templates._alert')
            <div class="card card-primary card-outline mt-3">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 32px">List Product</h3>
                    <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm float-right" title="Tambah Data">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Image</th>
                            <th>Slug</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Descripton</th>
                            <th>Aksi</th>
                        </tr>

                        @foreach ($products as $key => $product)
                        <tr>
                            <td width="15px">{{ $products->firstItem() +  $key }}</td>
                            <td>{{ $product->name }}</td>
                            <td align="center">
                                <img 
                                    src="{{ asset($product->getImage()) }}" 
                                    alt="Belum Ada Foto" width="150px" height="150px"
                                    class="rounded">
                            </td>
                            <td>{{ $product->slug }}</td>
                            <td>{{ number_format($product->price) }}</td>
                            <td>
                               @foreach ($product->categories as $category)
                                    <span class="badge badge-primary">
                                        {{ $category->name }}
                                    </span>
                               @endforeach
                            </td>
                            <td>{{ $product->description }}</td>
                            <td width="100px">
                                <a href="{{ route('product.edit', $product) }}" class="btn btn-warning btn-sm" title="Edit Data">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <button 
                                    class="btn btn-danger btn-sm" 
                                    title="Hapus Data" 
                                    id="delete"
                                    href="{{ route('product.destroy', $product) }}"
                                    data-title="{{ $product->name }}">
                                        <i class="fa fa-trash"></i>
                                </button>

                                <form method="post" action="" id="hapusForm">
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
            let href  = $(this).attr('href')
            
            swal({
                title: "Apakah Anda Yakin ?",
                text: "Ingin Menghapus Product '" + title +"'",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    document.getElementById('hapusForm').action = href
                    document.getElementById('hapusForm').submit();
                    swal("Product Berhasil dihapus", {
                        icon: "success",
                    });
                };
            });
        })
    </script>
@endpush