@extends('layouts.front')

@section('title')
Wishlist
@endsection

@section('content')

<section class="section-pagetop bg">
    <div class="container">
        <h2 class="title-page">Wishlist</h2>
        <nav>
            <ol class="breadcrumb text-white">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('wishlist') }}">Wishlist</a></li>
            </ol>
        </nav>
    </div> <!-- container //  -->

    <section class="section-content padding-y bg">
        <div class="container wishlistitems">
          
            @if($wishlist->count() > 0)
                {{-- wishlist card --}}
                
                <article class="card">
                    <header class="card-header"> My wishlist </header>
                    <div class="card-body">
                        <div class="row">
                          @foreach ($wishlist as $item)
                            <div class="col-md-4 product_data">
                                <figure class="itemside mb-4">
                                    <div class="aside"><img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" class="border img-md"></div>
                                    <figcaption class="info">
                                        <a href="#" class="title">{{ $item->products->name }}</a>
                                        {{-- <span class="text-muted">{{ $item->products->cate_id }}</span> --}}
                                        <p class="price mb-2">@currency($item->products->selling_price)</p>
                                        <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">  
                                        <a href="#" class="btn btn-primary btn-sm addToCartBtn1" data-toggle="tooltip" title="Tambahkan ke keranjang"> Add to cart </a>
                                        <a href="#" class="btn btn-danger btn-sm remove-wishlist-item" data-toggle="tooltip"
                                            title="Remove from wishlist"> <i class="fa fa-times"></i> </a>
                                    </figcaption>
                                </figure>
                            </div> <!-- col.// -->
                            @endforeach
                        </div> <!-- row .//  -->

                    </div> <!-- card-body.// -->
                </article>
                {{-- batas wishlist card --}}

            @else
                <article class="card">
                    <header class="card-header"> My wishlist </header>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">
                              <p class="b">No wishlist</p>
                            </div> <!-- col.// -->
                        </div> <!-- row .//  -->

                    </div> <!-- card-body.// -->
                </article>
            @endif

        </div> <!-- container .//  -->
    </section>


    @endsection