@extends('admin.templates.default')
@section('content')
<div class="row mt-3">
    <div class="col-md-12">
            @include('admin.templates._alert')
            <div class="card card-primary card-outline mt-3">
                <div class="card-header">
                    <h3 class="card-title">List Category</h3>
                    <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm float-right" title="Tambah Data">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>No</td>
                            <td>Nama</td>
                            <td>Slug</td>
                            <td>Descripton</td>
                            <td>Aksi</td>
                        </tr>

                        @foreach ($categories as $key => $category)
                        <tr>
                            <td width="15px">{{ $key + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-warning btn-sm" title="Edit Data">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <button 
                                    class="btn btn-danger btn-sm" 
                                    title="Hapus Data" 
                                    id="delete"
                                    data-title="{{ $category->name }}">
                                        <i class="fa fa-trash"></i>
                                </button>

                                <form method="post" action="{{ route('category.destroy', $category) }}" id="hapusForm">
                                    @csrf
                                    @method('delete')
                                    {{-- <input type="submit" id="hapusForm" style="display: none"> --}}
                                </form>
                            </td>
                        </tr>
                            
                        @endforeach
                    </table>
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
                text: "Ingin Menghapus Category '" + title +"'",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    document.getElementById('hapusForm').submit()
                    swal("Category Berhasil dihapus", {
                    icon: "success",
                    });
                };
            });
        })
    </script>
@endpush