<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])

    {{-- alphine js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- <link rel="icon" type="image/png" href="{{ asset('img/logo-transparan.png') }}"> --}}
    {{-- <link rel="icon" type="image/png" href="{{ asset('img/logo-old.png') }}"> --}}
    {{-- <link rel="shortcut icon" href="{{ asset('img/logo-old.png') }}"> --}}

    {{-- trix code editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    {{-- menghapus bagian upload --}}
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display:none;
        }
    </style>


    <title>{{ $title }}</title>

</head>
<body class="h-full">

    <div class="antialiased bg-gray-50 dark:bg-gray-900">

        {{-- <x-navbar></x-navbar> --}}
        @include('dashboard.components.navbar');


        <!-- Sidebar -->
        @include('dashboard.components.sidebar');
        {{-- <x-sidebar></x-sidebar> --}}

        <main class="md:ml-64 h-auto">

            @yield('container')

            @include('dashboard.components.footer')
        </main>


    </div>

</body>
