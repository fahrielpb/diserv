@extends('layouts.front')

@section('title')
    Category
@endsection

@section('content')

{{-- @include('layouts.inc.slider') --}}

<section class="section-name  padding-y-sm">
  <div class="container">
  
  <header class="section-heading">
    {{-- <a href="#" class="btn btn-outline-primary float-right">See all</a> --}}
    <h3 class="section-title">Category Products</h3>
  </header><!-- sect-heading -->

<div class="row">
  @foreach ($category as $cate)
    <div class="col-md-3">
      <div href="#" class="card card-product-grid">
        {{-- <a href="{{ url('view-category/'.$cate->slug) }}"> --}}
        <a href="{{ url('view-category/'.$cate->slug) }}" class="img-wrap"> <img src="{{ asset('assets/uploads/category/'.$cate->image) }}" alt="Category Image"> </a>
        <figcaption class="info-wrap">
          <a href="{{ url('view-category/'.$cate->slug) }}" class="title">{{ $cate->name }}</a>
          <p class="text-muted">
          {{ $cate->description }}
          </p>
        </figcaption>
        {{-- </a> --}}
      </div>
  </div>
  @endforeach
</div><!-- container // -->
</section>
@endsection

