
<div class="row">
<div id="map"></div>
		<div id="log"></div>
		<script type="text/javascript">
			
			var map = L.map('map').setView([45.461973, -73.920547], 13);
			L.tileLayer('https://api.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
				attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
				maxZoom: 20,
				id: 'mapbox.streets',
				accessToken: 'pk.eyJ1IjoiamZyZWVkaW4iLCJhIjoiY2loNzZteHh6MGp3NHUxa2l6azhqdzBzcCJ9.dgR4BawDGcB9BJ_eo_xfnA'
			}).addTo(map);
			

		</script>
</div>

<script>	
	var geojsonLayer = new L.GeoJSON.AJAX("data/reseaucyclable201511.json");       
	geojsonLayer.addTo(map);

	$('input[type="checkbox"]').on("click", function( event ) {
		var options = [];
		
		if($('#commute').is(':checked')){
			options[0] = true
		}
		if($('#work').is(':checked')){
			options[1] = true
		}
		if($('#play').is(':checked')){
			options[2] = true
		}
		if($('#other').is(':checked')){
			options[3] = true
		}
		if($('#morning').is(':checked')){
			options[4] = true
		}		
		if($('#afternoon').is(':checked')){
			options[5] = true
		}		
		if($('#evening').is(':checked')){
			options[6] = true
		}
		if($('#winter').is(':checked')){
			options[7] = true
		}
		if($('#good-weather').is(':checked')){
			options[8] = true
		}
	
		$.ajax({
			type: "POST",
			url: "/scripts/data.php",
			dataType: 'json',
			data: {
				'options': options,
			},
			success: function (response) {
				geoJsonLayer = L.geoJson(response).addTo(map);
			}
		});
		
	});
	
</script>