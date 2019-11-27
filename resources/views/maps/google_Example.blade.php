@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="map" id="map" style="height: 700px;"></div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script src="https://maps.googleapis.com/maps/api/js?libraries=places,geometry&key=AIzaSyCtf_DX0cKXrOWKeimApPyEW_MIzUS-CV8&callback=app.initialize" async defer></script>
<script type="text/javascript">
  'use strict';

var app = {
    // Utility function to make a polygon with some standard properties set
    makePolygon: function(paths, color) {
        return (new google.maps.Polygon({
            paths: paths,
            strokeColor: color,
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: color,
            fillOpacity: 0.35
        }));
    },

    // Run on page load
    initialize: function() {
        var map,polygon,
            polygons = [];

        // Add useful missing method - credit to http://stackoverflow.com/a/13772082/5338708
        google.maps.Polygon.prototype.getBoundingBox = function() {
            var bounds = new google.maps.LatLngBounds();

            this.getPath().forEach(function(element,index) {
                bounds.extend(element)
            });

            return(bounds);
        };

        // Add center calculation method
        google.maps.Polygon.prototype.getApproximateCenter = function() {
            var boundsHeight = 0,
                boundsWidth = 0,
                centerPoint,
                heightIncr = 0,
                maxSearchLoops,
                maxSearchSteps = 10,
                n = 1,
                northWest,
                polygonBounds = this.getBoundingBox(),
                testPos,
                widthIncr = 0;

            // Get polygon Centroid
            centerPoint = polygonBounds.getCenter();

            if (google.maps.geometry.poly.containsLocation(centerPoint, this)) {
                // Nothing to do Centroid is in polygon use it as is
                return centerPoint;
            } else {
                maxSearchLoops = maxSearchSteps / 2;
                
                // Calculate NorthWest point so we can work out height of polygon NW->SE
                northWest = new google.maps.LatLng(polygonBounds.getNorthEast().lat(), polygonBounds.getSouthWest().lng());

                // Work out how tall and wide the bounds are and what our search increment will be
                boundsHeight = google.maps.geometry.spherical.computeDistanceBetween(northWest, polygonBounds.getSouthWest());
                heightIncr = boundsHeight / maxSearchSteps;
                boundsWidth = google.maps.geometry.spherical.computeDistanceBetween(northWest, polygonBounds.getNorthEast());
                widthIncr = boundsWidth / maxSearchSteps;

                // Expand out from Centroid and find a point within polygon at 0, 90, 180, 270 degrees
                for (; n <= maxSearchLoops; n++) {
                    // Test point North of Centroid
                    testPos = google.maps.geometry.spherical.computeOffset(centerPoint, (heightIncr * n), 0);
                    if (google.maps.geometry.poly.containsLocation(testPos, this)) {
                        break;
                    }

                    // Test point East of Centroid
                    testPos = google.maps.geometry.spherical.computeOffset(centerPoint, (widthIncr * n), 90);
                    if (google.maps.geometry.poly.containsLocation(testPos, this)) {
                        break;
                    }

                    // Test point South of Centroid
                    testPos = google.maps.geometry.spherical.computeOffset(centerPoint, (heightIncr * n), 180);
                    if (google.maps.geometry.poly.containsLocation(testPos, this)) {
                        break;
                    }

                    // Test point West of Centroid
                    testPos = google.maps.geometry.spherical.computeOffset(centerPoint, (widthIncr * n), 270);
                    if (google.maps.geometry.poly.containsLocation(testPos, this)) {
                        break;
                    }
                }

                return(testPos);
            }
        };

        // Set up map around Chicago 
        var bounds = new google.maps.LatLngBounds();
        map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 41.83771, lng: -87.85090 },
            zoom: 11,
            scrollwheel:true
        });

        // Draw sample polygons
        polygons.push([
                { lat: 41.78500, lng: -87.75133 },
                { lat: 41.77681, lng: -87.87836 },
                { lat: 41.80138, lng: -87.92780 },
                { lat: 41.77988, lng: -87.95527 },
                { lat: 41.83208, lng: -87.95801 },
                { lat: 41.83208, lng: -87.94154 },
                { lat: 41.81673, lng: -87.88866 },
                { lat: 41.81417, lng: -87.78773 },
                { lat: 41.87607, lng: -87.77056 },
                { lat: 41.78500, lng: -87.75133 }
            ]
        );

        polygons.push([
                { lat: 41.739921, lng: -88.047180 },
                { lat: 41.801887, lng: -88.074646 },
                { lat: 41.804958, lng: -88.099365 }
            ]
        );

        polygons.push([
                { lat: 41.961899, lng: -88.119965 },
                { lat: 41.940962, lng: -87.990189 },
                { lat: 41.884244, lng: -88.022461 },
                { lat: 41.878620, lng: -88.060226 },
                { lat: 41.934833, lng: -88.095932 }
            ]);

        polygons.push([
                { lat: 41.902644, lng: -87.948303 },
                { lat: 41.952198, lng: -87.920837 },
                { lat: 41.933811, lng: -87.878265 },
                { lat: 41.963942, lng: -87.829514 },
                { lat: 41.975173, lng: -87.785568 },
                { lat: 41.900600, lng: -87.837067 },
                { lat: 41.945559, lng: -87.726517 },
                { lat: 41.877598, lng: -87.629700 }
            ]);

        polygons.push([
                { lat: 41.769119, lng: -88.196182 },
                { lat: 41.716349, lng: -88.193436 },
                { lat: 41.762973, lng: -88.117218 }
            ]);

        polygons.push([
                { lat: 41.842311, lng: -87.680511 },
                { lat: 41.852541, lng: -87.621460 },
                { lat: 41.706610, lng: -87.622833 },
                { lat: 41.706610, lng: -88.002548 },
                { lat: 41.746069, lng: -87.968903 },
                { lat: 41.726599, lng: -87.916718 },
                { lat: 41.741971, lng: -87.677078 }
            ]);

        polygons.push([
                { lat: 41.877086, lng: -88.143311 },
                { lat: 41.884244, lng: -88.092499 },
                { lat: 41.836172, lng: -88.088379 },
                { lat: 41.839753, lng: -88.137817 }
            ]);

        

        // Put sample polygons on the map with marker at approximated center
        polygons.forEach(function(poly) {
         polygon = new google.maps.Polygon({
                map: map,
                path: poly,
                strokeColor: 'blue',
                strokeOpacity: 0.7,
                strokeWeight: 1
            });          
        });

        var infowindow =  new google.maps.InfoWindow();
         var latlngbounds = new google.maps.LatLngBounds();
          for (var i = 0; i < polygons.length; i++) {

            for (var j = 0; j < polygons[i].length; j++) { 
              var marker = new google.maps.Marker({
                position: new google.maps.LatLng(polygons[i][j]),
                map: map,
              });
              
              google.maps.event.addListener(marker, 'click', (function (marker,i,j,polygons) {
                
                var html = "Latitude: "+polygons[i][j].lat+"<br>"+"Longitude: "+polygons[i][j].lng;
                  return function () {

                      infowindow.setContent(html);
                      infowindow.open(map, marker);
                  }
              })(marker,i,j,polygons));
              latlngbounds.extend(new google.maps.LatLng(polygons[i][j].lat,polygons[i][j].lng));
            }
          }
         
            map.fitBounds(latlngbounds);
           var rectangle = new google.maps.Rectangle({
              bounds: latlngbounds,
              map: map,
              fillColor: "red",
              fillOpacity: 0.0,
              strokeWeight: 2,
              strokeColor: 'red',
            });

            google.maps.event.addListener(rectangle, 'click', function (event) {
             
               var boundssss = rectangle.getBounds();
                var start = boundssss.getNorthEast();
                var end = boundssss.getSouthWest();
                var latlng = [{lat : start.lat(), lng : start.lng()},
                                {lat : start.lat(), lng : end.lng()},
                                {lat : end.lat(), lng : end.lng()},
                                {lat : end.lat(), lng : start.lng()},
                            ]
                
                var bermudaTriangle = new google.maps.Polygon({
                    paths: latlng
                  });
                isWithinPoly(event,bermudaTriangle);
            });

            google.maps.event.addListener(map,'click',function(event) {
                isWithinPoly(event,polygon);
            });


    }


}
function isWithinPoly(event,polygon){
   var isWithinPolygon = google.maps.geometry.poly.containsLocation(event.latLng, polygon);
    if(isWithinPolygon){
        alert("Inside");
    }else{
        alert("Outside");
    }
}
</script>
@endsection