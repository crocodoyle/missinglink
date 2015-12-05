
<div id="map" style="height: auto;width: 100%;position: absolute;top: 100px;bottom: 0;"></div>
<div id="legend" style="position:absolute;right: 50px; bottom: 50px; background-color:#000;padding:25px;border:solid 2px #FFF;">
	<div class="path" style="color:#FFF;font-size:18px;">
		<div style="width:25px;height:25px;background-color:#FBF500;display:inline-block;vertical-align:middle;margin-right:10px;"></div>
		Existing Network
	</div>
	<br/>
	<div class="routes" style="color:#FFF;font-size:18px;">
		<div style="width:25px;height:25px;background-color:#5BD3D6;display:inline-block;vertical-align:middle;margin-right:10px;"></div>
		Popular Routes
	</div>
</div>
		<script type="text/javascript">
			
			var map = L.map('map', {loadingControl: true}).setView([45.5081, -73.5833], 13);
			L.tileLayer('https://api.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
				attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
				maxZoom: 20,
				id: 'jfreedin.o9k111lk',
				accessToken: 'pk.eyJ1IjoiamZyZWVkaW4iLCJhIjoiY2loNzZteHh6MGp3NHUxa2l6azhqdzBzcCJ9.dgR4BawDGcB9BJ_eo_xfnA'
			}).addTo(map);
			

		</script>

<script>
/*var legend = L.control({position: 'bottomright'});

legend.onAdd = function (map) {
    var div = L.DomUtil.create('div', 'info legend');

	div.innerHTML = '<i style="background: #FF796D"></i>&ndash; commute<br/>' + 
					'<i style="background: #5BD3D6"></i>&ndash; work<br/>' + 
					'<i style="background: #E7A2D0"></i>&ndash; play<br/>' + 
					'<i style="background: #FBF500"></i>&ndash; other<br/>';

    return div;
};

legend.addTo(map);*/
	var geoJsonLayer;
	var baseLayer;
	//var geojsonLayer = new L.GeoJSON.AJAX("data/reseaucyclable201511.json");       
	//geojsonLayer.addTo(map);
	
	var myStyle = {
					"color": "#5BD3D6",
					"weight": 0.9,
					"opacity": 0.6
				};
				
	var myStyle2 = {
		"color": "#FBF500",
		"weight": 2.7,
		"opacity": 1
	};
	
	$.get('data/reseaucyclable201511.json', function (data) {
		baseLayer = L.geoJson(data,{style:myStyle2}).addTo(map);
		baseLayer.setZIndex(1);
	});

	$('input[type="checkbox"], input[type="radio"]').on("change", function( event ) {
		var options = [];
		
		options['commute'] = $('#commute').is(':checked')?"true":"false";
		options['work'] = $('#work').is(':checked')?"true":"false";
		options['play'] = $('#play').is(':checked')?"true":"false";
		options['other'] = $('#other').is(':checked')?"true":"false";
		options['morning'] = $('#morning').is(':checked')?"true":"false";
		options['evening'] = $('#evening').is(':checked')?"true":"false";
		options['winter'] = $('#winter').is(':checked')?"true":"false";
		options['weekend'] = $('#weekend').is(':checked')?"true":"false";
		options['season_other'] = $('#good-weather').is(':checked')?"true":"false";
		
		$.ajax({
			type: "POST",
			url: "/scripts/data.php",
			dataType: 'json',
			data: {
				'commute': options['commute'],
				'work': options['work'],
				'play': options['play'],
				'other': options['other'],
				'morning': options['morning'],
				'evening': options['evening'],
				'winter': options['winter'],
				'weekend': options['weekend'],
				'season_other': options['season_other']
			},
			error: function(response){
				console.log(response);
				//alert("Error loading data!");
				$('#loader').css('display','none');
			},
			beforeSend: function(response){
				$('#loader').css('display','block');
			},
			success: function (response) {
				console.log(response);
				if( geoJsonLayer ) map.removeLayer(geoJsonLayer);
				geoJsonLayer = L.geoJson(response,{style:myStyle}).addTo(map);
				baseLayer.bringToFront();
				$('#loader').css('display','none');
			}
		});
		
	});
	
</script>
