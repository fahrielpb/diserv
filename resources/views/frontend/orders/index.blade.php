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
                    <a class="list-group-item active" href="#"> My order history </a>
                    <a class="list-group-item" href="#"> Wishlist </a>
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
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Tracking Number</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $item)
                                    <tr>
                                      <td>INV{{ date('dmy', strtotime($item->created_at)) }}/DSRV/{{ $item->id }}</td>
                                        <td>{{ date('d F Y', strtotime($item->created_at)) }}
                                        </td>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>@currency($item->total_price )</td>
                                        <td>{{ $item->status == '0' ?'Pending' : 'Completed' }}
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