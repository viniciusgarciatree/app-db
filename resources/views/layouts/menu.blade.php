<nav class="navbar navbar-expand-sm navbar-light shadow-sm mt-0 pt-0 pb-0">
            <div class="container-fluid mt-0">
                <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-hdd-rack-fill"></i> {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                        <!-- Menu -->
                        <li>
                            <a href="#" class="nav-link text-secondary">
                            <i class="bi bi-terminal"></i>
                                Query
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/data-base') }}" class="nav-link text-secondary">
                            <i class="bi bi-hdd-stack-fill"></i>
                                Data Bases
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/user-data-base') }}" class="nav-link text-secondary">
                            <i class="bi bi-hdd-stack-fill"></i>
                                Users Data Base
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-expanded="false">Tools</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown10">
                            <li><a href="{{ url('/tools/compare-data-base') }}" class="dropdown-item btn btn-sm btn btn-outline-dark m-1"><i class="bi bi-arrow-left-right"></i> Compare data bases</a></li>
                            <li><a href="{{ url('/tools/integridade-campo') }}" class="dropdown-item btn btn-sm btn btn-outline-dark m-1"><i class="bi bi-arrow-left-right"></i> Verificar integridade campo</a></li>
                            <li><a href="{{ url('/tools/load-data-base') }}" class="dropdown-item btn btn-sm btn btn-outline-dark m-1"><i class="bi bi-arrow-clockwise"></i> Load data bases</a></li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>