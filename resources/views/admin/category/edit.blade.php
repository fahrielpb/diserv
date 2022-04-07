@extends('layouts.admin')

@section('content')
    <div class="card">
      <div class="card-header">
        <h4>Edit Category</h4>
      </div>

      <div class="card-body">
        <form action="{{ url('update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-4">
              <div class="input-group input-group-outline mb-4">
                  <label class="form-label">Name</label>
                  <input type="text" value="{{ $category->name }}" class="form-control" name="name">
              </div>
            </div>
            <div class="col-md-4">
              <div class="input-group input-group-outline mb-4">
                <label class="form-label" for="slug">Slug</label>
                <input type="text" value="{{ $category->slug }}" class="form-control" name="slug">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="input-group input-group-outline mb-4">
                <textarea name="description" rows="3" class="form-control" placeholder="Description">{{ $category->description }}</textarea>
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-md-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" {{ $category->status == "1" ? 'checked':'' }} name="status" id="status">
              <label class="custom-control-label" for="status">Status</label>
            </div>
            </div>

            <div class="col-md-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" {{ $category->popular == "1" ? 'checked':'' }} name="popular">
              <label class="custom-control-label" for="popular">Popular</label>
            </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-8">
              <div class="input-group input-group-outline mb-4">
                <label class="form-label">Meta Title</label>
                <input type="text" class="form-control" value="{{ $category->meta_title }}" name="meta_title">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="input-group input-group-outline mb-4">
                <textarea name="meta_keywords" rows="3" class="form-control" placeholder="Meta Keywords">{{ $category->meta_keywords }}</textarea>
              </div>
            </div>
            <div class="col-md-4">
              <div class="input-group input-group-outline mb-4">
                <textarea name="meta_description" rows="3" class="form-control" placeholder="Meta Description">{{ $category->meta_descrip }}</textarea>
              </div>
            </div>
          </div>

          @if ($category->image)
              <img src="{{ asset('assets/uploads/category/'.$category->image) }}" alt="Category Product">
          @endif

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