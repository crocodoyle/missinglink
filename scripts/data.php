<?php
	header('Content-Type: application/json');
	require_once('../php_class/db.php'); 
	$db = db::GetInstance();
	
	$purpose_commute = false;
	$purpose_workRelated = false;
	$purpose_play = true;
	$purpose_other = false;
	
	$time_morning = true;
	$time_evening = false;
	$time_weekend = false;
	
	$season_winter = false;//November 15 to April 15
	$season_other = true;
	
	if( ($purpose_commute || $purpose_workRelated || $purpose_play || $purpose_other) && ($time_morning || $time_evening || $time_weekend) && ($season_winter || $season_other) )
	{
		$first = true;
		$strSQL = "SELECT * FROM velodata WHERE";
		
		// PURPOSE CATEGORIES
		if( $purpose_commute )
		{
			$strSQL .= " purpose = 'school' OR purpose = 'domicile-travail' OR purpose = 'aller au travail' OR purpose = 'école'";
			$first = false;
		}
		if( $purpose_workRelated )
		{
			if( !$first ) $strSQL .= " OR";
			$strSQL .= " purpose = 'work-related' OR purpose = 'déplacement-professionel' OR purpose = 'travail'";
			$first = false;
		}
		if( $purpose_play )
		{
			if( !$first ) $strSQL .= " OR";
			$strSQL .= " purpose = 'exercise' OR purpose = 'sport' OR purpose = 'social' OR purpose = 'loisir' OR purpose = 'leisure' OR purpose = 'shopping' OR purpose = 'magasinage' OR purpose = 'errands' OR purpose = 'courses'";
			$first = false;
		}
		if( $purpose_other )
		{
			if( !$first ) $strSQL .= " OR";
			$strSQL .= " purpose = 'other' OR purpose = 'autre' OR purpose = 'autres' OR purpose = 'autres motifs' OR purpose = ''";
			$first = false;
		}
	
		//TIME OF DAY
		if( $time_morning )
		{
			$strSQL .= " AND ( ( WEEKDAY(start) NOT IN (5,6) ) AND ( ( HOUR(start) >= 7 AND HOUR(start) <= 9 ) OR ( HOUR(stop) >= 7 AND HOUR(stop) <= 9 ) OR ( HOUR(start) < 7 AND HOUR (stop) > 9 ) ) )";
			$first = false;
		}
		if( $time_evening )
		{
			if( !$first ) $strSQL .= " OR"; else $strSQL .= " AND";
			$strSQL .= " ( ((DATEPART(dw, start) % 7 ) NOT IN (0,1) ) AND (DATEPART(hh,start) >= 16 AND DATEPART(hh,start) <= 18) OR (DATEPART(hh,stop) >= 16 AND DATEPART(hh,stop) <= 18) OR (DATEPART(hh,start) < 16 AND DATEPART(hh,stop) > 18))";
			$first = false;
		}
		if( $time_weekend )
		{
			if( !$first ) $strSQL .= " OR"; else  $strSQL .= " AND";
			$strSQL .= " ((DATEPART(dw, start) % 7 ) IN (0,1) )";
			$first = false;
		}
		
		//SEASON to add

		//$strSQL = "SELECT * FROM velodata WHERE purpose = 'travail' OR purpose = 'commute'";
		
		$result = $db->Query( $strSQL );

		$out = '{ "type": "FeatureCollection", "crs": { "type": "name", "properties": { "name": "urn:ogc:def:crs:OGC:1.3:CRS84" } }, ';
		$out.= '"features":[';
		
		$first = true;
		while( $row = mysqli_fetch_assoc( $result ) )
		{
			if( !$first ) $out.= ', ';
			$first = false;
			$i=0;
			$out.='{"type": "Feature", "properties": {"id": '.($row["id"]).', "name": "Test"}, "geometry":{ "type": "LineString", "coordinates":';
			$out.=$row["geometry"];
			$out.='}}';
		}
		//echo $out;
		$out.=']';
		$out.= '}';	

		echo $out;/// echo 'testload';
	}
?>