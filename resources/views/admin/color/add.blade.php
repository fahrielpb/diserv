@extends('layouts.admin')

@section('content')
    <div class="card">
      <div class="card-header">
        <h4>Add color</h4>
      </div>

      <div class="card-body">
        <form action="{{ route('color.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-4">
              <div class="input-group input-group-outline mb-4">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
              </div>
            </div>       

          <div class="row">
            <div class="col-md-6">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
          </div>

        </form>
      </div>
    </div>
@endsection