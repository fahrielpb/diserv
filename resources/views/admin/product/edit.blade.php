@extends('layouts.admin')

@section('content')
    <div class="card">
      <div class="card-header">
        <h4>Edit Product</h4>
      </div>

      <div class="card-body">        
        <form action="{{ url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
          @method("PUT")
          @csrf
          <div class="row">
            <div class="col-md-8">
              <div class="input-group input-group-outline mb-4">
              <select class="form-select" name="cate_id">
                <option value""">{{ $products->category->name }}</option>               
              </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="input-group input-group-outline mb-4">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" value="{{ $products->name }}" name="name">
              </div>
            </div>
            <div class="col-md-4">
              <div class="input-group input-group-outline mb-4">
                <label class="form-label">Slug</label>
                <input type="text" class="form-control" value="{{ $products->slug }}" name="slug">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="input-group input-group-outline mb-4">
                <textarea name="small_description" rows="3" class="form-control" placeholder="Small Description">{{ $products->small_description }}</textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="input-group input-group-outline mb-4">
                <textarea name="description" rows="3" class="form-control" placeholder="Description">{{ $products->description }}</textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="input-group input-group-outline mb-4">
                <label class="form-label">Original Price</label>
                <input type="number" class="form-control" value="{{ $products->original_price }}"  name="original_price">
              </div>
            </div>
            <div class="col-md-4">
              <div class="input-group input-group-outline mb-4">
                <label class="form-label">Selling Price</label>
                <input type="number" class="form-control" value="{{ $products->selling_price }}" name="selling_price">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="input-group input-group-outline mb-4">
                <label class="form-label">Tax</label>
                <input type="number" class="form-control" value="{{ $products->tax }}" name="tax">
              </div>
            </div>
            <div class="col-md-4">
              <div class="input-group input-group-outline mb-4">
                <label class="form-label">Quantity</label>
                <input type="number" class="form-control" value="{{ $products->qty }}" name="qty">
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-md-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" {{ $products->status == "1" ? 'checked':'' }} name="status">
              <label class="custom-control-label" for="status">Status</label>
            </div>
            </div>

            <div class="col-md-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" {{ $products->trending == "1" ? 'checked':'' }} name="trending">
              <label class="custom-control-label" for="trending">Trending</label>
            </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-8">
              <div class="input-group input-group-outline mb-4">
                <label class="form-label">Meta Title</label>
                <input type="text" class="form-control" value="{{ $products->meta_title }}" name="meta_title">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="input-group input-group-outline mb-4">
                <textarea name="meta_keywords" rows="3" class="form-control" placeholder="Meta Keywords">{{ $products->meta_keywords }}</textarea>
              </div>
            </div>
            <div class="col-md-4">
              <div class="input-group input-group-outline mb-4">
                <textarea name="meta_description" rows="3" class="form-control" placeholder="Meta Description">{{ $products->meta_description }}</textarea>
              </div>
            </div>
          </div>

    <div class="row">
            <div class="col-md-4">
              <select class="form-select" multiple name="size[]">                
                  @foreach ($size as $item)
                      <option value="{{ $item->name }}">{{ $item->name }}</option>
                  @endforeach
                </select>
            </div>
            <div class="col-md-4">
              <select class="form-select" name="color[]" multiple>                
                  @foreach ($color as $item)
                      <option value="{{ $item->name }}">{{ $item->name }}</option>
                  @endforeach
                </select>
            </div>
          </div>

          <div class="row py-3">
            <div class="col-md-12 mb-3">
              <input type="file" name="filenames[]" class="form-control-file border" style="width:50%" autocomplete="off" multiple>
              </div>                    
            </div>

          {{-- @if ($products->image)          
              <img src="{{ asset('assets/uploads/products/'.$products->image) }}" alt="Product">
          @endif --}}

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