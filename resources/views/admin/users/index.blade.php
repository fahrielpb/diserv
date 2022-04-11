@extends('layouts.admin')

@section('content')
    <div class="card">
      <div class="card-body">
        <h4>Registered Users</h4>
        <div class="card mt-3">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">ID</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $item)
                    <tr>
                      <td>
                        <div class="d-flex px-3">
                          <div class="my-auto">
                            <h6 class="mb-0 text-xs">{{ $item->id }}</h6>
                          </div>
                        </div>
                      </td>
                        
                      <td>
                        <p class="text-xs font-weight-normal mb-0">{{ $item->name.' '.$item->lname }} </p>
                      </td>

                      <td>
                        <p class="text-xs font-weight-normal mb-0">{{ $item->email }}</p>
                      </td>

                      <td>
                        <p class="text-xs font-weight-normal mb-0">{{ $item->phone }}</p>
                      </td>

                      <td>
                        <a href="{{ url('view-user/'.$item->id) }}" class="btn btn-primary btn-sm"">Detail</a>
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