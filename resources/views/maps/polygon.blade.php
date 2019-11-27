@extends('layouts.app')

@section('content')
<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <div id="map" ></div>
    <script>
      var map;
    
      function initMap() {
        var mapProp = {
          center: new google.maps.LatLng(22.96977343, 76.03157043),
          zoom: 10,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById("map"), mapProp);
        for (var i = 0; i < editedPolygons.length; i++) {
          var bounds = new google.maps.LatLngBounds();

          var poly = new google.maps.Polygon({
            fillColor: editedPolygons[i][1].color,
            strokeWeight: 2,
            path: editedPolygons[i][0],
            map: map
          });

          for (var pathidx = 0; pathidx < poly.getPath().getLength(); pathidx++) {
            bounds.extend(poly.getPath().getAt(pathidx));
          }
          // store the computed center as a property of the polygon for easy access
          poly.center = bounds.getCenter();
          var infowindow = new google.maps.InfoWindow();
          var title = editedPolygons[i][1].title;
          // use function closure to associate the infowindow with the polygon
          poly.addListener('click', (function(content) {
            return function() {
              // set the content
              infowindow.setContent(content);
              // set the position
              infowindow.setPosition(this.center);
              // open it
              infowindow.open(map);
            }
          })(editedPolygons[i][1].title));
        }
      }

      var editedPolygons = [
        [
          [{
            "lat": 22.71986323,
            "lng": 75.86291313
          }, {
            "lat": 22.87617519,
            "lng": 75.75983047
          }, {
            "lat": 22.91665804,
            "lng": 76.0521698
          }], {
            "color": "green",
            "title": "Indore Region"
          }
        ],
        [
          [{
            "lat": 23.20916506, 
            "lng":  75.7624054
          }, {
            "lat": 23.17634503, 
            "lng":  75.76480865
          }, {
            "lat": 23.2044319, 
            "lng": 75.818367
          }], {
            "color": "red",
            "title": "Ujjain Region"
          }
        ]
      ];
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtf_DX0cKXrOWKeimApPyEW_MIzUS-CV8&callback=initMap"
    async defer></script>
@endsection