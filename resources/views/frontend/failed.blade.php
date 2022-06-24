@extends('layouts.front')

@section('title')
    Failed
@endsection

@section('content')

    <section class="section-name  padding-y-sm">
      <div class="container">
      
      <header class="section-heading">
        <h3 class="section-title">Oops!</h3>
      </header><!-- sect-heading -->

      <p>
        Your transaction is failed!
      </p>

      <a href="{{ url('/') }}" class="btn btn-primary">Home Page</a>
  
      <!-- container // -->
      </section>
@endsection