@extends('layouts.admin')

@section('title')
Order Detail
@endsection

@section('content')
<section class="section-content padding-y bg">
    <div class="container">
        <div class="row">
            {{-- detail side --}}
            <main class="col-md-12">
                <article class="card">
                    <header class="card-header">
                        <strong class="d-inline-block mr-3">Order Date :
                            {{ date('d F Y', strtotime($orders->created_at)) }}</strong>
                        {{-- <span>Order Date: 16 December 2018</span> --}}
                    </header>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="text-muted">Delivery to</h6>
                                <p><span class="b"> {{ $orders->fname }} {{ $orders->lname }}</span><br>
                                    Phone <span class="b">{{ $orders->phone }} </span><br> Email <span
                                        class="b">{{ $orders->email }}</span> <br>
                                    Location: {{ $orders->address1 }},
                                    {{ $orders->address2 }},
                                    {{ $orders->provinsi }},
                                    {{ $orders->kecamatan }},
                                    {{ $orders->kelurahan }}, <br>
                                    Kode Pos {{ $orders->kode_pos }}
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h6 class="text-muted">Payment</h6>
                                <span class="text-success">
                                    <i class="fab fa-lg fa-cc-visa"></i>
                                    Visa **** 4216
                                </span>
                                <p>Subtotal: <br>
                                    Shipping fee: <br>
                                    <span class="b">Total: @currency($orders->total_price)</span>
                                </p>
                            </div>
                        </div> <!-- row.// -->
                    </div> <!-- card-body .// -->
                    <div class="table">
                        <table class="table table-hover">
                            @foreach($orders->orderitems as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}"
                                            class="img border" width="55px">
                                    </td>
                                    <td>
                                        <p class="title mb-0">{{ $item->products->name }} </p>
                                        <var class="price text-muted">@currency($item->price)</var>
                                    </td>
                                    <td> x {{ $item->qty }} </td>
                                    <td> </td>
                                </tr>

                            @endforeach
                        </table>

                    </div> <!-- table-responsive .end// -->
                </article> <!-- order-group.// -->
                <br>
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-4">
                            <label for="order_status">Order Status</label>
                            <form action="{{ url('update-order/'.$orders->id) }}" method="POST">
                              @csrf
                              @method('PUT')
                            <select class="form-select" name="order_status"
                                class="btn btn-outline-warning dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false"">
                                <option {{ $orders->status == '0'? 'selected':'' }} value="0" class="dropdown-item">Packed</option>
                                <option {{ $orders->status == '1'? 'selected':'' }} value="1" class="dropdown-item">Sent</option>
                                <option {{ $orders->status == '2'? 'selected':'' }} value="2" class="dropdown-item">Completed</option>
                            </select>
                            <button type="submit" class="btn btn-outline-primary mt-3">Update</button>
                          </form>
                        </div>
                    </div>
                </div>

            </main>
            {{-- detail side --}}

        </div>
    </div>
</section>
@endsection