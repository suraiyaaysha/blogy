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

            <a href="{{ url('admin/category') }}" class="btn btn-primary mr-2 float-right">{{ __('Go Category List') }}</a>

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
                            <h3 class="card-title">{{ __('Create categories') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('admin/category') }}" method="POST">
                        {{-- <form action="{{ '/admin/category/store' }}" method="POST"> --}}
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ __('Category Name') }}</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Category Name">

                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif

                                </div>

                                <div class="form-group mb-0">
                                    <label>
                                        <input type="checkbox" name="is_featured" value="0">
                                        <span class="check-box-tex ml-2 d-inline-block">{{ ('Is Featured') }}</span>
                                    </label>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary bg-primary">{{ __('Submit') }}</button>
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
