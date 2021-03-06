<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Piscine</title>
    <style>
        #map {
            height: 300px;
            width: 500px;
        }
    </style>
    <script src="{{ asset('leaflet/leaflet.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}">
</head>
<body>

<div id="map">

</div>
<div id="shop">

</div>

<script>

    var map = L.map('map', {
    }).setView([51.505, -0.09], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 17}).addTo(map);

    var layer;

    fetch("{{ route('map') }}", {

        method: 'POST'

    }).then(function (response) {

        // Récupération de la réponse en JSON
        return response.json();

    }).then(function (json) {

        layer = L.geoJSON(json, {
            onEachFeature : function (feature, layer) {
                L.DomEvent.on(layer, 'click', function() {
                    fetch("{{ route('shop', ['id' => ""]) }}/" + feature.properties.siret).then(function (response) {
                        return response.text();
                    }).then(function (text) {
                        document.querySelector('#shop').innerHTML = text;
                    })
                });
                layer.bindTooltip(feature.properties.name);
            }
        });
        layer.addTo(map);
        map.fitBounds(layer.getBounds());

    });

</script>

</body>
</html>
