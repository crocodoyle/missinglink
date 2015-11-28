
<div class="row">
<div id="map"></div>
		<div id="log"></div>
		<script type="text/javascript">
			
			var map = L.map('map').setView([45.461973, -73.920547], 13);
			L.tileLayer('https://api.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
				attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
				maxZoom: 13,
				id: 'mapbox.streets',
				accessToken: 'pk.eyJ1IjoiamZyZWVkaW4iLCJhIjoiY2loNzZteHh6MGp3NHUxa2l6azhqdzBzcCJ9.dgR4BawDGcB9BJ_eo_xfnA'
			}).addTo(map);
			
			
			var jsonFile = "data0/ResoVelo/trip5000.json";
			$.get(jsonFile, function (data) {
				L.geoJson(data).addTo(map);
			});
			
		</script>
</div>
