@extends('layouts.app')
@section('content')
    <ul id="slide-out" class="sidenav sidenav-fixed">
        <li><a href="{{ route('product-category', ['id' => 4]) }}">Vêtements</a></li>
        <li><a href="{{ route('product-category', ['id' => 5]) }}">Informatique</a></li>
        <li><a href="{{ route('product-category', ['id' => 6]) }}">High-Tech</a></li>
        <li><a href="{{ route('product-category', ['id' => 14]) }}">Sport</a></li>
        <li><a href="{{ route('product-category', ['id' => 8]) }}">Bricolage</a></li>
    </ul>

    <div class="row">
        <nav class="styleSearchBar z-depth-1">
            <div class="nav-wrapper z-depth-3">
                <form method="POST" action="{{ route('product-search-keywords') }}">
                    @csrf
                    <div class="input-field">
                        <input name="keywords" id="search" type="search" placeholder="Ordinateur, chaussures, fruits..." required>
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
            </div>
        </nav>
    </div>
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
        @foreach($bestSellers as $bestSeller)
            <a class="carousel-item" href="{{ route('product', ['id' => $bestSeller->product_id]) }}"><img alt="carousel product image" src="{{ asset('media') . '/' . $bestSeller->photo_path->photo_relative_path }}"></a>
        @endforeach
    </div>

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

                var $shopForm = document.createElement("form");
                $shopForm.id = "shop-form-" + index;
                $shopForm.method = "GET";
                $shopForm.action = "shop/" + shopsData[index].siret;

                document.querySelector("body").append($shopForm);

                element.addListener("click", function() {
                    document.getElementById("shop-form-" + index).submit();
                });


                // $(element).wrap("<div id='test'></div>")
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
@endsection