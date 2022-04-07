@extends('layouts.admin')

@section('content')
    <div class="card">
      <div class="card-header">
        <h4>Add Category</h4>
      </div>

      <div class="card-body">
        <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-4">
              <div class="input-group input-group-outline mb-4">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name">
              </div>
            </div>
            <div class="col-md-4">
              <div class="input-group input-group-outline mb-4">
                <label class="form-label">Slug</label>
                <input type="text" class="form-control" name="slug">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="input-group input-group-outline mb-4">
                <textarea name="description" rows="3" class="form-control" placeholder="Description"></textarea>
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-md-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="status">
              <label class="custom-control-label" for="status">Status</label>
            </div>
            </div>

            <div class="col-md-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="popular">
              <label class="custom-control-label" for="popular">Popular</label>
            </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-8">
              <div class="input-group input-group-outline mb-4">
                <label class="form-label">Meta Title</label>
                <input type="text" class="form-control" name="meta_title">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="input-group input-group-outline mb-4">
                <textarea name="meta_keywords" rows="3" class="form-control" placeholder="Meta Keywords"></textarea>
              </div>
            </div>
            <div class="col-md-4">
              <div class="input-group input-group-outline mb-4">
                <textarea name="meta_description" rows="3" class="form-control" placeholder="Meta Description"></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <input type="file" name="image" class="form-control">
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