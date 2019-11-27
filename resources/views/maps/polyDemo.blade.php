<!DOCTYPE html>
<html>

    <head>
        <style>
            html,
            body {
                font-family: Arial, sans-serif;
                height: 100%;
                margin: 0;
                padding: 0;
            }

            .container {
                height: 100%;
                position: relative;
            }

            input {
                font-size: 12px;
            }

            h1 {
                color: #525454;
                font-size: 22px;
                margin: 0 0 10px 0;
                text-align: center;
            }

            #hide-listings,
            #show-listings {
                width: 48%;
            }

            hr {
                background: #D0D7D9;
                height: 1px;
                margin: 20px 0 20px 0;
                border: none;
            }

            #map {
                bottom: 0px;
                height: 100%;
                left: 362px;
                position: absolute;
                right: 0px;
            }

            .options-box {
                background: #fff;
                border: 1px solid #999;
                border-radius: 3px;
                height: 100%;
                line-height: 35px;
                padding: 10px 10px 30px 10px;
                text-align: left;
                width: 340px;
            }

            #pano {
                width: 200px;
                height: 200px;
            }

            .text {
                font-size: 12px;
            }

            #toggle-drawing {
                width: 27%;
                position: relative;
                margin-left: 10px;
            }

            #zoom-to-area-text {
                position: relative;
                width: 70%;
            }

            #zoom-to-area {
                width: 24%;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="options-box">
                <h1>Bitmeets: List of Businesses</h1>
                <div>
                    <input id="show-listings" type="button" value="Show Listings">
                    <input id="hide-listings" type="button" value="Hide Listings">
                    <hr>
                    <span class="text"> Draw a shape to search within it for homes!</span>
                    <input id="toggle-drawing" type="button" value="Drawing Tools">
                </div>
                <hr>
                <div>
                    <input id="zoom-to-area-text" type="text" placeholder="Enter your favorite area!">
                    <input id="zoom-to-area" type="button" value="Zoom">
                </div>
            </div>
        </div>
        <div id="map"></div>
        </div>
        <script>
            var map;
            // Create a new blank array for all the listing markers.
            var markers = [];
            // This global polygon variable is to ensure only ONE polygon is rendered.
            var polygon = null;

            function initMap() {
                // Create a styles array to use with the map.
                var styles = [
                    {
                    stylers: [{
                        hue: '#2c3e50'
                    }, {
                        saturation: 250
                    }]
                    }, {
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [{
                        lightness: 50
                    }, {
                        visibility: 'simplified'
                    }]
                }, {
                    featureType: 'road',
                    elementType: 'labels',
                    stylers: [{
                        visibility: 'off'
                    }]
                }]

                map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                        lat: 43.803646,
                        lng: -79.418942
                    },
                    zoom: 13,
                    styles: styles,
                    mapTypeControl: false
                });
                // These are the real estate listings that will be shown to the user.
                // Normally we'd have these in a database instead.
                var locations = [
                    {
                        title: 'Kavkaz Restaurant',
                        location: {
                            lat: 43.78825,
                            lng: -79.467264
                        }
                    },
                    {
                        title: 'A Yiddishe Mame Restaurant',
                        location: {
                            lat: 43.808537,
                            lng: -79.470641
                        }
                    },
                    {
                        title: 'Babushka Club',
                        location: {
                            lat: 43.836554,
                            lng: -79.50581
                        }
                    },
                    {
                        title: 'Mint Lounge',
                        location: {
                            lat: 43.796283,
                            lng: -79.417449
                        }
                    },
                    {
                        title: 'Mezza Notte',
                        location: {
                            lat: 43.811911,
                            lng: -79.452171
                        }
                    },
                    {
                        title: 'Bagel World',
                        location: {
                            lat: 43.812108,
                            lng: -79.452992
                        }
                    }
                ];
                var largeInfowindow = new google.maps.InfoWindow();
                // Initialize the drawing manager.
                var drawingManager = new google.maps.drawing.DrawingManager({
                    drawingMode: google.maps.drawing.OverlayType.POLYGON,
                    drawingControl: true,
                    drawingControlOptions: {
                        position: google.maps.ControlPosition.TOP_LEFT,
                        drawingModes: [
                            google.maps.drawing.OverlayType.POLYGON
                        ]
                    }
                });
                // Style the markers a bit. This will be our listing marker icon.
                var defaultIcon = makeMarkerIcon('0091ffs');
                // Create a "highlighted location" marker color for when the user
                // mouses over the marker.
                var highlightedIcon = makeMarkerIcon('FFFF24');
                // The following group uses the location array to create an array of markers on initialize.
                for (var i = 0; i < locations.length; i++) {
                    // Get the position from the location array.
                    var position = locations[i].location;
                    var title = locations[i].title;
                    // Create a marker per location, and put into markers array.
                    var marker = new google.maps.Marker({
                        position: position,
                        title: title,
                        animation: google.maps.Animation.DROP,
                        icon: defaultIcon,
                        id: i
                    });
                    // Push the marker to our array of markers.
                    markers.push(marker);
                    // Create an onclick event to open the large infowindow at each marker.
                    marker.addListener('click', function() {
                        populateInfoWindow(this, largeInfowindow);
                    });
                    // Two event listeners - one for mouseover, one for mouseout,
                    // to change the colors back and forth.
                    marker.addListener('mouseover', function() {
                        this.setIcon(highlightedIcon);
                    });
                    marker.addListener('mouseout', function() {
                        this.setIcon(defaultIcon);
                    });
                }
                document.getElementById('show-listings').addEventListener(
                    'click', showListings);
                document.getElementById('hide-listings').addEventListener(
                    'click', hideListings);
                document.getElementById('toggle-drawing').addEventListener(
                    'click',
                    function() {
                        toggleDrawing(drawingManager);
                    });
                document.getElementById('zoom-to-area').addEventListener(
                    'click',
                    function() {
                        zoomToArea();
                    });
                // Add an event listener so that the polygon is captured,  call the
                // searchWithinPolygon function. This will show the markers in the polygon,
                // and hide any outside of it.
                drawingManager.addListener('overlaycomplete', function(event) {
                    // First, check if there is an existing polygon.
                    // If there is, get rid of it and remove the markers
                    if (polygon) {
                        polygon.setMap(null);
                        hideListings(markers);
                    }
                    // Switching the drawing mode to the HAND (i.e., no longer drawing).
                    drawingManager.setDrawingMode(null);
                    // Creating a new editable polygon from the overlay.
                    polygon = event.overlay;
                    polygon.setEditable(true);
                    // Searching within the polygon.
                    searchWithinPolygon();
                    // Make sure the search is re-done if the poly is changed.
                    polygon.getPath().addListener('set_at',
                        searchWithinPolygon);
                    polygon.getPath().addListener('insert_at',
                        searchWithinPolygon);
                });
            }
            // This function populates the infowindow when the marker is clicked. We'll only allow
            // one infowindow which will open at the marker that is clicked, and populate based
            // on that markers position.
            function populateInfoWindow(marker, infowindow) {
                // Check to make sure the infowindow is not already opened on this marker.
                if (infowindow.marker != marker) {
                    // Clear the infowindow content to give the streetview time to load.
                    infowindow.setContent('');
                    infowindow.marker = marker;
                    // Make sure the marker property is cleared if the infowindow is closed.
                    infowindow.addListener('closeclick', function() {
                        infowindow.marker = null;
                    });
                    var streetViewService = new google.maps.StreetViewService();
                    var radius = 50;
                    // In case the status is OK, which means the pano was found, compute the
                    // position of the streetview image, then calculate the heading, then get a
                    // panorama from that and set the options
                    function getStreetView(data, status) {
                        if (status == google.maps.StreetViewStatus.OK) {
                            var nearStreetViewLocation = data.location.latLng;
                            var heading = google.maps.geometry.spherical.computeHeading(
                                nearStreetViewLocation, marker.position);
                            infowindow.setContent('<div>' + marker.title +
                                '</div><div id="pano"></div>');
                            var panoramaOptions = {
                                position: nearStreetViewLocation,
                                pov: {
                                    heading: heading,
                                    pitch: 30
                                }
                            };
                            var panorama = new google.maps.StreetViewPanorama(
                                document.getElementById('pano'),
                                panoramaOptions);
                        }
                        else {
                            infowindow.setContent('<div>' + marker.title +
                                '</div>' +
                                '<div>No Street View Found</div>');
                        }
                    }
                    // Use streetview service to get the closest streetview image within
                    // 50 meters of the markers position
                    streetViewService.getPanoramaByLocation(marker.position,
                        radius, getStreetView);
                    // Open the infowindow on the correct marker.
                    infowindow.open(map, marker);
                }
            }
            // This function will loop through the markers array and display them all.
            function showListings() {
                var bounds = new google.maps.LatLngBounds();
                // Extend the boundaries of the map for each marker and display the marker
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                    bounds.extend(markers[i].position);
                }
                map.fitBounds(bounds);
            }
            // This function will loop through the listings and hide them all.
            function hideListings() {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(null);
                }
            }
            // This function takes in a COLOR, and then creates a new marker
            // icon of that color. The icon will be 21 px wide by 34 high, have an origin
            // of 0, 0 and be anchored at 10, 34).
            function makeMarkerIcon(markerColor) {
                var markerImage = new google.maps.MarkerImage(
                    'http://chart.googleapis.com/chart?chst=d_map_spin&chld=1.15|0|' +
                    markerColor +
                    '|40|_|%E2%80%A2',
                    new google.maps.Size(21, 34),
                    new google.maps.Point(0, 0),
                    new google.maps.Point(10, 34),
                    new google.maps.Size(21, 34));
                return markerImage;
            }
            // This shows and hides (respectively) the drawing options.
            function toggleDrawing(drawingManager) {
                if (drawingManager.map) {
                    drawingManager.setMap(null);
                    // In case the user drew anything, get rid of the polygon
                    if (polygon !== null) {
                        polygon.setMap(null);
                    }
                }
                else {
                    drawingManager.setMap(map);
                }
            }
            // This function hides all markers outside the polygon,
            // and shows only the ones within it. This is so that the
            // user can specify an exact area of search.
            function searchWithinPolygon() {
                for (var i = 0; i < markers.length; i++) {
                    if (google.maps.geometry.poly.containsLocation(markers[i].position,
                            polygon)) {
                        markers[i].setMap(map);
                    }
                    else {
                        markers[i].setMap(null);
                    }
                }
            }
            // This function takes the input value in the find nearby area text input
            // locates it, and then zooms into that area. This is so that the user can
            // show all listings, then decide to focus on one area of the map.
            function zoomToArea() {
                // Initialize the geocoder.
                var geocoder = new google.maps.Geocoder();
                // Get the address or place that the user entered.
                var address = document.getElementById('zoom-to-area-text').value;
                // Make sure the address isn't blank.
                if (address == '') {
                    window.alert('You must enter an area, or address.');
                }
                else {
                    // Geocode the address/area entered to get the center. Then, center the map
                    // on it and zoom in
                    geocoder.geocode({
                        address: address,
                        componentRestrictions: {
                            locality: 'Toronto'
                        }
                    }, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            map.setCenter(results[0].geometry.location);
                            map.setZoom(15);
                        }
                        else {
                            window.alert(
                                'We could not find that location - try entering a more' +
                                ' specific place.');
                        }
                    });
                }
            }
        </script>

        <script async defer src="https://maps.googleapis.com/maps/api/js?libraries=drawing,geometrykey=APIKEY&v=3&callback=initMap">
        </script>

    </body>

</html>