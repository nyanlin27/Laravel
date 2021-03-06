@extends('backend_master')
@section( 'content')
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Category List</h1>
        <p>Table to display analytical data effectively</p>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
      </ul>
    </div>
    <div class="row">

      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <a href="{{ route('categories.create') }}" class="btn btn-success float-right my-2">Add New</a>
            <div class="table-responsive">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead class="table-dark">
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                    @php $i = 1 @endphp
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $category->name }}</td>
                        <td><img src="{{ $category->photo }}" width="150px" alt="category image"></td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            {{-- <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are You Sure Want to Delete')" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <input type="submit" name="btnsubmit" class="btn btn-danger btn-sm" value="Delete">
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
    </div>
  </main>
<!-- Data table plugin-->

@endsection
@section('script')
<script type="text/javascript" src="{{ asset('backend_asset/js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend_asset/js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
@endsection
