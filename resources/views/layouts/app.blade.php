<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Changa&family=Norican&family=Tajawal:wght@200;500&display=swap"
        rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="" {{ asset('css/custom.css') }}>
    <style>
        *:not(i) {
            font-family: 'Tajawal', sans-seri
        }

    </style>
    <!--Icons-->
    <link rel="stylesheet" href="{{ asset('css/icons/fontawesome-free-6.1.1-web/css/all.css') }}">
</head>

<body>
    <div class="app">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark d-flex">
            <div class="container" dir="rtl">
                @include('partials.navbar')
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row g-3 text-right">
                    @yield('content')

                </div>
            </div>
        </main>

        <footer class="container-fluid text-center bg-dark p-3" style="height: 150px">
            <img src="{{ asset('imags/logos/laravel-cms-logo.png') }}" alt="" class="rounded"
                style="height: 100%">
        </footer>

    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('script')
</body>

</html>
