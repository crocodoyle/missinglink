<?php
	header('Content-Type: application/json');
	require_once('../php_class/db.php'); 
	$db = db::GetInstance();
	
	$purpose_commute = isset( $_POST["commute"] )?( $_POST["commute"]=="true"?true:false ):false;
	$purpose_workRelated = isset( $_POST["work"] )?( $_POST["work"]=="true"?true:false ):false;;
	$purpose_play = isset( $_POST["play"] )?( $_POST["play"]=="true"?true:false ):false;;
	$purpose_other = isset( $_POST["other"] )?( $_POST["other"]=="true"?true:false ):false;;
	
	$time_morning = isset( $_POST["morning"] )?( $_POST["morning"]=="true"?true:false ):false;;
	$time_evening = isset( $_POST["evening"] )?( $_POST["evening"]=="true"?true:false ):false;;
	$time_weekend = isset( $_POST["weekend"] )?( $_POST["weekend"]=="true"?true:false ):false;;
	
	$season_winter = isset( $_POST["winter"] )?( $_POST["winter"]=="true"?true:false ):false;;//November 15 to April 15
	$season_other = isset( $_POST["season_other"] )?( $_POST["season_other"]=="true"?true:false ):false;;
	
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
		$first = true;
		if( $time_morning )
		{
			$strSQL .= " AND ( ( WEEKDAY(start) NOT IN (5,6) ) AND ( ( HOUR(start) >= 7 AND HOUR(start) <= 9 ) OR ( HOUR(stop) >= 7 AND HOUR(stop) <= 9 ) OR ( HOUR(start) < 7 AND HOUR (stop) > 9 ) ) )";
			$first = false;
		}
		if( $time_evening )
		{
			if( !$first ) $strSQL .= " OR"; else $strSQL .= " AND";
			$strSQL .= " ( ( WEEKDAY(start) NOT IN (5,6) ) AND ( ( HOUR(start) >= 16 AND HOUR(start) <= 18 ) OR ( HOUR(stop) >= 16 AND HOUR(stop) <= 18 ) OR ( HOUR(start) < 16 AND HOUR (stop) > 18 ) ) )";
			$first = false;
		}
		if( $time_weekend )
		{
			if( !$first ) $strSQL .= " OR"; else  $strSQL .= " AND";
			$strSQL .= "  ( WEEKDAY(start) IN (0,1) )";
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
			$out.='{"type": "Feature", "properties": {"id": '.($row["id"]).', "category":"';
			switch( $row['purpose'] )
			{
				case 'commute':
				case 'school':
				case 'domicile-travail':
				case 'aller au travail':
				case 'école':
					$out.= 'commute';
					break;
				case 'work-related':
				case 'déplacement':
				case 'professionel':
				case 'travail':
					$out.='work';
					break;
				case 'exercise':
				case 'sport':
				case 'social':
				case 'loisirs':
				case 'leisure':
				case 'shopping':
				case 'magasinage':
				case 'errands':
				case 'courses':
					$out.='play';
					break;
				default:
					$out.='other';
			}
			$out.='"}, "geometry":{ "type": "LineString", "coordinates":';
			$out.=$row["geometry"];
			$out.='}}';
		}

		$out.=']';
		$out.= '}';	

		echo $out;/// echo 'testload';
	}
	else
	{
		echo "nodata";
	}
?>