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
            
                                <input id="name" type="text" class="input @error('name') is-danger @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        
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
            
                                <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            
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
                                    <select name="propinsi">
                                        <option value="">Propinsi 1</option>
                                        <option value="">Propinsi 2</option>
                                        <option value="">Propinsi 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <label for="kota" class="label">Kota</label>
                                <div class="select is-fullwidth">
                                    <select name="kota">
                                        <option value="">Kota 1</option>
                                        <option value="">Kota 2</option>
                                        <option value="">Kota 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
        
                       <div class="field">
                           <div class="control">
                               <label for="address" class="label">Address</label>
                               <textarea name="address" id="address" rows="5" class="textarea @error('address') is-danger @enderror"></textarea>
                               
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
                            <input type="text" name="phone" class="input @error('phone') is-danger @enderror">
                            
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
                <hr>
                <div class="column is-12">
                    @if ($carts)
                        {{-- <a href="/" class="button is-danger is-small is-rounded mb-3">Product List</a> --}}
                        <h2 class="is-size-2">Shopping Carts</h2>
    
                        @php
                            $totalItems = 0;
                            $totalPrice = 0;
                        @endphp
    
                        @foreach ($carts as $cart)
                            <div class="card">
                                <div class="card-header">
                                    <p class="card-header-title">
                                        {{ $cart['name'] }}
                                    </p>
                                </div>
                                
                                <div class="card-content">
                                    <div class="content">
                                        <div class="columns">
                                            <div class="column is-3">
                                                <img src="{{ $cart['image'] }}" alt="Foto Tidak Ada" class="image is-128x128">
                                            </div>
        
                                            <div class="column is-9">
                                                <p class="is-size-5">{{ $cart['description'] }}</p>
                                                <p class="is-size-4 has-text-danger">{{ formatRupiah($cart['price']) }}</p>
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

            <div class="column is-4">
                <h2 class="is-size-2">Cart Detail</h2>
                <div class="card">
                    <div class="card-content">
                        <div class="content">
                            <p class="is-size-5">Jumlah Item : {{ $totalItems }} Items</p>
                            <p class="is-size-5">Total Price : {{ formatRupiah($totalPrice) }}</p>
                            <hr>
                            <a href="{{ route('checkout.index') }}" class="button is-danger is-small is-rounded is-fullwidth">Go to Payment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection