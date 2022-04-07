@extends('layouts.admin')

@section('content')
    <div class="card">
      <div class="card-body">
        <h4>Category Page</h4>
        <div class="card mt-3">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">ID</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">description</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">image</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($category as $item)
                    <tr>
                      <td>
                        <div class="d-flex px-3">
                          <div class="my-auto">
                            <h6 class="mb-0 text-xs">{{ $item->id }}</h6>
                          </div>
                        </div>
                      </td>
                        
                      <td>
                        <p class="text-xs font-weight-normal mb-0">{{ $item->name }}</p>
                      </td>

                      <td>
                        <p class="text-xs font-weight-normal mb-0">{{ $item->description }}</p>
                      </td>

                      <td>
                       <img src="{{ asset('assets/uploads/category/'.$item->image) }}" class="cate-image" alt="Image Here">
                      </td>

                      <td>
                        <a href="{{ url('edit-category/'.$item->id) }}" class="btn btn-warning btn-sm"">Edit</a>
                        <a href="{{ url('delete-category/'.$item->id) }}" class="btn btn-danger btn-sm"">Delete</a>
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