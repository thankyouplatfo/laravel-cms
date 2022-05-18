<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Changa&family=Norican&family=Tajawal:wght@200;500&display=swap"
        rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="" {{ asset('css/custom.css') }}>
    <link rel="stylesheet" href="{{ asset('css/w3css/4/w3.css') }}">
    <style>
        *:not(i) {
            font-family: 'Tajawal', sans-seri
        }

    </style>
    <!--Icons-->
    <link rel="stylesheet" href="{{ asset('css/icons/fontawesome-free-6.1.1-web/css/all.css') }}">
</head>

<body class="text-right">
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top navbar-dark bg-dark" id="mainNav"
        style="z-index: 2">
        <div class="container">
            @include('partials.navbar')
        </div>
    </nav>
    <ul class="navbar-nav navbar-dark bg-dark w3-col m2 l2 w3-right w3-large w3-hide-small"
        style="height: 93.55vh;margin-top: 59px;" id="exampleAccordion">
        <li class="nav-item mt-5" data-bs-toggle="tooltip" title="Dashboard">
            <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="w3-text-white">الإحصائيات</span>
            </a>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip">
            <a href="{{ route('categories.index') }}" class="nav-link">
                <i class="fa-solid fa-sitemap"></i>
                <span class="w3-text-white">التصنيفات</span>
            </a>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip">
            <a href="{{ route('users.index') }}" class="nav-link">
                <i class="fa fa-fw fa-user"></i>
                <span class="w3-text-white">المستخدمين</span>
            </a>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" title="المنشورات">
            <a class="nav-link nav-link-collapse collapsed"
                href="{{ route('posts.index') }}" data-bs-parent="#exampleAccordion">
                <i class="fa-solid fa-note-sticky"></i>
                <span class="w3-text-white">المنشورات</span>
            </a>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" title="الأدوار">
            <a class="nav-link nav-link-collapse collapsed" href="#collapseRoles"
                data-bs-parent="#exampleAccordion">
                <i class="fa fa-fw fa-wrench"></i>
                <span class="w3-text-white">الأدوار</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseRoles">
                <li>
                    <a href="#" class="w3-text-white">الأدوار</a>
                </li>
                <li>
                    <a href="#" class="w3-text-white">إضافة دور</a>
                </li>
            </ul>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip">
            <a href="{{ route('permissions') }}" class="nav-link">
                <i class="fa-solid fa-pen-ruler"></i>
                <span class="w3-text-white"> الصلاحيات</span>
            </a>
        </li>
        <li class="nav-item" data-bs-toggle="tooltip" title="">
            <a class="nav-link nav-link-collapse collapsed"
                href="{{ route('page.index') }}" data-bs-parent="#exampleAccordion">
                <i class="fa fa-fw fa-file"></i>
                <span class="w3-text-white">الصفحات</span>
            </a>
        </li>
    </ul>
    <div class="w3-col m10 l10 s12  w3-light-grey w3-padding "
        style="height: 93.55vh;margin-top: 59px;overflow-y:auto!important">
        <div class="w3-container py-3 display-6">
            <ul class="d-inline w3-ul ">
                <li class="d-inline border-0"><a href="{{ route('dashboard') }}" class="w3-text-black">لوحة
                        التحكم</a></li>
                <li class="d-inline border-0">
                    <i class=" fa-solid fa-arrow-left-long m-0 p-0"></i>
                    @yield('breadcrumb')
                </li>
            </ul>
        </div>
        <div class="w3-container">
            @yield('content')
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('script')
</body>

</html>
