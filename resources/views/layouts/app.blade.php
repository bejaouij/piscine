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
</head>

<body>
    <header>
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo center z-depth-1">E-COMMERCE DE L'HERAULT</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a class="waves-effect waves-light btn z-depth-3">M'inscire</a></li>
                    <li><a class="waves-effect waves-light btn z-depth-3">Connection</a></li>
                </ul>
            </div>
        </nav>

        <div class="row"></div>

        <nav class="styleSearchBar z-depth-1">
            <div class="nav-wrapper z-depth-3">
                <form>
                    <div class="input-field">
                        <input id="search" type="search" required>
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer class="page-footer ">
            <div class="container">
                <div class="row">
                    <div class="col waves-effect waves-light s3 btn-flat">Contact</div>
                    <div class="col waves-effect waves-light s3 btn-flat">A propos de nous</div>
                    <div class="col waves-effect waves-light s3 btn-flat">Information livraison</div>
                    <div class="col waves-effect waves-light s3 btn-flat">Information paiement</div>
                </div>
            </div>
        </footer>
    </header>

    <script src="{{ asset('materialize/js/materialize.min.js') }}"></script>
</body>
</html>
