{{-- @extends('layouts.app') --}}
@extends('layouts.front')

@section('content')

<div class="card mx-auto" style="max-width:520px; margin-top:40px;">
    <article class="card-body">
        <header class="mb-4">
            <h4 class="card-title">{{ __('Register') }}</h4>
        </header>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-row">
            <div class="form-group col-md-6">
            {{-- <div class="form-group"> --}}
                <label>{{ __('First Name') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> <!-- form-group end.// -->

            <div class="form-group col-md-6">
            {{-- <div class="form-group"> --}}
                <label>{{ __('Last Name') }}</label>
                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname"
                    value="{{ old('lname') }}" required autocomplete="lname" autofocus>

                @error('lname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> <!-- form-group end.// -->
           
            
        </div>

            <div class="form-group">
                <label>{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <small class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div> <!-- form-group end.// -->
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> <!-- form-group end.// -->
                <div class="form-group col-md-6">
                    <label>{{ __('Repeat Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
                </div> <!-- form-group end.// -->
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> {{ __('Register') }}
                </button>
            </div> <!-- form-group// -->
            {{-- <div class="form-group"> 
                  <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked=""> <div class="custom-control-label"> I am agree with <a href="#">terms and contitions</a>  </div> </label>
              </div> <!-- form-group end.// -->            --}}
        </form>
    </article><!-- card-body.// -->
</div> <!-- card .// -->
<p class="text-center mt-4">Have an account? <a href="{{ route('login') }}">Log In</a></p>
<br><br>

{{-- <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email"
                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password"
                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password-confirm"
                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div> --}}
@endsection