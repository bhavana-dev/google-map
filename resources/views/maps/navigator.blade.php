<!DOCTYPE html>
<html>
<head>
	<title>Navigator</title>
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
</head>
<body>
<button id="find_btn">Find Me</button>
<div id="result"></div>

<div id="map" style="position: inherit;overflow: hidden;"></div>
</body>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtf_DX0cKXrOWKeimApPyEW_MIzUS-CV8"
    async defer></script>
<script type="text/javascript">
	$("#find_btn").click(function () { //user clicks button
	if ("geolocation" in navigator){ //check geolocation available 
		//try to get user current location using getCurrentPosition() method
		navigator.geolocation.getCurrentPosition(function(position){ 
				$("#result").html("Found your location <br />Lat : "+position.coords.latitude+" </br>Lang :"+ position.coords.longitude);
				
				var map;
			        
			        var map = new google.maps.Map(document.getElementById('map'), {
			          	zoom: 9,
			          	center: new google.maps.LatLng(position.coords.latitude ,position.coords.longitude)
			        });

			        var infowindow =  new google.maps.InfoWindow();

			        
			          	var marker = new google.maps.Marker({
			            	position: new google.maps.LatLng(position.coords.latitude,position.coords.longitude),
			            	map: map,
			          	});
			          	
			          	google.maps.event.addListener(marker, 'click', (function (marker,position) {
				            return function () {
				              	infowindow.setContent(position.coords.latitude+","+position.coords.longitude);
				              	infowindow.open(map, marker);
				            }
			          	})(marker ,position));
		        	
		      
			});
	}else{
		console.log("Browser doesn't support geolocation!");
	}
});
</script>
</html>