@extends('layouts.admin')

@section('content')
    <div class="card">
      <div class="card-body">
        <h4>Color Page</h4>
        <a href="{{ url('color/create') }}" class="btn btn-dark btn-sm float-end" >Tambah Color</a>
        <div class="card mt-3">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">No.</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">name</th>       
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($color as $item)
                    <tr>
                      <td>
                        <div class="d-flex px-3">
                          <div class="my-auto">
                            <h6 class="mb-0 text-xs">{{ $loop->iteration }}</h6>
                          </div>
                        </div>
                      </td>
                        
                      <td>
                        <p class="text-xs font-weight-normal mb-0">{{ $item->name }}</p>
                      </td>

                      <td>
                        <a href="{{ route('color.edit', ['color'=>$item->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form method="post" action="{{route('color.destroy',$item->id)}}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>                        
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