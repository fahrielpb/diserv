@extends('layouts.admin')

@section('content')
    <div class="card">
      <div class="card-body">
        <h4>Products Page</h4>
        <div class="card mt-3">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">ID</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">category</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Selling Price</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">image</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $item)
                    <tr>
                      <td>
                        <div class="d-flex px-3">
                          <div class="my-auto">
                            <h6 class="mb-0 text-xs">{{ $item->id }}</h6>
                          </div>
                        </div>
                      </td>
                        
                      <td>
                        <p class="text-xs font-weight-normal mb-0">{{ $item->category->name }}</p>
                      </td>

                      <td>
                        <p class="text-xs font-weight-normal mb-0">{{ $item->name }}</p>
                      </td>

                      <td>
                        <p class="text-xs font-weight-normal mb-0">{{ $item->selling_price }}</p>
                      </td>

                      <td>
                        @php
                        $image = json_decode($item->image);                        
                        @endphp
                       <img src="{{ asset('assets/uploads/image/'.$image[0]) }}" class="cate-image" alt="Image Here">
                      </td>

                      <td>
                        <a href="{{ url('edit-product/'.$item->id) }}" class="btn btn-warning btn-sm"">Edit</a>
                        <a href="{{ url('delete-product/'.$item->id) }}" class="btn btn-danger btn-sm"">Delete</a>
                      </td>

                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          </div>
      </div>
    </div>
@endsection