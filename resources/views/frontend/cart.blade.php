@extends('layouts.front')

@section('title')
My Cart
@endsection

@section('content')

<section class="section-pagetop bg">
    <div class="container">
        <h2 class="title-page">My Cart</h2>
        <nav>
            <ol class="breadcrumb text-white">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('cart') }}">Cart</a></li>
            </ol>
        </nav>
    </div> <!-- container //  -->

    <section class="section-content padding-y bg">
        <div class="container">
            @foreach($cartitems as $item)
                <div class="product_data">
                    <div class="row">
                        <main class="col-md-9">
                            <article class="card card-body mb-3">
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
                                            <label>Quantity</label>
                                            <div class="input-group mb-3 input-spinner">
                                                <div class="input-group-append">
                                                    <button class="btn btn-light decrement-btn" type="button"
                                                        id="button-minus"> &minus; </button>
                                                </div> 
                                                <input type="text" name="quantity" class="form-control qty-input"
                                                    value="{{ $item->prod_qty }}">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-light increment-btn" type="button"
                                                        id="button-plus"> + </button>
                                                </div>
                                            </div>
                                        </div> <!-- col.// -->
                                    </div> <!-- col.// -->
                                    <div class="col">
                                        <div class="price h5"> @currency($item->products->selling_price) </div>
                                    </div>
                                    <div class="col flex-grow-0 text-right">
                                        <button class="btn btn-light delete-cart-item"> <i class="fa fa-times"></i> </button>
                                    </div>
                            </article> <!-- card .// -->
                    </div> <!-- row.// -->
                </div>
            @endforeach
        </div> <!-- container .//  -->
    </section>
    @endsection