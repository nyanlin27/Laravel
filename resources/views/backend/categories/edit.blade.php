@extends('backend_master')
@section( 'content')
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-edit"></i> Form Edit Category</h1>
        <p>category edit forms</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item"><a href="#">Category Edit Forms</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
            <a href="{{ route('categories.index') }}" class="btn btn-success float-right">Back</a>

          <h3 class="tile-title">Edit</h3>
          <div class="tile-body">
            <form class="form-horizontal" method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="form-group row">
                <label class="control-label col-md-3">Name</label>
                <div class="col-md-8">
                  <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Enter full name" name="name" value="{{ $category->name }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
              </div>

              <div class="form-group row">
                <label class="control-label col-md-3">Photo</label>
                <div class="col-md-8">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Old</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">New</a>
                    </li>
                  </ul>
                  <div class="tab-content mt-4" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <img src="{{ asset($category->photo) }}" width="150px" alt="Old Photo">
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <input class="@error('photo') is-invalid @enderror" type="file" name="photo">
                            @error('photo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                          </div>
                    </div>
                  </div>

              </div>

          </div>
          <div class="tile-footer">
            <div class="row">
              <div class="col-md-8 col-md-offset-3">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
              </div>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </main>
@endsection
