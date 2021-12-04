@extends('admin.templates.default')
@section('content')
<div class="row mt-3">
    <div class="col-md-12">
            @include('admin.templates._alert')
            <div class="card card-primary card-outline mt-3">
                <div class="card-header">
                    <h3 class="card-title" style="font-size: 32px">List Category</h3>
                    <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm float-right" title="Tambah Data">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Slug</th>
                            <th>Descripton</th>
                            <th>Aksi</th>
                        </tr>

                        @foreach ($categories as $key => $category)
                        <tr>
                            <td width="15px">{{ $categories->firstItem() +  $key }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <a href="{{ route('category.edit', $category) }}" class="btn btn-warning btn-sm" title="Edit Data">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <button 
                                    class="btn btn-danger btn-sm" 
                                    title="Hapus Data" 
                                    id="delete"
                                    href="{{ route('category.destroy', $category) }}"
                                    data-title="{{ $category->name }}">
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
                        {{ $categories->render() }}
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
            let link = $(this).attr('href')
            
            swal({
                title: "Apakah Anda Yakin ?",
                text: "Ingin Menghapus Category '" + title +"'",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    document.getElementById('hapusForm').action = link
                    document.getElementById('hapusForm').submit();
                    swal("Category Berhasil dihapus", {
                        icon: "success",
                    });
                };
            });
        })
    </script>
@endpush