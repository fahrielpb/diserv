<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="max-age=604800" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <link href="{{ asset('frontend/fonts/fontawesome/css/all.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('frontend/fonts/feathericons/css/iconfont.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/fonts/material-icons/css/materialdesignicons.css') }}" rel="stylesheet" type="text/css" />

    <!-- Font awesome 5 -->
    <link href="{{ asset('frontend/fonts/fontawesome/css/all.min.css') }}" type="text/css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous"> --}}
    <!-- custom style -->
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('frontend/css/ui.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)" />
    
    <!-- custom javascript -->
    {{-- <script src="{{ asset('frontend/js/script.js') }}" type="text/javascript"></script> --}}
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

    <div class="content">
        @yield('content')
    </div>

    @include('layouts.inc.frontfooter')

  {{-- <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}" defer></script> --}}
  <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
  <script src="{{ asset('frontend/js/script.js') }}" defer></script>
  <script src="{{ asset('frontend/js/custom.js') }}" defer></script>
  <script src="{{ asset('frontend/js/checkout.js') }}" defer></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  @if (session('status'))
        <script>
            swal("{{ session('status') }}");
        </script>
  @endif
  @yield('scripts')

</body>
</html>
