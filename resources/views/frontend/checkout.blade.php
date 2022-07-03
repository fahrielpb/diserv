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
                                    <label for="province">Province</label>
                                    <select name="province_destination" id="province" required placeholder="Province" class="form-control provinsi">
                                    <option value="">Choose Province</option>    
                                        @foreach($prov as $row)
                                        <option value="{{$row['province_id']}}">{{$row['province']}}</option>
                                        @endforeach
                                    </select>
                                    <span id="provinsi_error" class="text-danger"></span>
                                </div> 

                                <div class="form-group col-sm-6"> 
                                    <label for="kota">City</label>                                   
                                    <select class="form-control" id="kota" name="kota" disabled required>
                                        <option value="">Choose City</option>            
                                    </select>           
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

                                <div class="form-group col-sm-6 d-none">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Berat</span>
                                            </div>
                                            <input type="number" value="1" min="1" class="form-control" id="berat" name="berat"> 
                                            <div class="input-group-append">
                                            <span class="input-group-text">Kg</span>
                                            </div>
                                    </div>
                                </div> 

                                <div class="form-group col-sm-6">
                                <label for="kurir">Courier</label>                                  
                                <select class="form-control kurir" id="kurir" required disabled>
                                    <option value="">Choose Courier</option>
                                    <option value="jne">JNE</option>
                                    <option value="tiki">TIKI</option>
                                    <option value="pos">POS Indonesia</option>
                                </select> 
                                </div>

                                <div class="form-group col-sm-12">
                                <label for="layanan">Service</label>                                  
                                <select class="form-control layanan" name="shipping" id="layanan" required disabled>
                                    <option value="">Choose Service</option>                    
                                </select> 
                                </div>

                                <div class="form-group col-sm-12">
                                    <div id="hasil"></div>
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
                                @php $image = json_decode($item->products->image); @endphp
                                <div class="card-body">
                                    <figure class="itemside">
                                        <div class="aside"><img
                                                src="{{ asset('assets/uploads/image/'.$image[0]) }}"
                                                class="border img-sm"></div>
                                        <figcaption class="info">
                                            <p>{{ $item->products->name }}</p>
                                            <p>Color : {{$item->color}}</p>
                                            <p>Size : {{$item->size}}</p>
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
                                <dd class="h6" id="shipping"></dd>                                
                            </dl>
                            <dl class="dlist-align">
                                <dt>Total :</dt>
                                <dd class="h5" id="total">@currency($total)</dd>
                            </dl>
                            <hr>
                            <p class="payment-instructions text-muted">
                                You will be redirected to another page to complete the payment.
                            </p>
                            @if($total>1)
                            <button type="submit" class="btn btn-primary btn-block">Place Order</button>
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

@push('ongkir')
<script>
$("#province").on("change", function(e){
    e.preventDefault();
    var option = $('option:selected', this).val();    
    $('#kota option:gt(0)').remove();
    $('#layanan option:gt(0)').remove();
    $('#kurir').val('');

    if(option==='')
    {
        alert('null');    
        $("#kota").prop("disabled", true);
        $("#kurir").prop("disabled", true);
    }
    else
    {        
        $("#kota").prop("disabled", false);
        getKota1(option);
}
});

$("#kurir").on("change", function(e){
    e.preventDefault();    
    var option = $('option:selected', this).val();        
    var des = $("#kota").val();
    var qty = $("#berat").val();

    if(qty==='0' || qty==='')
    {
        alert('null');
    }
    else if(option==='')
    {
        alert('null');        
    }
    else
    {                
        getOrigin(des,qty,option);
    }
});

$("#kota").on("change", function(e){
  e.preventDefault();
  var option = $('option:selected', this).val();    
  $('#layanan option:gt(0)').remove();
  $('#kurir').val('');

  if(option==='')
  {
    alert('null');    
    $("#kurir").prop("disabled", true);
  }
  else
  {        
    $("#kurir").prop("disabled", false);    
  }
});

function getKota1(idpro) {
  var $op = $("#kota"); 
  
  $.getJSON("city/"+idpro, function(data){      
    $.each(data, function(i,field){  
    

       $op.append('<option value="'+field.city_id+'">'+field.type+' '+field.city_name+'</option>'); 

    });
    
  });
 
}


function getOrigin(des,qty,cour) {
  var $op = $("#layanan"); 
  $op.prop("disabled", false);  
  $('#layanan option:gt(0)').remove();
  var i, j, x = "";
      
    var url = "{{ route('tarif', ['des'=>':id', 'wg'=>':wg', 'cour'=>':cour']) }}";
    url = url.replace(':id', des);
    url = url.replace(':wg', qty);
    url = url.replace(':cour', cour);  

  $.getJSON(url, function(data){     
    $.each(data, function(i,field){  

      for(i in field.costs)
      {
           for (j in field.costs[i].cost) {                
                x += '<option value="'+field.costs[i].cost[j].value+'">'+field.costs[i].service+' '+rp(field.costs[i].cost[j].value)+'</option>';
            }
         
      }

      $op.append(x);

    });
  });
 
}


function rp(n)
{
  const format = n.toString().split('').reverse().join('');
  const convert = format.match(/\d{1,3}/g);
  return 'Rp ' + convert.join('.').split('').reverse().join('');
}


$("#layanan").on("change", function(e){
  e.preventDefault();
  var val = $(this).val();
  var total = {{$total}};
  var n = parseInt(val)+parseInt(total);  
  
const format = n.toString().split('').reverse().join('');
const convert = format.match(/\d{1,3}/g);
const r = 'Rp ' + convert.join('.').split('').reverse().join('');
$('#total').html(r);
$('#shipping').html(rp(parseInt(val)));
});
</script>
@endpush()

@endsection




