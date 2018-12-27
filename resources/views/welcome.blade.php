    <head>
        <title>Laravel</title>
        
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

            

            <ul id="slide-out" class="sidenav sidenav-fixed">
                <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
                <li><a href="#!">Second Link</a></li>
                <li><div class="divider"></div></li>
                <li><a class="subheader">Subheader</a></li>
                <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
            </ul>
            


            <div class="row"></div>
            <div class="row"></div>
            <div class="center">
                <a class="waves-effect waves-light btn z-depth-3">Trouve ton commerçant</a>    
            </div>
            
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <script> 
                $(document).ready(function(){
                    $('.sidenav').sidenav();
                });
        
                $(document).ready(function(){
                    $('.carousel').carousel();
                });
            </script>

            <div class="carousel">
                <a class="carousel-item" href="#one!"><img src=chaussure.jpg></a>
                <a class="carousel-item" href="#two!"><img src=pain.jpg></a>
                <a class="carousel-item" href="#three!"><img src=pain.jpg></a>
                <a class="carousel-item" href="#four!"><img src=pain.jpg></a>
                <a class="carousel-item" href="#five!"><img src=pain.jpg></a>
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
