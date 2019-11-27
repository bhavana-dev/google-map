<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <input type="text" id="first_address" value="Melbourne VIC">
  <input type="text" id="second_address" value="Sydney NSW">

  <button class="btn btn-primary" onclick="getDistance()">Submit</button>
</body>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCtf_DX0cKXrOWKeimApPyEW_MIzUS-CV8"></script>
<script type="text/javascript">
  function getDistance(){
    var directionsService = new google.maps.DirectionsService();

    var request = {
      origin      : document.getElementById('first_address').value, // a city, full address, landmark etc
      destination : document.getElementById('second_address').value,
      travelMode  : google.maps.DirectionsTravelMode.DRIVING
    };

    directionsService.route(request, function(response, status) {
      if ( status == google.maps.DirectionsStatus.OK ) {
        alert( response.routes[0].legs[0].distance.value ); // the distance in metres
      }
      else {
        alert(status);
      }
    });
  }
  
////////////////////////////////////////////////////////////
    //Calculate distance between two lat long
    function distance(lat1,lon1,lat2,lon2) {
      if ((lat1 == lat2) && (lon1 == lon2)) {
        return 0;
      }
      var R = 6371; // km (change this constant to get miles)
      var dLat = (lat2-lat1) * Math.PI / 180;
      var dLon = (lon2-lon1) * Math.PI / 180;
      var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
        Math.cos(lat1 * Math.PI / 180 ) * Math.cos(lat2 * Math.PI / 180 ) *
        Math.sin(dLon/2) * Math.sin(dLon/2);
      var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
      var d = R * c;
      if (d>1) return Math.round(d)+"km";
      else if (d<=1) return Math.round(d*1000)+"m";
      return d;
    }

    console.log(distance(22.71986323,75.86291313,22.87617519,75.75983047));

</script>
</html>