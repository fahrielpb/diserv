@extends('layouts.front')

@section('title', $products->name)

@section('content')
<section class="section-pagetop bg">
<div class="container">
	<h2 class="title-page">Detail Products</h2>
	<nav>
	<ol class="breadcrumb text-white">
	    <li class="breadcrumb-item"><a href="{{ url('category') }}">All Categories</a></li>
	    <li class="breadcrumb-item"><a href="{{ url('view-category/'.$products->category->slug) }}">{{ $products->category->name }}</a></li>
	    <li class="breadcrumb-item active" aria-current="page">{{ $products->name }}</li>
	</ol>  
	</nav>
</div> <!-- container //  -->

<section class="section-content padding-y bg">
  <div class="container">
  <div class="card product_data">
    {{-- <div class="card-body"> --}}
	<div class="row no-gutters">
		<aside class="col-sm-6 border-right">
<article class="gallery-wrap"> 
	<div class="img-big-wrap">
	   <a href="#"><img src="{{ asset('assets/uploads/products/'.$products->image) }}"></a>
	</div> <!-- img-big-wrap.// -->
	<div class="thumbs-wrap">
	  <a href="#" class="item-thumb"> <img src="../images/items/1.jpg"></a>
	  <a href="#" class="item-thumb"> <img src="../images/items/2.jpg"></a>
	  <a href="#" class="item-thumb"> <img src="../images/items/3.jpg"></a>
	  <a href="#" class="item-thumb"> <img src="../images/items/4.jpg"></a>
	</div> <!-- thumbs-wrap.// -->
</article> <!-- gallery-wrap .end// -->
		</aside>
		<main class="col-sm-6">
<article class="content-body">
  @if ($products->qty > 0)
      <label class="badge bg-primary text-light">In stock</label>
  @else
  <label class="badge bg-danger">Out of stock</label>
  @endif
	<h2 class="title">{{ $products->name }}</h2>

	<p> {!! $products->description !!}</p>
	<ul class="list-normal cols-two">
		<li>Not just for commute </li>
		<li>Branded tongue and cuff </li>
		<li>Super fast and amazing </li>
		<li>Lorem sed do eiusmod tempor </li>
		<li>Easy fast and ver good </li>
		<li>Lorem sed do eiusmod tempor  </li>
	</ul>

<div class="h3 mb-4"> 
  <div class="price2 mt-1 text-muted"><small><s> @currency($products->original_price) </s></small></div> <!-- price-wrap.// -->
                <div class="price"> @currency($products->selling_price)</div> <!-- price-wrap.// -->
	{{-- <var class="price h4">$815.00</var>  --}}
</div> <!-- price-wrap.// -->

<div class="row">
  <div class="form-group col-md flex-grow-0">
    <input type="hidden" value="{{ $products->id }}" class="prod_id">
    <label>Quantity</label>
    <div class="input-group mb-3 input-spinner">
      <div class="input-group-append">
        <button class="btn btn-light decrement-btn" type="button" id="button-minus"> &minus; </button>
      </div>
      <input type="text" class="form-control qty-input" value="1">
      <div class="input-group-prepend">
        <button class="btn btn-light increment-btn" type="button" id="button-plus"> + </button>
      </div> 
    </div>
  </div> <!-- col.// -->
  <div class="form-group col-md">
      <label>Select size</label>
      <div class="mt-2">
        <label class="custom-control custom-radio custom-control-inline">
          <input type="radio" name="select_size" checked="" class="custom-control-input">
          <div class="custom-control-label">S</div>
        </label>

        <label class="custom-control custom-radio custom-control-inline">
          <input type="radio" name="select_size" class="custom-control-input">
          <div class="custom-control-label">M</div>
        </label>

        <label class="custom-control custom-radio custom-control-inline">
          <input type="radio" name="select_size" class="custom-control-input">
          <div class="custom-control-label">L</div>
        </label>

        <label class="custom-control custom-radio custom-control-inline">
          <input type="radio" name="select_size" class="custom-control-input">
          <div class="custom-control-label">XL</div>
        </label>

      </div>
  </div> <!-- col.// -->
</div> <!-- row.// -->



<div class="form-row">
  @if ($products->qty > 0)
  <div class="col">
		<a href="#" class="btn btn-primary w-100 addToCartBtn"> Add to cart <i class="fas fa-shopping-cart"></i>  </a>
	</div> <!-- col.// -->
  @else
  <div class="col">
		<a href="#" class="btn btn-primary disabled w-100 addToCartBtn" role="button"> Add to cart <i class="fas fa-shopping-cart"></i>  </a>
	</div> <!-- col.// -->
  @endif
	
	<div class="col">
		<a href="#" class="btn  btn-light"> <i class="fas fa-heart"></i>  </a>
	</div> <!-- col.// -->
</div> <!-- row.// -->

</article> <!-- product-info-aside .// -->
		</main> <!-- col.// -->
	</div> <!-- row.// -->
{{-- </div> <!-- card-body --> --}}
</div> <!-- card.// -->

</div> <!-- container .//  -->
</section>
@endsection