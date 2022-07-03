<header class="section-header">
    <section class="header-main border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-sm-4 col-md-4 col-5">
                    <a href="{{ url('/') }}" class="brand-wrap mb-0">
                        <img class="logo" src=" {{ asset('frontend/images/logo.png') }}" style="width: 170px">
                    </a> <!-- brand-wrap.// -->
                </div>
                <div class="col-lg-4 col-xl-5 col-sm-8 col-md-4 d-none d-md-block">

                    <div class="search-bar">
                        <form action="{{ url('searchproduct') }}" class="search-bar" method="POST">
                            @csrf
                            <div class="input-group w-100">
                                <input type="search" id="search_product" name="product_name" required class="form-control" style="width:55%;"
                                    placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- search-wrap .end// -->
                </div> <!-- col.// -->
                <div class="col-lg-5 col-xl-4 col-sm-8 col-md-4 col-7">
                    <div class="d-flex justify-content-end">
                        <a href="{{ url('cart') }}" class="widget-header mr-3">
                            <div class="icon">
                                <i class="icon-sm rounded-circle border fa fa-shopping-cart"></i>
                                <span class="notify cart-count">0</span>
                            </div>
                        </a>
                        <a href="{{ url('wishlist') }}" class="widget-header mr-3">
                            <div class="icon">
                                <i class="icon-sm rounded-circle border fa fa-heart"></i>
                                {{-- <span class="notify wishlist-count">0</span> --}}
                            </div>
                        </a>
                        <!-- Authentication Links -->
                        @guest
                            <div class="widget-header dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle" data-offset="20,10">
                                    <div class="icon icon-sm rounded-circle border ">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <span class="sr-only">Profile actions</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @if(Route::has('login'))
                                        <a class="dropdown-item"
                                            href="{{ route('login') }}">{{ __('Login') }}</a>
                                    @endif
                                    @if(Route::has('register'))
                                        <li class="nav-item">
                                            <a class="dropdown-item"
                                                href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <div class="widget-header dropdown">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle" data-offset="20,10">
                                            <div class="icon icon-sm rounded-circle border ">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <span class="sr-only">Profile actions</span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" id="navbarDropdown" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ Auth::user()->name }}
                                            </a>
                                            <a class="dropdown-item" href="{{ url('my-orders') }}"
                                                id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                My Orders
                                            </a>
                                            <hr class="dropdown-divider">
                                            {{-- <a class="dropdown-item" href="#">Log out</a> --}}
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}"
                                                method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                        @endguest
                        <!--  dropdown-menu .// -->
                    </div> <!-- widget-header .// -->


                </div> <!-- widgets-wrap.// -->
            </div> <!-- col.// -->
        </div> <!-- row.// -->
        </div> <!-- container.// -->
    </section> <!-- header-main .// -->


    <nav class="navbar navbar-expand-md navbar-main border-bottom">
        <div class="container">
            <form class="d-md-none my-2">
                <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Search" required="">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary"> <i class="fas fa-search"></i> </button>
                    </div>
                </div>
            </form>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#dropdown6">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="dropdown6">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/') }}">Home</a> </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/" data-toggle="dropdown">Shop</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item b" href="{{ url('category/') }}">All
                                Categories</a>
                        {{--
                            @foreach($categories as $cate)
                                <a class="dropdown-item"
                                    href="{{ url('view-category/'.$cate->slug) }}">{{ $cate->name }}</a>
                            @endforeach                                                    
                        --}}
                       
                        </div>
                    </li>
                </ul>
            </div> <!-- collapse .// -->
        </div> <!-- container .// -->
    </nav>