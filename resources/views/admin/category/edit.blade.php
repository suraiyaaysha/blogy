@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">

            <div class="">
                @if ($message = Session::get('success'))

                    <div class="col-md-6 grid-margin">
                        <div class="alert alert-success badge-outline-success">
                            {{  $message  }}
                        </div>
                    </div>
                @endif
            </div>


            {{-- <h1 class="m-0">Create ategories</h1> --}}

            <a href="{{ url('admin/category') }}" class="btn btn-primary mr-2 float-right">Go Category List</a>

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

                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit categories</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/admin/category/{{ $category->id }}/update" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}" placeholder="Category Name">

                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif

                                </div>

                                {{-- <div class="form-group">
                                    <label>Category Slug</label>
                                    <input type="text" class="form-control" name="slug" value="{{ old('slug', $category->slug) }}" placeholder="Category Slug">

                                    @if ($errors->has('slug'))
                                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                                    @endif

                                </div> --}}

                                {{-- <div class="form-group">
                                    <label>Category Label</label>
                                    <input type="text" class="form-control" name="label" value="{{ old('label', $category->label) }}" placeholder="Category Label">

                                    @if ($errors->has('label'))
                                        <span class="text-danger">{{ $errors->first('label') }}</span>
                                    @endif

                                </div> --}}


                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="is_featured" value="{{ $category->is_featured }}" {{ $category->is_featured ? 'checked' : '' }}>
                                        Is Featured
                                    </label>
                                </div>

                                {{-- <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div> --}}
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary bg-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
