<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache"/>
    <meta http-equiv="cache-control" content="max-age=604800" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <link href="{{ asset('frontend/images/favicon.ico') }}" rel="shortcut icon" type="image/x-icon">

    <!-- jQuery -->
    {{-- <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}" type="text/javascript"></script> --}}
    <script src="{{ asset('frontend/js/jquery-3.6.0.js') }}" type="text/javascript"></script>

    <!-- Bootstrap4 files-->
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />

    <!-- Fonticons -->
    <link href="{{ asset('frontend/fonts/fontawesome/css/all.min.css') }}" type="text/css"
        rel="stylesheet">
    <link href="{{ asset('frontend/fonts/feathericons/css/iconfont.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('frontend/fonts/material-icons/css/materialdesignicons.css') }}"
        rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

    <!-- Font awesome 5 -->
    <link href="{{ asset('frontend/fonts/fontawesome/css/all.min.css') }}" type="text/css"
        rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous"> --}}
    <!-- custom style -->
    <link href="{{ asset('frontend/css/ui.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet"
        media="only screen and (max-width: 1200px)" />

    <!-- custom javascript -->
    <script src="{{ asset('frontend/js/script.js') }}" type="text/javascript"></script>

    {{-- <script type="text/javascript">
        /// some script

        // jquery ready start
        $(document).ready(function () {
            // jQuery code

        });
        // jquery end
    </script> --}}

</head>

<body>
    @include('layouts.inc.frontnavbar')

    <div class="content">
        @yield('content')
    </div>

    <div class="whatsapp">
        <a href="https://wa.me/+6281354307748?text=Halo%20Admin%20Diserv!" target="_blank">
            <img src="{{ asset('assets/uploads/whatsapp.png') }}" alt="whatsapp-logo"
                height="70px" width="70px" style="bottom: 10px;left:10px;position:fixed;">
        </a>
    </div>

    @include('layouts.inc.frontfooter')

    {{-- </script> --}}
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/script.js') }}" defer></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/checkout.js') }}" defer></script>
    

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/629f943bb0d10b6f3e762c65/1g4vlm2ao';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        var availableTags = [];
        $.ajax({
            method: "GET",
            url: "/product-list",
            success: function (availableTags) {
                // console.log(response);
                startAutoComplete(availableTags);
            }
        });

        function startAutoComplete(availableTags) {
            $("#search_product").autocomplete({
                source: availableTags
            });
        }
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if(session('status'))
        <script>
            swal("{{ session('status') }}");
        </script>
    @endif
    @yield('scripts')


    @stack('ongkir');

</body>

</html>