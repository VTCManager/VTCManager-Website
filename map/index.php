<?php 
$requested_comp_id= $_GET['companyid'];
if ($requested_comp_id == null) {
	$requested_comp_id = "0";
}
?>
	<html lang="de">
  <head>
	  <?php include '../basis_header.php'; ?> 
	  <title>Livemap - VTCManager</title>
	  	  <link rel="stylesheet" href="./map-addon/leaflet.css"/>
	   <script src="./map-addon/leaflet.js"></script>
	   <script src="./map-addon/jquery.min.js"></script>
<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />
	  <script type="text/javascript" src="./map-addon/leaflet.markercluster.js"></script>
    <script type="text/javascript" src="./map-addon/leaflet.rotatedmarker.js"></script>
	  <link rel="stylesheet" type="text/css" href="./map-addon/leaflet.markercluster.css">
    <link rel="stylesheet" type="text/css" href="./map-addon/leaflet.markercluster.default.css">
	  	  <style>
#map {
	position: absolute;
	top: 50px;
	bottom: 0;
	left: 0;
	right: 0;
}
</style>
  </head>
  <body>
	  <?php include '../navbar.php'; ?> 
		
 <div id="map" class="leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom"></div>

<script>
	
    var company = <?php echo $requested_comp_id; ?>;
    var user_count = 0;
    function calculatePixelCoordinate(x, y, pointsPerPixel, x0, y0) {
        return [
            (x / pointsPerPixel + x0) | 0,
            (y / pointsPerPixel + y0) | 0
        ];
    }
    function calculatePixelCoordinateEu(x, y) {
        return calculatePixelCoordinate(x, y, 7.278, 11367, 9962);
    }
    function calculatePixelCoordinateUk(x, y) {
        return calculatePixelCoordinate(x, y, 9.69522, 10226, 9826);
    }


    function game_coord_to_pixels(x, y) {
        // https://forum.scssoft.com/viewtopic.php?p=402836#p402836
        // https://forum.scssoft.com/viewtopic.php?p=422083#p422083
        if (x < -31812 && y < -5618) {
            return calculatePixelCoordinateUk(x, y);
        } else {
            return calculatePixelCoordinateEu(x, y);
        }
    }


    var MAX_X = 19200;
    var MAX_Y = 21200;


    var CustomProjection = {
        project: function (latlng) {
            return new L.Point(latlng.lat, latlng.lng);
        },

        unproject: function (point) {
            return new L.LatLng(point.x, point.y);
        },

        bounds: L.bounds([0, 0], [MAX_X, MAX_Y])
    };
    var CustomCRS = L.extend({}, L.CRS, {
        projection: CustomProjection,
        // Why 128? Because 7 is the maximum zoom level (i.e. 1:1 scale), and pow(2, 7) = 128.
        transformation: new L.Transformation(1.0/128, 0, 1.0/128, 0),

        scale: function (zoom) {
            return Math.pow(2, zoom);
        },

        distance: function (latlng1, latlng2) {
            var dx = latlng2.lng - latlng1.lng,
                dy = latlng2.lat - latlng1.lat;

            return Math.sqrt(dx * dx + dy * dy);
        },

        infinite: false
    });

    var map = L.map('map', {
        fullscreenControl: true,
        fadeAnimation: true,
        zoomAnimation: true,
        crs: CustomCRS,
        maxBounds: [
            [0, 0],
            [MAX_X, MAX_Y]
        ]
    });

    map.on('load', function(e) {
        getCoordinates();
    });
	

    map.on('popupopen', function (e) {
        var userid = e.popup._source.options.userid;
        var username = e.popup._source.options.username;
    });


    var navigationIcon = L.icon({
        iconUrl: './map-addon/player_icon.png',

        iconSize:     [64, 89], //[64, 64][64, 89]
        iconAnchor:   [32, 89],
        popupAnchor:  [2, -15]
    });

    L.tileLayer('./map-addon/tiles/{z}/{y}/{x}.png', {
        minZoom: 3,
        maxZoom: 7,
        tileSize: 256,
        continuousWorld: false
    }).addTo(map);
    map.setView([MAX_X/2, MAX_Y/2], 4);

    map.attributionControl.addAttribution('&copy; VTCManager 2019 | map by <a href="https://forum.scssoft.com/viewtopic.php?t=186779">Funbit</a>');

    var markers = new L.markerClusterGroup({maxClusterRadius: 80, disableClusteringAtZoom: 6, spiderfyOnMaxZoom: false});

    function getCoordinates() {
		var ONE_MINUTE = 60 * 1000; /* ms */
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				
				var myObj = JSON.parse(this.responseText);
				markers.clearLayers();

            if(myObj != "") {
				
                user_count = myObj.length;
                for (var a in myObj) {
					if (((new Date) - new Date(myObj[a]["last_seen"])) < ONE_MINUTE) {
                    var markerCoordinates = game_coord_to_pixels(myObj[a]["coordinate_x"], myObj[a]["coordinate_y"]);
					

                    if (markerCoordinates[0] <= MAX_X && markerCoordinates[1] <= MAX_Y && markerCoordinates[0] >= 0 && markerCoordinates[1] >= 0) {
                        var marker = L.marker(markerCoordinates, {
                            rotationAngle: 0, //later: myObj[a]["rotation"]
                            icon: navigationIcon,
                            userid: myObj[a]["userID"],
                            username: myObj[a]["username"]
                        }).bindPopup("<a href='https://vtc.northwestvideo.de/account/?userid=" + myObj[a]["userID"] + "' target='_blank'>" + myObj[a]["username"] + "</a>");

                        markers.addLayer(marker);
                    }
						}
                };
            } else {
                document.title = document.title.replace(user_count, "0");
                user_count = 0;
            };
            map.addLayer(markers);
			}
		};
		xmlhttp.open("GET", "live_cord.php?companyid="+company, true);
		xmlhttp.send();
		}

    setInterval(function(){ getCoordinates(); }, 15000);
</script>
</body>
		
</html>
