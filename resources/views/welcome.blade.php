    <head>
        <title>Laravel</title>
        
        <link rel="stylesheet" type="text/css" href="{{asset('materialize/css/materialize.min.css')}}">
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
                    <div class="input-field" ">
                      <input id="search" type="search" required>
                      <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                      <i class="material-icons">close</i>
                    </div>
                </form>
                </div>
            </nav>


        </header>
        <main> 
            <div class="row"></div>
            <div class="row"></div>
            <div class="center">
                <a class="waves-effect waves-light btn z-depth-3">Trouve ton commerçant</a>    
            </div>
            

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
        <script src="{{ asset('materialize/js/materialize.min.js') }}">
    	

        </script>        
    </body>

    
</html>
