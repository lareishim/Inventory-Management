<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'AutoParts Pro - Car Parts Inventory')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header>
        <div class="header-container">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start rounded-4">
                <a class="navbar-brand brand-logo rounded-4" href="{{ route('home') }}">
                    <img src="{{ asset('images/autoparts-pro.png') }}" alt="logo" style="height: 50px; width: auto;" />
                </a>
            </div>
            <nav>
                <ul>
                    @auth
                        @if(auth()->user()->hasRole('admin'))
                            <li><a href="{{ route('admin.dashboard') }}">DASHBOARD</a></li>
                        @endif
                    @endauth

                    <li><a href="{{ url('/') }}">HOME</a></li>
                    <li><a href="{{ route('products') }}">PRODUCTS</a></li>
                    <li><a href="{{ route('contact') }}">CONTACT</a></li>

                    @auth
                        <li>
                            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-link"
                                    style="background: none; border: none; padding: 0; color: inherit; cursor: pointer;">
                                    LOGOUT
                                </button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">LOGIN</a></li>
                    @endauth
                </ul>
            </nav>


        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>© 2025 AutoParts Pro. All rights reserved.</p>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>