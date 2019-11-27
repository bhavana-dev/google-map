@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="map_canvas " id="map_canvas " style="height: 700px;"></div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script src="https://maps.googleapis.com/maps/api/js?libraries=places,geometry&key=AIzaSyCtf_DX0cKXrOWKeimApPyEW_MIzUS-CV8&callback=initMap" async defer></script>

<script>
//intializtion of map for autocomplete suggation
function initMap() {
    map = new google.maps.Map(document.getElementById('map_canvas '), {
        zoom: 9,
        // center: new google.maps.LatLng(22.71986323 ,75.86291313),
        // center: {lat: 24.886, lng: -70.268},
        center: new google.maps.LatLng(33.5190755, -111.9253654),
        scrollwheel:true
    });
    
    /*var flightPlanCoordinates = [
        {lat: 22.71986323, lng: 75.86291313},
        {lat:22.87617519, lng:  75.75983047},
        {lat: 23.2975301, lng: 75.62617226}
    ];*/

    /*var flightPlanCoordinates = [
        {lat: 25.774, lng: -80.190},
        {lat: 18.466, lng: -66.118},
        {lat: 32.321, lng: -64.757},
        {lat: 25.774, lng: -80.190}
    ];*/

    var flightPlanCoordinates = [
        {lat: 33.5362475, lng:-111.9267386},
        {lat: 33.5104882, lng:-111.9627875},
        {lat: 33.5004686, lng:-111.9027061}
    ];
    var infowindow =  new google.maps.InfoWindow();

    for(var i= 0;i< flightPlanCoordinates.length;i++){
        var marker = new google.maps.Marker({
            position: flightPlanCoordinates[i],
            map: map,
        });

        var content = "<h6>" + flightPlanCoordinates[i].lat +", "+ flightPlanCoordinates[i].lng + '</h6>';
        google.maps.event.addListener(marker, 'click', (function (marker, i,content) {
            return function () {
                infowindow.setContent(content);
                infowindow.open(map, marker);
            }
        })(marker, i,content));
          
    }

    var polygon = new google.maps.Polygon({
        map: map,
        path: flightPlanCoordinates,
        strokeColor: 'blue',
        strokeOpacity: 0.7,
        strokeWeight: 1
    });

       
    var latlngbounds = new google.maps.LatLngBounds();
    for (var i = 0; i < flightPlanCoordinates.length; i++) {           
        latlngbounds.extend(new google.maps.LatLng(flightPlanCoordinates[i].lat,flightPlanCoordinates[i].lng));
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
                    ];
                
        var bermudaTriangle = new google.maps.Polygon({
            paths: latlng
        });
        isWithinPoly(event,bermudaTriangle);
    });

    google.maps.event.addListener(map,'click',function(event) {
        isWithinPoly(event,polygon);
    });
        
    // console.log(google.maps.geometry.spherical.computeArea(polygon.getPath()));        
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