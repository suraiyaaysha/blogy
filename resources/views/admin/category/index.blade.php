@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
            <div class="row">
                {{-- @if ($message = Session::get('success'))

                    <div class="col-md-6 grid-margin">
                        <div class="alert alert-success badge-outline-success">
                            {{  $message  }}
                        </div>
                    </div>
                @endif --}}

                @if (session('message'))

                    <div class="col-md-6 grid-margin">
                        <div class="alert alert-success badge-outline-success">
                            {{  session('message')  }}
                        </div>
                    </div>
                @endif
            </div>
        <div class="row mb-2">
          <div class="col-sm-8">

            <div>
                <h1 class="m-0">Categories</h1>
                <a href="{{ url('admin/category/create') }}" class="btn btn-primary mr-2 float-right">Create New</a>
            </div>

          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Category name</th>
                                        <th>Category Slug</th>
                                        <th>Category Label</th>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>{{ $category->label }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="/admin/category/{{ $category->id }}/edit" class="btn btn-primary mr-2">Edit</a>

                                                    <form action="/admin/category/{{ $category->id }}/delete" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                        <button type="submit" class="btn btn-danger bg-danger" onclick="return confirm('Are you sure to delete Category?')">Delete</button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="pagination-box float-right mt-3 mb-4 mr-4">
                                {{ $categories->links() }}
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
