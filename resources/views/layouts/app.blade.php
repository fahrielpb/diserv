<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="max-age=604800" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
      @yield('title')
    </title>

    <link href="{{ asset('frontend/images/favicon.ico') }}" rel="shortcut icon" type="image/x-icon">

    <!-- jQuery -->
    <script src="{{ asset('frontend/js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap4 files-->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Fonticons -->
    <link href="{{ 'frontend/fonts/fontawesome/css/all.min.css' }}" type="text/css" rel="stylesheet">
    <link href="{{ 'frontend/fonts/feathericons/css/iconfont.css' }}" rel="stylesheet" type="text/css" />
    <link href="{{ 'frontend/fonts/material-icons/css/materialdesignicons.css' }}" rel="stylesheet" type="text/css" />

    <!-- Font awesome 5 -->
    <link href="{{ asset('fonts/fontawesome/css/all.min.css') }}" type="text/css" rel="stylesheet">

    <!-- custom style -->
    <link href="{{ asset('frontend/css/ui.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)" />
    
    <!-- custom javascript -->
    <script src="{{ asset('frontend/js/script.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
    /// some script

    // jquery ready start
    $(document).ready(function() {
      // jQuery code

    }); 
    // jquery end
    </script>
    
</head>
<body>
    @include('layouts.inc.frontnavbar')
    {{-- <div id="app"> --}}
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        My Profile
                                        </a>
                                    </li>
                              <li>
                                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                              <li>
                            </ul>
                          </li>
                
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        <div class="content">
            @yield('content')
        </div>
    
      <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
      <script src="{{ asset('frontend/js/script.js') }}" defer></script>
    
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
      @if (session('status'))
            <script>
                swal("{{ session('status') }}");
            </script>
      @endif
      @yield('scripts')

</body>
</html>
