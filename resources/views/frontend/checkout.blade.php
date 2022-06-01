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
                                    <input type="text" name="fname" value="{{ Auth::user()->name }}" placeholder="First Name" class="form-control fname">
                                    <span id="fname_error" class="text-danger"></span>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Last Name</label>
                                    <input type="text" name="lname" value="{{ Auth::user()->lname }}" placeholder="Last Name" class="form-control lname">
                                    <span id="lname_error" class="text-danger"></span>

                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ Auth::user()->email }}" placeholder="example@gmail.com" class="form-control email">
                                    <span id="email_error" class="text-danger"></span>

                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" value="+62" class="form-control phone">
                                    <span id="phone_error" class="text-danger"></span>

                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Address 1</label>
                                    <input type="text" name="address1" value="{{ Auth::user()->address1 }}" placeholder="Address 1" class="form-control address1">
                                    <span id="address1_error" class="text-danger"></span>

                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Address 2</label>
                                    <input type="text" name="address2" value="{{ Auth::user()->address2 }}" placeholder="Address 2" class="form-control address2">
                                    <span id="address2_error" class="text-danger"></span>

                                </div>
                                <div class="form-group col-sm-6">
                                    <label>City</label>
                                    <input type="text" name="kota" value="{{ Auth::user()->kota }}" placeholder="City" class="form-control kota">
                                    <span id="kota_error" class="text-danger"></span>

                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Province</label>
                                    <input type="text" name="provinsi" value="{{ Auth::user()->provinsi }}" placeholder="Province" class="form-control provinsi">
                                    <span id="provinsi_error" class="text-danger"></span>

                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Subdistrict</label>
                                    <input type="text" name="kecamatan" value="{{ Auth::user()->kecamatan }}" placeholder="Subdistrict" class="form-control kecamatan">
                                    <span id="kecamatan_error" class="text-danger"></span>

                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Ward/Village</label>
                                    <input type="text" name="kelurahan" value="{{ Auth::user()->kelurahan }}" placeholder="Ward/Village" class="form-control kelurahan">
                                    <span id="kelurahan_error" class="text-danger"></span>

                                </div>
                                <div class="form-group col-sm-6"> 
                                    <label>Postal Code</label>
                                    <input type="text" name="kode_pos" value="{{ Auth::user()->kode_pos }}" placeholder="Postal Code" class="form-control kode_pos">
                                    <span id="kode_pos_error" class="text-danger"></span>

                                </div>
                            </div> <!-- row.// -->
                    </div> <!-- card-body.// -->
                </article> <!-- card.// -->

                <article class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Shipping Service</h4>
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
                                <dt>Shipping Cost :</dt>
                                {{-- <dd class="h6">@currency($total)</dd> --}}
                            </dl>
                            <dl class="dlist-align">
                                <dt>Total :</dt>
                                <dd class="h5">@currency($total)</dd>
                            </dl>
                            <hr>
                            @if($total>1)
                            <button type="submit" class="btn btn-primary btn-block">Cash On Delivery</button>
                            <button type="button" class="btn btn-primary btn-block pay-btn">Pay Now</button>

                            @else
                            <a href="#" class="btn btn-primary btn-block disabled" role="button">Cart Empty</a>
                            <a href="{{ url('/') }}" class="btn btn-light btn-block">Continue Shopping</a>
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

@section ('scripts')
<!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="Mid-client-Ltl8EVn8FA50esva"></script>
<!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
@endsection




