<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Laravel</title>

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
                <a class="waves-effect waves-light btn modal-trigger z-depth-3" href="#shop-map-container">Trouve ton commerçant</a>
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

        <div id="shop-map-container" class="modal">
            <div class="modal-content">
                <div>
                    <h4>Commerces à proximité</h4>
                    <hr>
                </div>

                <div id="shop-maps"></div>
            </div>

            <div class="modal-footer">
                <a href="#" class=" modal-action modal-close waves-effect waves-green btn-flat">Fermer</a>
            </div>
        </div>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

        <script src="{{ asset('materialize/js/materialize.min.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('.modal-trigger').leanModal();
            });
        </script>

        <script type="text/javascript">
            // Note: This example requires that you consent to location sharing when
            // prompted by your browser. If you see the error "The Geolocation service
            // failed.", it means you probably did not give permission for the browser to
            // locate you.
            let shopMaps, infoWindow;

            function initMap() {
                shopMaps = new google.maps.Map(document.getElementById('shop-maps'), {
                    center: {lat: 43.579560, lng: 3.457965},
                    zoom: 8
                });

                infoWindow = new google.maps.InfoWindow;

                // Try HTML5 geolocation.
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };

                        shopMaps.setCenter(pos);
                    }, function() {
                        handleLocationError(true, infoWindow, shopMaps.getCenter());
                    });
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, shopMaps.getCenter());
                }

                var infowindow = new google.maps.InfoWindow({
                    content: null
                });

                var markers = [];
                var shopsData = [];
                @foreach($shops as $shop)
                    markers.push(new google.maps.Marker({
                        position: {lat: parseInt("{{ $shop->shop_position_x }}"), lng: parseInt("{{ $shop->shop_position_y }}")},
                        map: shopMaps
                    }));

                    shopsData.push({
                        "siret": "{{ $shop->shop_siret }}",
                        "name": "{{ $shop->shop_name }}",
                        "phone": "{{ $shop->shop_phone }}",
                        "address": {
                            "street_number": "{{ $shop->address->address_street_number }}",
                            "street": "{{ $shop->address->address_street }}",
                            "city": "{{ $shop->address->address_city }}",
                            "postal_code": "{{ $shop->address->address_postal_code }}"
                        }
                    });
                @endforeach

                markers.forEach(function(element, index) {
                    element.addListener("mouseover", function() {
                        infowindow.setContent("<div class='content'>"+
                            "<h1>" + shopsData[index].name + "</h1>"+
                            "<hr>"+
                            "<p>" + shopsData[index].address.street_number + " " + shopsData[index].address.street + "<br>"+
                            shopsData[index].address.city + " - " + shopsData[index].address.postal_code + "<br>"+
                            shopsData[index].phone + "</p>"+
                            "<p><a href='https://www.google.fr/maps/@43.585280,3.986372' target='_blank'>Ouvrir depuis Google Maps</a></p>"+
                            "</div>");
                        infoWindow.setPosition(element.getPosition());
                        infowindow.open(shopMaps, element);
                    });

                    element.addListener("click", function() {
                       console.log('test');
                    });
                });
            }

            function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                infoWindow.setPosition(pos);
                infoWindow.setContent(browserHasGeolocation ?
                    'Error: The Geolocation service failed.' :
                    'Error: Your browser doesn\'t support geolocation.');

                infoWindow.open(shopMaps);
            }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEEAliyW8Ell7OV3gC9qtKDoK7_LbDS5k&callback=initMap" async defer>
        </script>
    </body>

</html>
