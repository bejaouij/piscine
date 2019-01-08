<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('materialize/css/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/MyMain.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @yield('head')
</head>

<body>
    <header>
        <nav>
            <div class="nav-wrapper">
                <img height="100%" display="absolute" src="{{ asset('logoCCI2.png') }}">
                <a href="{{ route('welcome') }}" class="brand-logo center z-depth-1">E-COMMERCE DE L'HERAULT</a>
                @guest
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a class="waves-effect waves-light btn z-depth-3" href="{{ route('register') }}">M'inscire</a></li>
                        <li><a class="waves-effect waves-light btn z-depth-3" href="{{ route('login') }}">Connection</a></li>
                    </ul>
                @else
                    <ul class="right hide-on-med-and-down">
                        @if(is_null(Auth::user()->customer))
                            <li><a class="waves-effect waves-light btn z-depth-3" href="{{ route('my-shops') }}">Mes magasins</a></li>
                        @else
                            <li><a class="waves-effect waves-light btn z-depth-3" href="{{ route('cart-index') }}">Mon panier</a></li>
                        @endif
                        <li><a class="waves-effect waves-light btn z-depth-3" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Se déconnecter</a></li>
                        <li><a class="waves-effect waves-light btn z-depth-3" href="{{ route('profile_form') }}">{{ __('Profile') }}</a></li>
                    </ul>

                    <form style="display: none" id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                    </form>
                @endguest
            </div>
        </nav>

        <div class="row"></div>

        <main>
            @yield('content')
        </main>

        <footer class="page-footer ">
            <div class="container">
                <div class="row">
                    <a href="contact"><div class="col waves-effect waves-light offset-s1 s2 btn-flat"><span>Contact</span></div></a>
                    <a href="about"><div class="col waves-effect waves-light s2 btn-flat"><span>A propos de nous</span></div></a>
                    <a href="shipping-information"><div class="col waves-effect waves-light s2 btn-flat"><span>Information livraison</span></div></a>
                    <a href="payment-information"><div class="col waves-effect waves-light s2 btn-flat"><span>Information paiement</span></div></a>
                    <a href="legal-notice"><div class="col waves-effect waves-light s2 btn-flat"><span>Mentions légales</span></div></a>
                </div>
            </div>
        </footer>
    </header>

    <script src="{{ asset('materialize/js/materialize.min.js') }}"></script>
</body>
</html>
