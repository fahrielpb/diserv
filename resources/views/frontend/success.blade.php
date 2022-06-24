@extends('layouts.front')

@section('title')
    Success
@endsection

@section('content')

    <section class="section-name  padding-y-sm">
      <div class="container">
      
      <header class="section-heading">
        <h3 class="section-title">Yay! Success</h3>
      </header><!-- sect-heading -->

      <p>
        Your transaction is success, thanks!
      </p>

      <a href="{{ url('/') }}" class="btn btn-primary">Home Page</a>
  
      <!-- container // -->
      </section>
@endsection