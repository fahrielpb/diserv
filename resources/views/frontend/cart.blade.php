@extends('layouts.front')

@section('title')
My Cart
@endsection

@section('content')

<section class="section-pagetop bg">
    <div class="container">
        <h2 class="title-page">My Cart</h2>
        {{-- <nav>
            <ol class="breadcrumb text-white">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('cart') }}">Cart</a></li>
            </ol>
        </nav> --}}
    </div> <!-- container //  -->

    <section class="section-content padding-y bg">
        <div class="container cartitems">
            @php
                $total = 0;
            @endphp
            @foreach($cartitems as $item)
                <div class="product_data">
                    <div class="row">
                        <aside class="col-md-12">
                            <article class="card card-body mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <figure class="itemside">
                                            <div class="aside"><img
                                                    src="{{ asset('assets/uploads/products/'.$item->products->image) }}"
                                                    class="border img-sm"></div>
                                            <figcaption class="info">
                                                <span class="text-muted">{{ $item->categories }}</span>
                                                <a href="#" class="title">{{ $item->products->name }}</a>
                                            </figcaption>
                                        </figure>
                                    </div> <!-- col.// -->
                                    <div class="col">
                                        <div class="form-group col-md flex-grow-0">
                                            <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                            @if ($item->products->qty >= $item->prod_qty)                                            
                                            {{-- <label>Quantity</label> --}}
                                            <div class="input-group mb-3 input-spinner">
                                                <div class="input-group-append">
                                                    <button class="btn btn-light changeQuantity decrement-btn"> &minus; </button>
                                                </div>
                                                <input type="text" name="quantity" class="form-control qty-input"
                                                    value="{{ $item->prod_qty }}">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-light changeQuantity increment-btn"> + </button>
                                                </div>
                                            </div>
                                            @php
                                            $total += $item->products->selling_price * $item->prod_qty ;
                                        @endphp
                                        @else
                                        <h6>Out of stock</h6>
                                            @endif
                                        </div> <!-- col.// -->
                                    </div> <!-- col.// -->
                                    <div class="col">
                                        <div class="price h5"> @currency($item->products->selling_price) </div>
                                    </div>
                                    <div class="col flex-grow-0 text-right">
                                        <button class="btn btn-light delete-cart-item"> <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                            </article> <!-- card .// -->
                        </aside>
                    </div> <!-- row.// -->
                </div>
               
            @endforeach

            {{-- total --}}
            <div class="row">
            <aside class="col-md-12">
                <div class="card card-body mt-3">
                    {{-- <dl class="dlist-align">
                      <dt>Total price:</dt>
                      <dd class="text-right">$69.00</dd>
                    </dl>
                    <dl class="dlist-align">
                      <dt>Discount:</dt>
                      <dd class="text-right text-danger">- $13.00</dd>
                    </dl> --}}
                    <dl class="dlist-align">
                      <dt>Total:</dt>
                      <dd class="text-right text-dark b"><strong>@currency($total)</strong></dd>
                    </dl>
                    <hr>
                    {{-- @if($cartitems->count()>0) --}}
                    <a href="{{ url('checkout') }}" class="btn btn-primary btn-block"> Checkout </a>
                    {{-- @else
                    <a href="{{ url('checkout') }}" class="btn btn-primary btn-block disabled" role="button"> Checkout </a>
                    @endif --}}
                    <a href="{{ url('/') }}" class="btn btn-light btn-block">Continue Shopping</a>
                </div> <!-- card-body.// -->
            </aside> <!-- col.// -->
            </div> {{-- row --}}
            
        </div> <!-- container .//  -->
    </section>

    @endsection