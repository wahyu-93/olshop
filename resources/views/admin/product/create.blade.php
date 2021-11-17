@extends('admin.templates.default')

@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}"> --}}
@endpush

@section('content')
    <div class="row mt-3 justify-content-center">
        <div class="col-md-6">
            <div class="card card-primary card-outline mt-3">
                <div class="card-header">
                    <h3 class="card-title">Tambah Product</h3>
                </div>

                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" autofocus value="{{ old('name') }}">
                            @if($errors->has('name'))
                                <span class="error invalid-feedback">
                                    {{ $errors->first('name') }}
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="5">{{ old('description') }}</textarea>
                            @if($errors->has('description'))
                                <span class="error invalid-feedback">
                                    {{ $errors->first('description') }}
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" autofocus value="{{ old('price') }}">
                            @if($errors->has('price'))
                                <span class="error invalid-feedback">
                                    {{ $errors->first('price') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" autofocus value="{{ old('image') }}">
                            @if($errors->has('image'))
                                <span class="error invalid-feedback">
                                    {{ $errors->first('image') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category[]" id="category" class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" multiple="multiple">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category'))
                                <span class="error invalid-feedback">
                                    {{ $errors->first('category')}}
                                </span>
                            @endif
                        </div>


                    </div>

                    <div class="card-footer">
                        <div class="float-right">
                            <a href="{{ route('product.index') }}" class="btn btn-sm btn-danger">
                                Batal
                            </a>
                            <input type="submit" value="Simpan" class="btn btn-sm btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function(){
            $('.select2').select2()
        })
    </script>
@endpush