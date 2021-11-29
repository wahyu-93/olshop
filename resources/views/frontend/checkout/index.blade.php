@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-8">
                <div class="column is-12">
                    <h2 class="is-size-2">Checkout</h2>
                    <p class="is-size-5">Shipping Addres</p>
                    <hr>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
        
                        <div class="field">
                            <div class="control">
                                <label for="name" class="label">{{ __('Name') }}</label>
            
                                <input id="name" type="text" class="input @error('name') is-danger @enderror" name="name" value="{{ Auth()->user()->name ?? old('name') }}" required autocomplete="name" autofocus>
        
                                @error('name')
                                    <span class="help is-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        
                        <div class="field">
                            <div class="control">
                                <label for="email" class="label">{{ __('E-Mail') }}</label>
            
                                <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email" value="{{ Auth()->user()->email ?? old('email') }}" required autocomplete="email">
            
                                @error('email')
                                    <span class="help is-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <label for="propinsi" class="label">Propinsi</label>
                                <div class="select is-fullwidth">
                                    <select name="propinsi" name="province" id="province">
                                        <option value="">Pilih Provinsi</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <label for="kota" class="label">Kota</label>
                                <div class="select is-fullwidth">
                                    <select name="city" id="city">
                                        <option value="">Pilih Kota</option>
                                    </select>
                                </div>
                            </div>
                        </div>
        
                        <div class="field">
                            <div class="control">
                                <label for="courier" class="label">Courier</label>
                                <div class="select is-fullwidth">
                                    <select name="courier" id="courier">
                                        <option value="">Pilih Courier</option>
                                        @foreach ($couriers as $key => $courier)
                                            <option value="{{ $key }}">{{ $courier }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <label for="service" class="label">Service</label>
                                <div class="select is-fullwidth">
                                    <select name="service" id="service">
                                        <option value="">Pilih Service</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                       <div class="field">
                           <div class="control">
                                <label for="address" class="label">Address</label>
                                <textarea name="address" id="address" rows="5" class="textarea @error('address') is-danger @enderror">{{ Auth()->user()->address ?? old('address') }}</textarea>
                               
                               @error('address')
                                    <span class="help is-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>
                       </div>

                       <div class="field">
                        <div class="control">
                            <label for="phone" class="label">Phone</label>
                            <input type="text" name="phone" class="input @error('phone') is-danger @enderror" value="{{ Auth()->user()->phone ?? old('phone') }}">
                            
                            @error('phone')
                                 <span class="help is-danger" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                        </div>
                    </div>
        
                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-primary">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="column is-4">
                <h2 class="is-size-2">Cart Detail</h2>

                @if ($carts)
                    @php
                        $totalItems = 0;
                        $totalPrice = 0;
                    @endphp

                    @foreach ($carts as $cart)
                        <div class="card">                            
                            <div class="card-content">
                                <div class="content">
                                    <div class="columns">
                                        <div class="column is-3">
                                            <img src="{{ $cart['image'] }}" alt="Foto Tidak Ada" class="image is-64X64">
                                        </div>
    
                                        <div class="column is-9">
                                            <p class="is-size-5" >{{ $cart['name'] }}</p>
                                            {{-- <p class="is-size-5">{{ $cart['description'] }}</p> --}}
                                            <p class="is-size-5 has-text-danger">{{ formatRupiah($cart['price']) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @php
                            $totalItems += $cart['qty'];
                            $totalPrice += $cart['price'];
                        @endphp


                    @endforeach
                    
                    <div class="card">
                        <div class="card-content">
                            <div class="content">
                                <p class="is-size-5" id="jmlItem">Jumlah Item : 
                                    <span class="is-pulled-right">{{ $totalItems }} Items</span>
                                </p>

                                <p class="is-size-5" id="etd">ETD : 
                                    <span class="is-pulled-right"> - hari</span>
                                </p>

                                <p class="is-size-5" id="shipping_cast">Shipping Cost : 
                                    <span class="is-pulled-right">Rp. 0</span>
                                </p>

                                <p class="is-size-5" id="ttlPrice">Total Price : 
                                    <span class="is-pulled-right">{{ formatRupiah($totalPrice) }}</span>
                                </p>
                                
                                <hr>

                                <p class="is-size-5" id="grand_total">Grand Total
                                    <span class="is-pulled-right">{{ formatRupiah($totalPrice) }}</span>
                                </p>

                            </div>
                        </div>
                    </div>
                @else 
                    <div class="card">
                        <div class="card-content">
                            <div class="content">
                                <h3 class="is-size-4">Oppps Empty Cart</h3>
                            </div>
                        </div>
                    </div>
                @endif
                

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $.ajax({
                type: 'GET',
                url: "{{ route('rajaongkir.province') }}",
                success: function(data){
                    let provinces = data

                    provinces.forEach(province => {
                        // $('#province').append('<option value="'+province.province_id +'">'+province.province+'</option>')

                        let provinsi = new Option(province.province_id, province.province_id)
                        $(provinsi).html(province.province)
                        $('#province').append(provinsi)
                    })
                }
            })

            $('#province').change(function(){
                let province_id = $('#province').val()
                
                $.ajax({
                    type: 'GET',
                    url: "{{ route('rajaongkir.city') }}",
                    data: 'province=' + province_id,
                    success: function(data){
                        // console.log(data)
                        $('#city').empty().append('<option>Pilih Kota</option>')

                        data.forEach(city => {
                            let kota = new Option(city.city_id, city.city_id)
                            $(kota).html(city.city_name)
                            $('#city').append(kota)
                        })
                    } 
                })
            })

            $('#courier').change(function(){
                let cityId = $('#city').val()
                let courier = $('#courier').val()

                $.ajax({
                    type: 'POST',
                    url: "{{ route('rajaongkir.cost') }}",
                    data: {
                        'city' : cityId,
                        'courier' : courier
                    },
                    success: function(data){
                        console.log(data)
                        let services = data[0].costs
                        $('#service').empty().append('<option>Pilih Service</option>')

                        services.forEach(service => {
                            // let kota = new Option(city.city_id, city.city_id)
                            // $(kota).html(city.city_name)
                            // $('#city').append(kota)
                            
                            $('#service').append('<option value="'+ service.service +'">'+ service.description +' (Rp. '+ service.cost[0].value.toLocaleString() +' ) </option>')
                        })
                    } 
                })
            })
        })
    </script>
@endpush