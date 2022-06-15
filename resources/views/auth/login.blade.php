@extends('layouts.front')

@section('content')

<div class="card mx-auto" style="max-width: 380px; margin-top:60px;">
    <div class="card-body">
    <h4 class="card-title mb-4">{{ __('Login') }}</h4>
    <form method="POST" action="{{ route('login') }}">
        @csrf
          {{-- <a href="#" class="btn btn-facebook btn-block mb-2"> <i class="fab fa-facebook-f"></i> &nbsp  Sign in with Facebook</a>
          <a href="#" class="btn btn-google btn-block mb-4"> <i class="fab fa-google"></i> &nbsp  Sign in with Google</a> --}}
        <div class="form-group">
           <input name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email Address') }}" type="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
           @error('email')
           <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>
       @enderror
        </div> <!-- form-group// -->
        <div class="form-group">
            <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div> <!-- form-group// -->
        
        <div class="form-group">
            <a href="#" class="float-right">Forgot password?</a> 
          <label class="float-left custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked=""> <div class="custom-control-label"> {{ __('Remember Me') }} </div> </label>
        </div> <!-- form-group form-check .// -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block"> {{ __('Login') }} </button>
            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
        </div> <!-- form-group// -->    
    </form>
    </div> <!-- card-body.// -->
  </div> <!-- card .// -->

   <p class="text-center mt-4">Don't have account? <a href="{{ route('register') }}">Register</a></p>
<br><br>
<br><br>

   @endsection

{{-- <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

