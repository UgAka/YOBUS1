<?php include 'header.php'
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Locate the user</title>
    
    <!-- Mapbox CSS -->
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet">
    <style>
        
        #map {
            padding: 200PX;
            width: 100%; /* Adjust the width to control the size */
            height: 50%; /* Cover the full height of the viewport */
        }
    </style>
</head>
<body>
<section class="sub-header">
        <nav> <br>
            <div class="nav-link" id="menu">
                <i class="fas fa-times" onclick="hidemenu()" style="margin-left: 10px; margin-top: 6px;"></i>
                  <ul>
                    <li><a href="Home.php">HOME</a></li>
                    <li><a href="About.php">ABOUT</a></li>
                    <li><a href="MyReservation.php">MY RESERVATIONS</a></li>
                    <li><a href="location.html">TRACK LOCATION</a></li>
                    <li><a href="Contact.php">CONTACT</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
            <i class="fas fa-bars" onclick="showmenu()"></i>

        </nav>

        <h1>MY LOCATION</h1>

    </section>
 <div id="map"></div>



    <!-- Mapbox JavaScript -->
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoibXdlZ3llc2EiLCJhIjoiY2xueGJrdWhvMGVlMjJxbXVtdnhiOXF3cSJ9.f_nMfcRfX615QzpjKQN8ZA'; // 

        // Create a map
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            style: 'mapbox://styles/mapbox/streets-v12', // style URL
            center: [0, 0], // initial center before geolocation
            zoom: 2, // initial zoom before geolocation
        });

        // Initialize the geolocate control
        const geolocate = new mapboxgl.GeolocateControl({
            positionOptions: {
                enableHighAccuracy: true
            },
            trackUserLocation: true,
            showUserHeading: true
        });

        // Add the geolocate control to the map
        map.addControl(geolocate);

        // Listen for the geolocate event, which will center the map on the user's location
        map.on('load', function () {
            geolocate.trigger();
        });
    </script>

</body>
</html>
