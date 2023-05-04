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

            <a href="{{ url('admin/posts') }}" class="btn btn-primary mr-2 float-right">Go Post List</a>

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
                            <h3 class="card-title">Create Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('admin/posts/'.$post->id) }}" method="POST" enctype="multipart/form-data">
                        {{-- <form action="{{ '/admin/category/store' }}" method="POST"> --}}
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Select Category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"  {{ $post->category_id == $category->id ? 'selected':''}}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Post Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}" placeholder="Post Title">

                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif

                                </div>

                                <div class="form-group">
                                    <label>Upload thumbnail</label>
                                    <input type="file" class="form-control" name="thumbnail" placeholder="Post thumbnail">

                                    @if ($errors->has('thumbnail'))
                                        <span class="text-danger">{{ $errors->first('thumbnail') }}</span>
                                    @endif

                                </div>

                                <div class="form-group">
                                    <label>Details</label>
                                    <textarea class="form-control" name="details" id="" cols="20" rows="5" placeholder="Post details">{{ old('details', $post->details) }}</textarea>

                                    @if ($errors->has('details'))
                                        <span class="text-danger">{{ $errors->first('details') }}</span>
                                    @endif

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
