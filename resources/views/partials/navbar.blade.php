<a href="/" class="navbar-brand">
    <h1 class="m-0 p-0 h3">{{ config('app.name') }}</h1>
</a>
<button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mynavbar">
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
                    <li><a href="#" class="dropdown-item">{{ __('site.Dashboard') }}</a></li>
                    <li><a href="#" class="dropdown-item">{{ __('site.Profile') }}</a></li>
                    <li><a href="#" class="dropdown-item">{{ __('site.Settings') }}</a></li>
                </ul>
            </div>
        </li>
    </ul>
    <form action="POST" action="{{ route('search') }}">
        <div class="input-group">
            <button class="fa-solid fa-magnifying-glass input-group-text fs-5 rounded-0  rounded-end"
                type="submit"></button>
            <input type="text" class="form-control rounded-0 rounded-start">
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
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                        {{ __('site.Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                        class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</div>
