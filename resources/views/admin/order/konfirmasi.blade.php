@extends('admin.templates.default')
@section('content')
    <div class="row mt-3">
        <div class="col-md-10 offset-1 mt-3">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h1 class="card-title" style="font-size: 32px">Konfirmasi Transfer Order</h1>
                    <a href="{{ route('admin.order') }}" class="btn btn-danger btn-sm float-right">
                        <span>
                            <i class="fa fa-arrow-left"></i>
                        </span>
                    </a>
                </div>

                <div class="card-body">
                    <p class="has-text-centered is-size-5">Order Name : <b>{{ $order->user->name }}</b> with Transaction Id : <b>{{ $order->id }}</b>, Date Order : <b>{{ $order->created_at }}</b>, Amount : <b>{{ formatRupiah($order->total + $order->shiping_cost) }}</b></p>
                    <img src="{{ asset($order->getImage()) }}" alt="" class="img-thumbnail mb-3">
                    <p>Catatan dari User : </p>
                    <h5>{{ $order->catatan }}</h5>

                    <button 
                        id="cancel" 
                        class="btn btn-danger" 
                        href="{{ route('admin.konfirm.cancel', $order) }}">
                        Cancel (Konfirmasi Ulang)
                    </button>
                    
                    <button 
                        id="ok" 
                        class="btn btn-info" 
                        href="{{ route('admin.konfirm.ok', $order) }}">
                        Konfirmasi Ok
                    </button>

                    <form action="" method="POST" style="display: none" id="form-submit">
                        @csrf
                    </form>
                </div>
            </div>           
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(function(){
        $('button#cancel').click(function(){
            let link = $(this).attr('href')
            submitProses(link)
        })

        $('button#ok').click(function(){
            let link = $(this).attr('href')
            submitProses(link)
        })

        function submitProses(link){
            document.getElementById('form-submit').action = link
            document.getElementById('form-submit').submit()
            swal("sukses", {
                icon: "success",
            });
        }

    })
</script>
@endpush
