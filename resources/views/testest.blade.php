// This example requires the Drawing library. Include the libraries=drawing
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=drawing">
var typeNearBy, map ,infowindow, markerCluster, polygonArray=[] ,homemarkers = [], all_overlays = [];
var selectedShape,drawingManager ;
var all_overlays = [];
$("#place").change(function(){
  typeNearBy = $(this).val();
});
function initMap() {
typeNearBy = "restaurant";
   map = new google.maps.Map(document.getElementById('map'), {
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
      drawingModes: ['polygon', 'circle']
    },
    polygonOptions: {
      editable: false
    }

  });
  drawingManager.setMap(map);

  google.maps.event.addListener(drawingManager, 'overlaycomplete', function(event) {
    setMapOnAll(null);
    removeShape(event);
    all_overlays.push(event);
    homemarkers = [];
    var bounds = new google.maps.LatLngBounds();
    for (var i = 0; i < event.overlay.getPath().getLength(); i++) {
      polygonArray[i]= event.overlay.getPath().getAt(i) ;
      
      bounds.extend(polygonArray[i]);
      
    }
    service.nearbySearch({
        location : bounds.getCenter(),
        radius : 5000,
        type : [ typeNearBy ]
      }, callback);
  });

}
function callback(results, status) {
  
  if(results.length == 0){
      alert("No result found here.");
      return false;
  }
  if (status === google.maps.places.PlacesServiceStatus.OK) {
      for (var i = 0; i < results.length; i++) {
          createMarker(results[i]);        
      }
      markerCluster = new MarkerClusterer(map, homemarkers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
  }
}
function setMapOnAll(map) {
    console.log(homemarkers,"homemarkers");
    for (var i = 0; i < homemarkers.length; i++) {
        homemarkers[i].setMap(null);
    }
}


//placed all marker on map with infowindow
function createMarker(place) {
    
    var placeLoc = place.geometry.location;
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

function clearSelection() {
console.log(selectedShape,"selectedShape");
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
