@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <select id="place">
                        <option value="">Choose Place Type</option>
                        <option value="airport">airport</option>
                        <option value="atm">atm</option>
                        <option value="bank">bank</option>
                        <option value="bar">bar</option>
                        <option value="beauty_salon">beauty_salon</option>
                        <option value="cafe">cafe</option>
                        <option value="hospital">hospital</option>
                        <option value="shopping_mall">shopping_mall</option>
                        <option value="restaurant">restaurant</option>
                    </select>
                    <br>
                    <div class="map_canvas" id="map_canvas" style="height: 700px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtf_DX0cKXrOWKeimApPyEW_MIzUS-CV8&libraries=drawing,places&callback=initMap" async defer></script>

<script>
var  map ,marker,infowindow, markerCluster, polygonArray=[] ,homemarkers = [], all_overlays = [];
var selectedShape,drawingManager ;
var all_overlays = [];
var typeNearBy ;
$("#place").change(function(){
  typeNearBy = $(this).val();
});

function initMap() {

   map = new google.maps.Map(document.getElementById('map_canvas'), {
    center: new google.maps.LatLng(22.71986323, 75.86291313),
    scrollwheel:true,
    zoom: 8
  });
  infowindow =  new google.maps.InfoWindow();
  var service = new google.maps.places.PlacesService(map);
                
  drawingManager = new google.maps.drawing.DrawingManager({
    drawingMode: google.maps.drawing.OverlayType.POLYGON,
    drawingControl: true,
    drawingControlOptions: {
      position: google.maps.ControlPosition.TOP_CENTER,
      drawingModes: ['polygon','rectangle','circle']
    },
        polygonOptions: {
          editable: false
        }

    });
    drawingManager.setMap(map);

    google.maps.event.addListener(drawingManager, 'overlaycomplete', function(event) {
        deleteAllShape();
        removeShape(event);
        setMapOnAll(null);
        homemarkers = [];
        all_overlays.push(event);
        var bounds = new google.maps.LatLngBounds();
        
        if(event.overlay.type == "polygon"){
          for (var i = 0; i < event.overlay.getPath().getLength(); i++) {
            polygonArray[i]= event.overlay.getPath().getAt(i) ;      
            bounds.extend(polygonArray[i]);
          }
            var isWithinPolygon = google.maps.geometry.poly.containsLocation(bounds.getCenter(), event.overlay);
            if(isWithinPolygon){
                service.nearbySearch({
                  location : bounds.getCenter(),
                  radius : 500,
                  type : [ typeNearBy ]
                }, function(results, status){
                    if(results.length == 0){
                        alert("No result found here.");
                        return false;
                    }
                    if (status === google.maps.places.PlacesServiceStatus.OK) {
                        for (var i = 0; i < results.length; i++) {
                            createMarker(results[i] ,event);        
                        }
                        
                    }
                });
            }
        }else if(event.overlay.type == "rectangle"){
            var boundssss = event.overlay.getBounds();
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
            var bounds = new google.maps.LatLngBounds();
            for (var i = 0; i < bermudaTriangle.getPath().getLength(); i++) {
              polygonArray[i]= bermudaTriangle.getPath().getAt(i) ;      
              bounds.extend(polygonArray[i]);
            }
            var isWithinRectangle = google.maps.geometry.poly.containsLocation(bounds.getCenter(), bermudaTriangle);
            if(isWithinRectangle){
                service.nearbySearch({
                  location : bounds.getCenter(),
                  radius : 500,
                  type : [ typeNearBy ]
                }, function(results, status){
                    if(results.length == 0){
                        alert("No result found here.");
                        return false;
                    }
                    if (status === google.maps.places.PlacesServiceStatus.OK) {
                        for (var i = 0; i < results.length; i++) {

                            var placeLoc = results[i].geometry.location;
                            var isWithinPolygon = google.maps.geometry.poly.containsLocation(results[i].geometry.location, bermudaTriangle);
                            if(isWithinPolygon){
                                marker = new google.maps.Marker({
                                    map : map,
                                    position : results[i].geometry.location
                                });
                                google.maps.event.addListener(marker, 'click', function() {
                              
                                  var html = "content";
                                  infowindow.setContent(results.name);
                                  infowindow.open(map, this);
                                });
                              homemarkers.push(marker);
                            }     
                        }
                        
                    }
                });
            }
        }else if(event.overlay.type == "circle"){
            var circle = event.overlay;
            var radius = circle.getRadius();
            var center = circle.getCenter();
            var bounds = new google.maps.LatLngBounds();
            console.log(circle);
            
                service.nearbySearch({
                  location : center,
                  radius : 500,
                  type : [ typeNearBy ]
                }, function(results, status){
                    if(results.length == 0){
                        alert("No result found here.");
                        return false;
                    }
                    if (status === google.maps.places.PlacesServiceStatus.OK) {
                        for (var i = 0; i < results.length; i++) {
                          
                            var isWithinCircle = google.maps.geometry.spherical.computeDistanceBetween(results[i].geometry.location, center);
                            if(isWithinCircle <= radius){
                                marker = new google.maps.Marker({
                                    map : map,
                                    position : results[i].geometry.location
                                });
                                google.maps.event.addListener(marker, 'click', function() {
                              
                                  var html = "content";
                                  infowindow.setContent(results.name);
                                  infowindow.open(map, this);
                                });
                              homemarkers.push(marker);
                            }     
                        }
                    }
                });
            
        }
    });

}

//Callback for service.nearbySearch function
function callback(results, status) {
  console.log(results);
  if(results.length == 0){
      alert("No result found here.");
      return false;
  }
  if (status === google.maps.places.PlacesServiceStatus.OK) {
      for (var i = 0; i < results.length; i++) {
          createMarker(results[i]);        
      }
      
  }
}
//placed all marker on map with infowindow
function createMarker(place ,event) {
  var placeLoc = place.geometry.location;
  if(event == "rectangle"){
    event.overlay = event;
  }
  var isWithinPolygon = google.maps.geometry.poly.containsLocation(place.geometry.location, event.overlay);
  if(isWithinPolygon){
      marker = new google.maps.Marker({
          map : map,
          position : place.geometry.location
      });
      google.maps.event.addListener(marker, 'click', function() {
    
        var html = "content";
        infowindow.setContent(place.name);
        infowindow.open(map, this);
      });
    homemarkers.push(marker);
  }
  
}

//clear all marker
function setMapOnAll(map) {
  for (var i = 0; i < homemarkers.length; i++) {    
      homemarkers[i].setMap(null);
  }
  homemarkers = [];
}

function clearSelection() {
    if (selectedShape) {
        selectedShape.setEditable(false);
        selectedShape = null;
    }
}

function setSelection(shape) {
  clearSelection();
  selectedShape = shape;
}

function removeShape(e){    
    if (e.type != google.maps.drawing.OverlayType.MARKER) {        
        drawingManager.setDrawingMode(null);
        var newShape = e.overlay;
        newShape.type = e.type;
        setSelection(newShape);
    }
}

function deleteAllShape() {
  for (var i = 0; i < all_overlays.length; i++) {
    all_overlays[i].overlay.setMap(null);
  }
  all_overlays = [];
}
 
</script>
    @endsection