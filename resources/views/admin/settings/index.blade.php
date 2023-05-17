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
                    <div class="card-wrapper">
                        <!-- form start -->

                        <form action="{{ route('settings.homeUpdate') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card card-primary mb-4">
                                <div class="card-header">
                                    <h3 class="card-title">Home Banner Image</h3>
                                </div>

                                <div class="card-body">

                                    <img src="{{ asset(url($cms->home_banner_img)) }}" alt="Image">

                                    <div class="form-group">
                                        <label>Banner Image upload</label>
                                        <input type="file" class="form-control" name="home_banner_img">

                                        @if ($errors->has('home_banner_img'))
                                            <span class="text-danger">{{ $errors->first('home_banner_img') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>

                            <div class="card card-primary mb-4">
                                <div class="card-header">
                                    <h3 class="card-title">Home Logo</h3>
                                </div>

                                <div class="card-body">

                                    <img src="{{ asset(url($cms->app_logo)) }}" alt="Image">

                                    <div class="form-group">
                                        <label>Logo upload</label>
                                        <input type="file" class="form-control" name="app_logo">

                                        @if ($errors->has('app_logo'))
                                            <span class="text-danger">{{ $errors->first('app_logo') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>

                            <div class="card card-primary mb-4">
                                <div class="card-header">
                                    <h3 class="card-title">Footer Content</h3>
                                </div>

                                <div class="card-body">

                                    <div class="form-group">
                                        <label>Footer about text</label>
                                        <textarea class="form-control" name="footer_about">{{ $cms->footer_about }}</textarea>

                                        @if ($errors->has('footer_about'))
                                            <span class="text-danger">{{ $errors->first('footer_about') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Facebook Url</label>
                                        <input type="text"  class="form-control" name="facebook_url" value="{{$cms->facebook_url}}">

                                        @if ($errors->has('facebook_url'))
                                            <span class="text-danger">{{ $errors->first('facebook_url') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Twitter Url</label>
                                        <input type="text"  class="form-control" name="twitter_url" value="{{$cms->twitter_url}}">

                                        @if ($errors->has('twitter_url'))
                                            <span class="text-danger">{{ $errors->first('twitter_url') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Instagram Url</label>
                                        <input type="text"  class="form-control" name="instagram_url" value="{{$cms->instagram_url}}">

                                        @if ($errors->has('instagram_url'))
                                            <span class="text-danger">{{ $errors->first('instagram_url') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Youtube Url</label>
                                        <input type="text"  class="form-control" name="youtube_url" value="{{$cms->youtube_url}}">

                                        @if ($errors->has('youtube_url'))
                                            <span class="text-danger">{{ $errors->first('youtube_url') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input type="text"  class="form-control" name="company_name" value="{{$cms->company_name}}">

                                        @if ($errors->has('company_name'))
                                            <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Company Url</label>
                                        <input type="text"  class="form-control" name="company_url" value="{{$cms->company_url}}">

                                        @if ($errors->has('company_url'))
                                            <span class="text-danger">{{ $errors->first('company_url') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary bg-primary">Update</button>
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
