@extends('backend_master')
@section( 'content')
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-edit"></i> Form Item</h1>
        <p>Item forms</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item"><a href="#">Item Forms</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
            <a href="{{ route('items.index') }}" class="btn btn-success float-right">Back</a>

          <h3 class="tile-title">Register</h3>
          <div class="tile-body">
            <form class="form-horizontal" method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
                @csrf
              <div class="form-group row">
                <label class="control-label col-md-3">Code No</label>
                <div class="col-md-8">
                  <input class="form-control @error('codeno') is-invalid @enderror" type="text" placeholder="Enter codeno" name="codeno" value="{{ old('codeno') }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Name</label>
                <div class="col-md-8">
                  <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Enter full name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Price</label>
                <div class="col-md-8">
                  <input class="form-control @error('price') is-invalid @enderror" type="text" placeholder="Enter  price" name="price" value="{{ old('price') }}">
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Discount</label>
                <div class="col-md-8">
                  <input class="form-control @error('discount') is-invalid @enderror" type="text" placeholder="Enter  discount" name="discount" value="{{ old('discount') }}">
                    @error('discount')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3" id="brandId">Brand Name</label>
                <div class="col-md-8">
                    <select id="brandId" class="form-control" name="brand_id">
                        @foreach($brands as $brands)
                            <option value="{{ $brands->id }}">{{ $brands->name }}</option>
                        @endforeach
                      </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3" id="brandId">Subcategory Name</label>
                <div class="col-md-8">
                    <select id="subcategoryId" class="form-control" name="subcategory_id">
                        @foreach($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                      </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Description</label>
                <div class="col-md-8">
                  <textarea name="description" placeholder="Description" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label class="control-label col-md-3">Photo</label>
                <div class="col-md-8">
                  <input class="@error('photo') is-invalid @enderror" type="file" name="photo">
                  @error('photo')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                </div>
              </div>

          </div>
          <div class="tile-footer">
            <div class="row">
              <div class="col-md-8 col-md-offset-3">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
              </div>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </main>
@endsection
