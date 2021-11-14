@extends('admin.templates.default')

@section('content')
    <div class="row mt-3 justify-content-center">
        <div class="col-md-6">
            <div class="card card-primary card-outline mt-3">
                <div class="card-header">
                    <h3 class="card-title">Edit Category</h3>
                </div>

                <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST">
                @csrf
                @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" autofocus value="{{ $category->name ?? old('nama') }}">
                            @if($errors->has('nama'))
                                <span class="error invalid-feedback">
                                    {{ $errors->first('nama') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="5">{{ $category->description ?? old('description') }}</textarea>
                            @if($errors->has('description'))
                                <span class="error invalid-feedback">
                                    {{ $errors->first('description') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="float-right">
                            <a href="{{ route('category.index') }}" class="btn btn-sm btn-danger">
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