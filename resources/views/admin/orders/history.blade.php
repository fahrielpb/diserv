@extends('layouts.admin')

@section('title')
Orders
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5>Order History
                <a href="{{ 'orders' }}" class="btn btn-warning float-end">New Orders</a>
              </h5>
            </div>
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
                                    <a href="{{ url('admin/view-order/'.$item->id) }}"
                                        class="btn btn-outline-primary">Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection