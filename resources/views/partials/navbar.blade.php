<a href="/" class="navbar-brand">
    <h1 class="m-0 p-0 h3">{{ config('app.name') }}</h1>
</a>
<button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mynavbar">
    <span class="navbar-toggler-icon"></span>
</button>
<button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#exampleAccordion">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="mynavbar">
    <ul class=" navbar-nav me-auto">
        <li class="nav-item">
            <a href="/" class="btn nav-link fs-5"><i class="fa-solid fa-house-user"></i> {{ __('site.Home') }} </a>
        </li>
        <li class="nav-item">
            <div class="dropdown">
                <button type="button" class="btn nav-link fs-5" data-bs-toggle="dropdown"><i
                        class="fa-solid fa-file"></i> {{ __('site.Pages') }} <i
                        class="fa-solid fa-caret-down mr-5"></i></button>
                <ul class="dropdown-menu">
                    @foreach ($pages as $page)
                        <li>
                            <a href="{{ route('page.show', $page->slug) }}"
                                class="dropdown-item">{{ $page->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </li>
    </ul>
    <form method="POST" action="{{ route('search') }}">
        @csrf
        <div class="input-group">

            <input type="text" class="form-control rounded-0 rounded-end" name="keyword" placeholder="بحث">
            <button class="fa-solid fa-magnifying-glass input-group-text fs-5 rounded-0  rounded-start"
                type="submit"></button>
        </div>
    </form>
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav me-auto">
        <!-- Authentication Links -->
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('site.Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('site.Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" style="text-align: right" href="/{{ Auth::user()->id }}">
                        <i class="fa-solid fa-gauge"></i> {{ __('site.Dashboard') }}
                    </a>
                    <a class="dropdown-item" style="text-align: right" href="/{{ Auth::user()->id }}">
                        <i class="fa-solid fa-user"></i> {{ __('site.Profile') }}
                    </a>
                    <a class="dropdown-item" style="text-align: right" href="{{ route('settings') }}">
                        <i class="fa-solid fa-gear"></i> {{ __('site.Settings') }}
                    </a>
                    <hr>
                    <a class="dropdown-item" style="text-align: right" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i> {{ __('site.Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</div>
