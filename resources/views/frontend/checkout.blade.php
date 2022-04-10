@extends('layouts.front')

@section('title')
Checkout Products
@endsection

@section('content')
<section class="section-content padding-y bg">
    <div class="container">
      <form action="{{ url('place-order') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <main class="col-md-8">
                <article class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Basic Details</h4>
                            <div class="row checkout-form">
                                <div class="form-group col-sm-6">
                                    <label for="">First Name</label>
                                    <input type="text" name="fname" value="{{ Auth::user()->name }}" placeholder="First Name" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Last Name</label>
                                    <input type="text" name="lname" value="{{ Auth::user()->lname }}" placeholder="Last Name" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ Auth::user()->email }}" placeholder="example@gmail.com" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" value="+62" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Address 1</label>
                                    <input type="text" name="address1" value="{{ Auth::user()->address1 }}" placeholder="Address 1" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Address 2</label>
                                    <input type="text" name="address2" value="{{ Auth::user()->address2 }}" placeholder="Address 2" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Provinsi</label>
                                    <input type="text" name="provinsi" value="{{ Auth::user()->provinsi }}" placeholder="Provinsi" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Kecamatan</label>
                                    <input type="text" name="kecamatan" value="{{ Auth::user()->kecamatan }}" placeholder="Kecamatan" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Kelurahan/Desa</label>
                                    <input type="text" name="kelurahan" value="{{ Auth::user()->kelurahan }}" placeholder="Kelurahan/Desa" class="form-control">
                                </div>
                                <div class="form-group col-sm-6"> 
                                    <label>Kode Pos</label>
                                    <input type="text" name="kode_pos" value="{{ Auth::user()->kode_pos }}" placeholder="Kode Pos" class="form-control">
                                </div>
                            </div> <!-- row.// -->
                    </div> <!-- card-body.// -->
                </article> <!-- card.// -->
            </main> <!-- col.// -->

            <aside class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title mb-1">Review cart</h4>
                        <div class="row">
                            @php
                                $total = 0;
                            @endphp
                            @foreach($cartitems as $item)
                                <div class="card-body">
                                    <figure class="itemside">
                                        <div class="aside"><img
                                                src="{{ asset('assets/uploads/products/'.$item->products->image) }}"
                                                class="border img-sm"></div>
                                        <figcaption class="info">
                                            <p>{{ $item->products->name }}</p>
                                            <span class="text-muted">{{ $item->prod_qty }} x
                                                @currency($item->products->selling_price)</span>
                                        </figcaption>
                                    </figure>
                                </div> <!-- card-body.// -->
                                @php
                                    $total += $item->products->selling_price * $item->prod_qty ;
                                @endphp
                            @endforeach
                        </div> <!-- row.// -->

                        <div class="col">
                            <hr>
                            <dl class="dlist-align">
                                <dt>Total:</dt>
                                <dd class="h5">@currency($total)</dd>
                            </dl>
                            <hr>
                            @if($total>1)
                            <button type="submit" class="btn btn-primary btn-block">Place Order</button>
                            @else
                            <a href="#" class="btn btn-primary btn-block disabled" role="button">Cart Empty</a>
                            @endif
                        </div>
                    </div>
                </div>
            </aside>

        </div> <!-- row.// -->
      </form>
    </div> <!-- container .//  -->
</section>
@endsection