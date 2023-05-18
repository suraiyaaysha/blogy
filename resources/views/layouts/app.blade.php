<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Bootstrap CSS Link -->
        <link rel="stylesheet" href="{{ asset(url('frontend/assets/css/vendor/bootstrap.min.css')) }}">
        <!-- Theme CSS Link -->
        {{-- <link rel="stylesheet" href="{{ asset(url('frontend/assets/css/main.css')) }}"> --}}

    </head>
    {{-- <body class="font-sans antialiased"> --}}
    <body class="">
        {{-- <div class="min-h-screen bg-gray-100"> --}}
        <div class="">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                {{-- <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header> --}}
                <header class="">
                    <div class="">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
