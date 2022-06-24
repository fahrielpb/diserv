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
                                    <input type="text" name="fname" value="{{ Auth::user()->name }}" placeholder="First Name" class="form-control fname" required>
                                    <span id="fname_error" class="text-danger"></span>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Last Name</label>
                                    <input type="text" name="lname" value="{{ Auth::user()->lname }}" placeholder="Last Name" class="form-control lname" required>
                                    <span id="lname_error" class="text-danger"></span>

                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ Auth::user()->email }}" placeholder="example@gmail.com" class="form-control email" required>
                                    <span id="email_error" class="text-danger"></span>

                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Phone</label>
                                    @if ($order)
                                    <input type="text" name="phone" value="{{ $order->phone }}" class="form-control phone" required>
                                    @else
                                    <input type="text" name="phone" placeholder="+62" class="form-control phone" required>
                                    @endif
                                    <span id="phone_error" class="text-danger"></span>

                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Address 1</label>
                                    @if ($order)
                                    <input type="text" name="address1" value="{{ $order->address1 }}" class="form-control address1" required>
                                    @else
                                    <input type="text" name="address1" placeholder="Address 1" class="form-control address1" required>
                                    @endif

                                    {{-- <input type="text" name="address1" value="{{ Auth::user()->address1 }}" placeholder="Address 1" class="form-control address1" required> --}}
                                    <span id="address1_error" class="text-danger"></span>

                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Address 2</label>
                                    @if ($order)
                                    <input type="text" name="address2" value="{{ $order->address2 }}" class="form-control address2" required>
                                    @else
                                    <input type="text" name="address2" placeholder="Address 2" class="form-control address2" required>
                                    @endif
                                    
                                    {{-- <input type="text" name="address2" value="{{ Auth::user()->address2 }}" placeholder="Address 2" class="form-control address2" required> --}}
                                    <span id="address2_error" class="text-danger"></span>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label>Province</label>
                                    @if ($order)
                                    <input type="text" name="provinsi" value="{{ $order->provinsi }}" class="form-control provinsi" required>
                                    @else
                                    <input type="text" name="provinsi" placeholder="Province" class="form-control provinsi" required>
                                    @endif

                                    {{-- <input type="text" name="provinsi" value="{{ Auth::user()->provinsi }}" placeholder="Province" class="form-control provinsi" required> --}}
                                    <span id="provinsi_error" class="text-danger"></span>
                                </div>

                                {{-- <div class="form-group col-sm-6">
                                    <select name="province_destination" id="province" placeholder="Province" class="form-control provinsi">
                                        <option value="{{ Auth::user()->provinsi }}" holder>Province</option>
                                        @foreach($provinces as $province)
                                        <option value="{{$province->id}}">{{$province->province}}</option>
                                        @endforeach
                                    </select>
                                    <span id="provinsi_error" class="text-danger"></span>
                                </div> --}}

                                <div class="form-group col-sm-6">
                                    <label>City</label>
                                    @if ($order)
                                    <input type="text" name="kota" value="{{ $order->kota }}" class="form-control kota" required>
                                    @else
                                    <input type="text" name="kota" placeholder="City" class="form-control kota" required>
                                    @endif

                                    {{-- <input type="text" name="kota" value="{{ Auth::user()->kota }}" placeholder="City" class="form-control kota" required> --}}
                                    <span id="kota_error" class="text-danger"></span>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label>Subdistrict</label>
                                    @if ($order)
                                    <input type="text" name="kecamatan" value="{{ $order->kecamatan }}" class="form-control kecamatan" required>
                                    @else
                                    <input type="text" name="kecamatan" placeholder="Subdistrict" class="form-control kecamatan" required>
                                    @endif

                                    {{-- <input type="text" name="kecamatan" value="{{ Auth::user()->kecamatan }}" placeholder="Subdistrict" class="form-control kecamatan" required> --}}
                                    <span id="kecamatan_error" class="text-danger"></span>

                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Ward/Village</label>
                                    @if ($order)
                                    <input type="text" name="kelurahan" value="{{ $order->kelurahan }}" class="form-control kelurahan" required>
                                    @else
                                    <input type="text" name="kelurahan" placeholder="Ward/Village" class="form-control kelurahan" required>
                                    @endif

                                    {{-- <input type="text" name="kelurahan" value="{{ Auth::user()->kelurahan }}" placeholder="Ward/Village" class="form-control kelurahan" required> --}}
                                    <span id="kelurahan_error" class="text-danger"></span>

                                </div>
                                <div class="form-group col-sm-6"> 
                                    <label>Postal Code</label>
                                    @if ($order)
                                    <input type="text" name="kode_pos" value="{{ $order->kode_pos }}" class="form-control kode_pos" required>
                                    @else
                                    <input type="text" name="kode_pos" placeholder="Postal Code" class="form-control kode_pos" required>
                                    @endif

                                    {{-- <input type="text" name="kode_pos" value="{{ Auth::user()->kode_pos }}" placeholder="Postal Code" class="form-control kode_pos" required> --}}
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
                                    // dd($total);

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
                            <p class="payment-instructions text-muted">
                                You will be redirected to another page to complete the payment.
                            </p>
                            @if($total>1)
                            <button type="submit" class="btn btn-primary btn-block">Checkout</button>
                            {{-- <button type="button" class="btn btn-primary btn-block pay-btn">Pay Now</button> --}}

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




