<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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


    {{-- Footer newsletter --}}
    <script>
        document.getElementById('subscribeForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const form = event.target;
            const url = form.action;
            const formData = new FormData(form);

            fetch(url, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.hasOwnProperty('errors')) {
                    // Display validation errors using SweetAlert2
                    const errors = Object.values(data.errors).join('<br>');
                    Swal.fire({
                        icon: 'error',
                        // title: 'Subscriptions Failed!',
                        title: errors,
                        // html: errors,
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else if (data.hasOwnProperty('message')) {
                    // Display success message using SweetAlert2
                    Swal.fire({
                        icon: 'success',
                        // title: 'Congratulations!',
                        title: data.message,
                        // text: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        // Optionally, you can redirect the user to another page after successful subscription
                        // window.location.href = '/thank-you';
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
    {{-- Footer newsletter --}}

    @yield('scripts')
</body>

</html>
