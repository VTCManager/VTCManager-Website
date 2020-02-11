
<html lang="de">
<head>
    <meta charset="UTF-8"/>
    <meta lang="de"/>
    <?php include("../basis_header.php");?>
    <script src="ets2-mobile-route-advisor/maps/ets2/js/ol.js"></script>
    <script src="ets2-mobile-route-advisor/maps/ets2/js/cities.js"></script>
    <script src="ets2-mobile-route-advisor/maps/ets2/js/map.js"></script>
    <script type="text/javascript">
	var url = "live_cord.php?companyid=0";
        var g_pathPrefix = "ets2-mobile-route-advisor";
        var g_map = null;
        var g_src = null;
        var g_features = [];

        function styleFunction(resolution) {
            return [new ol.style.Style({
                image: new ol.style.Icon({
			anchor: [0.5, 50],
			anchorXUnits: 'fraction',
			anchorYUnits: 'pixels',
			rotateWithView: true,
			scale: Math.min(1, Math.max(0.25, 1.0 / Math.log2(resolution + 1))),
			src: g_pathPrefix + '/img/player.png'
		}),
		text: resolution <= 23.5 ? new ol.style.Text({
                    font: "12px Calibri,sans-serif",
                    fill: new ol.style.Fill({color: "#fff"}),
                    stroke: new ol.style.Stroke({
                        color: "#000", width: 0
                    }),
		    scale: 1,
                    text: this.get("description")
                }) : null
            })];
        }

        function updatePositions(response) {
			var coords = JSON.parse(response);
			var ONE_MINUTE = 60 * 1000; /* ms */
            for (var i = 0; i < coords.length; i++) {
		if (((new Date) - new Date(coords[i]["last_seen"])) < ONE_MINUTE) {
                var row = coords[i];
                if (!(row.username in g_features)) {
                    g_features[row.username] = new ol.Feature({geometry: new ol.geom.Point([0, 0])});
                    g_features[row.username].setStyle(styleFunction);
                    g_features[row.username].set('description', row.User);
                    g_src.addFeature(g_features[row.username]);
                } else {
                }
                var map_coords = game_coord_to_pixels(row.coordinate_x, row.coordinate_y);
                g_features[row.username].getGeometry().setCoordinates(map_coords);
	    }
            }
        }
		
		function update(){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					updatePositions(this.responseText);
				}
			};
			xhttp.open("GET", url, true);
			xhttp.send();
		}
    </script>
</head>
<body lang="de" style="background-color: gray; margin: 0; overflow-y: hidden">
    <?php include("../navbar.php");?>
<div id="map">

</div>
<script type="text/javascript">
    g_map = buildMap("map");
    update();
    setInterval(update, 2500);
</script>
</body>
</html>

