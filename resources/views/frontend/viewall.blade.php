@extends('layouts.front')

@section('title')
    Diserv
@endsection

@section('content')
    {{-- @include('layouts.inc.slider') --}}
   
    <section class="section-name  padding-y-sm">
      <div class="container">
      
      <header class="section-heading">
        <h3 class="section-title">All Products</h3>
      </header><!-- sect-heading -->
        
      <div class="row">
        @foreach ($products as $prod)
          <div class="col-md-3">
            <div href="#" class="card card-product-grid">
              <a href="{{ url('category/'.$prod->category->slug.'/'.$prod->slug) }}" class="img-wrap">
                        @php $image = json_decode($prod->image); @endphp
                  <img src="{{ asset('assets/uploads/image/'.$image[0]) }}" alt="Product Image"> </a>
              <figcaption class="info-wrap">
                <a href="#" class="title">{{ $prod->name }}</a>
                <div class="price2 mt-1 text-muted"><small><s> @currency($prod->original_price) </s></small></div> <!-- price-wrap.// -->
                <div class="price"> @currency($prod->selling_price)</div>
              </figcaption>
            </div>
         </div>
        @endforeach
        
      </div>
        <div>
          <div>
              {{ $products->links() }}
          </div>
        </div>
      
      <!-- container // -->
      </section>
@endsection