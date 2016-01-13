<?php 
	require_once('php_class/db.php'); 
	$db = db::GetInstance();
	
	for( $i = 2; $i < 3; $i++ )
	{
		$jsondata = file_get_contents('dataimport/Part'.$i.'.geojson');
		$data = json_decode($jsondata, true);
		
		foreach( $data["features"] as $v )
		{
			$stop = $v["properties"]["stop"];
			$id_origine = $v["properties"]["id_origine"];
			$start = $v["properties"]["start"];
			$length = $v["properties"]["length"];
			$purpose = $v["properties"]["purpose"];
			$list = $v["properties"]["liste_segments_jsonb"];
			$n_coord = $v["properties"]["n_coord"];
			$id = $v["properties"]["id"];
			
			$out = "[";
			// Need to manually serialize...
			foreach( $v["geometry"]["coordinates"] as $c )
			{
				if( $out == "[" )
				{
					$out .= "[".$c[0].", ".$c[1]."]";
				}
				$out .= ", [".$c[0].", ".$c[1]."]";
			}
			$out .= "]";
			$geometry = $out;
			
			
			$db->query("INSERT INTO velodata(stop, id_origine, start, length, purpose, liste_segments_jsonb,n_coord,id,geometry) VALUES ('$stop', '$id_origine', '$start', '$length', '$purpose', '".$db->Escape($list)."', '$n_coord', '$id', '$geometry')");
			echo 'Import of '.$i.' successful!<br/>';
		}
	}
?>
<!--
<html>
<head>
</head>
<body>
	<form method="post" action="index.php" />
		<input type
	</form>
</body>
</html>-->