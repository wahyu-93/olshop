<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar is-info" role="navigation">
            <div class="navbar-brand">
                <div class="navbar-item">
                    Olshop
                </div>

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div class="navbar-menu" id="navMenu">
                <div class="navbar-end">
                    @guest
                        <div class="navbar-item">
                            <div class="buttons are-small">
                                <a href="{{ route('login') }}" class="button is-info is-light">Login</a>
                                <a href="{{ route('register') }}" class="button is-info is-light">Register</a>
                            </div>
                        </div>
                    @endguest
                    
                    @auth
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                {{ auth()->user()->name }}
                            </a>

                            <div class="navbar-dropdown">
                                <a href="" class="navbar-item">Profile</a>
                                <a 
                                    href="{{ route('logout') }}" 
                                    class="navbar-item"
                                    onclick="event.preventDefault();
                                             document.getElementById('form-logout').submit();
                                            ">
                                        Logout
                                </a>

                                <form action="{{ route('logout') }}" id="form-logout" method="POST" style="display: none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>    
            </div>


        </nav>
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Get all "navbar-burger" elements
            const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

            // Check if there are any navbar burgers
            if ($navbarBurgers.length > 0) {

                // Add a click event on each of them
                $navbarBurgers.forEach( el => {
                    el.addEventListener('click', () => {

                    // Get the target from the "data-target" attribute
                    const target = el.dataset.target;
                    const $target = document.getElementById(target);

                    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                    el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');

                    });
                });
            }
        });
    </script>
</body>
</html>
