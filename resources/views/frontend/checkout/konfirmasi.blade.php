@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="is-size-1 has-text-weight-bold has-text-centered" text-align="center">Konfirmasi Order</h1>
        <p class="has-text-centered is-size-5">Order Name : <b>{{ $order->user->name }}</b> with Transaction Id : <b>{{ $order->id }}</b>, Date Order : <b>{{ $order->created_at }}</b> </p>
        {{-- <hr> --}}
        <div class="columns is-centered mt-3">
            <div class="column is-10 mt-3 is-centered">
                <form method="post" action="{{ route('order.konfirmasi.post', $order) }}" enctype="multipart/form-data  ">
                    @csrf
                    
                    <div id="file-js-example" class="file has-name mb-2">
                        <label class="file-label">
                            <input class="file-input" type="file" name="foto">
                            <span class="file-cta">
                                <span class="file-icon">
                                <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">
                                Choose a file…
                                </span>
                            </span>
                            <span class="file-name">
                                No file uploaded
                            </span>
                        </label>
                    </div>

                    <div class="field">
                        <div class="control">
                            <label for="catatan" class="label">Catatan</label>
                            <textarea name="catatan" id="catatan" rows="5" class="textarea" placeholder="Catatan..."></textarea>
                        </div>
                    </div>
                      
                    <a href="{{ route('order.history.index') }}" class="button is-danger is-normal">Cancel</a>
                    <input type="submit" value="Simpan" class="button is-info is-normal">
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        const fileInput = document.querySelector('#file-js-example input[type=file]');
        fileInput.onchange = () => {
            console.log('asds')
          if (fileInput.files.length > 0) {
            const fileName = document.querySelector('#file-js-example .file-name');
            fileName.textContent = fileInput.files[0].name;
          }
        }
    })
</script>
@endpush



  
