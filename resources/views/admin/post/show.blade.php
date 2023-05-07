@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
            <div class="row">
                @if ($message = Session::get('success'))

                    <div class="col-md-6 grid-margin">
                        <div class="alert alert-success badge-outline-success">
                            {{  $message  }}
                        </div>
                    </div>
                @endif
            </div>
        <div class="row mb-2">
          <div class="col-sm-10">

            <div>
                <h1 class="m-0">Posts</h1>
            <a href="{{ url('admin/posts') }}" class="btn btn-primary mr-2 float-right">Go Post List</a>
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
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">

                            <h1 class="mb-3 h2">{{ $post->title }}</h1>
                            <div class="mb-3">
                                <img src="{{ asset($post->thumbnail) }}" alt="Post thumbnail" class="post-img-h">
                            </div>
                            <p>{!! $post->details !!}</p>

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
