<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="{{ asset(url('frontend/assets/css/vendor/bootstrap.min.css')) }}">

    <!-- Slick CSS Link -->
    <link rel="stylesheet" href="{{ asset(url('frontend/assets/css/vendor/slick.css')) }}">
    <link rel="stylesheet" href="{{ asset(url('frontend/assets/css/vendor/slick-theme.css')) }}">

    <!-- Icon Library Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- Theme CSS Link -->
    <link rel="stylesheet" href="{{ asset(url('frontend/assets/css/main.css')) }}">

    <title>{{ __('Blogy-Home') }}</title>
</head>

<body>
  <!-- Navbar -->
    @include('frontend.layouts.navbar')
  <!-- /.navbar -->

    @yield('content')

 @include('frontend.layouts.footer')

     <!-- jQuery JS Link -->
    <script src="{{ asset(url('frontend/assets/js/jquery-3.6.0.min.js')) }}"></script>

    <!-- Bootstrap JS Link -->
    <script src="{{ asset(url('frontend/assets/js/bootstrap.bundle.min.js')) }}"></script>

    <!-- Menu JS Link -->
    <script src="{{ asset(url('frontend/assets/js/menu.js')) }}"></script>

    <!-- Slick JS Link -->
    <script src="{{ asset(url('frontend/assets/js/slick.min.js')) }}"></script>

    <!-- Custom JS Link -->
    <script src="{{ asset(url('frontend/assets/js/main.js')) }}"></script>
</body>

</html>
