<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])

    {{-- alphine js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>{{ $title }}</title>

</head>
<body class="h-full">

    <div class="antialiased bg-gray-50 dark:bg-gray-900">

        {{-- <x-navbar></x-navbar> --}}
        @include('dashboard.components.navbar');


        <!-- Sidebar -->
        @include('dashboard.components.sidebar');
        {{-- <x-sidebar></x-sidebar> --}}

        <main class="p-2 md:ml-64 h-auto">

            @yield('container')

        </main>
    </div>

</body>
