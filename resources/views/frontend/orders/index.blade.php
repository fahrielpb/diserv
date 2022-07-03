@extends('layouts.front')

@section('title')
My Orders
@endsection

@section('content')
<section class="section-content padding-y bg">
    <div class="container">
        <div class="row">
            <aside class="col-md-3">
                <!--   SIDEBAR   -->
                <ul class="list-group">
                    <a class="list-group-item active" href="{{ url('my-orders') }}"> My order history </a>
                    <a class="list-group-item" href="{{ url('wishlist') }}"> Wishlist </a>
                </ul>
                <br>
                <a class="btn btn-light btn-block" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fa fa-power-off"></i> <span class="text">{{ __('Logout') }}</span> </a>
                <br>
                <!--   SIDEBAR .//END   -->
            </aside>

            <main class="col-md-9">
                <div class="card">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    {{-- <th></th> --}}
                                    <th>Invoice</th>
                                    <th>Order Date</th>
                                    <th>Total Price</th>
                                    <th>Payment Status</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $item)
                                    <tr>
                                        {{-- <td>{{ $item->tracking_no }}</td> --}}
                                      <td>INV{{ date('dmy', strtotime($item->created_at)) }}/DSRV/{{ $item->id }}</td>
                                        <td>{{ date('d F Y', strtotime($item->created_at)) }}
                                        </td>
                                        <td>@currency($item->total_price )</td>
                                        {{-- <td>{{ $item->status == '0' ?'Packed' : 'Completed'}}
                                        </td> --}}
                                        <td> {{ $item->payment_status != '3' ?'Pending' : 'Completed' }}</td>
                                        <td>
                                            @if ($item->status == '0') Packed
                                            @elseif ($item->status == '1') Sent
                                            @else Completed
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('view-order/'.$item->id) }}"
                                                class="btn btn-outline-primary">Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
    </div>
</section>
@endsection