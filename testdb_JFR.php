<html>
	<head>
		<script src="js/papaparse.min.js"></script>
		<script src="js/jquery.min.js"></script>
		<script src="js/leaflet.js"></script>
		<link href='css/leaflet.css' rel='stylesheet' />
		<style>
			#map{height: 500px;}
		</style>
	</head>
	<body>
		<div id="map"></div>
		<div id="log"></div>
		<script type="text/javascript">
			
			var map = L.map('map').setView([45.490059037603309, -73.548995775641998], 13);
			L.tileLayer('https://api.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
				attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
				maxZoom: 20,
				id: 'jfreedin.o9j3n7mf',
				accessToken: 'pk.eyJ1IjoiamZyZWVkaW4iLCJhIjoiY2loNzZteHh6MGp3NHUxa2l6azhqdzBzcCJ9.dgR4BawDGcB9BJ_eo_xfnA'
			}).addTo(map);
			
			//var jsonFile = "data0/reseaucyclable201511.json";
			//var jsonFile = "scripts/data.php";
			//console.log('test');
			var myStyle = {
				"color": "#000",
				"weight": 0.5,
				"opacity": 0.5
			};
			$.get('scripts/data.php', function (data) {
				alert('Data Loaded!');
				//console.log(data);
				L.geoJson(data,{style:myStyle}).addTo(map);
				$.get('data0/reseaucyclable201511.json', function (data) {
					var myStyle2 = {
						"color": "#FFEF00",
						"weight": 5,
						"opacity": 1
					};
					L.geoJson(data,{style:myStyle2}).addTo(map);
				});

			});
		</script>
	</body>
</html>