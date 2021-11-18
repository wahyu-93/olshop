@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-centered">
        <div class="column is-half box">
            <p class=is-size-3>{{ __('Login') }}</p><hr>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="field">
                    <div class="control">
                        <label for="email" class="label">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                        @error('email')
                            <span class="help is-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <label for="password" class="label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="help is-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <input class="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                        <label for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-success is-normal">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="button is-ghost is-normal" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection