<?php
if( $_SERVER['REQUEST_METHOD']=='GET' && isset( $_GET['ajax'] ) ){
	
		
		$serial = $_GET['serial'];
        $serial = "0".$serial;
		//$unique = $_GET['unique'];

		$dbhost =   'localhost';
		$dbuser =   'root'; 
		$dbpwd  =   'jameskinuthia'; 
		$dbname =   'alexa';
		$db     =   new mysqli( $dbhost, $dbuser, $dbpwd, $dbname );

		$places=array();
		
		
		//echo $serial;
		//echo $unique;

		$sql    =   "SELECT `vehicle` as 'name',`latitude` as 'lat',`longitude` as 'lng' ,`velocity` as 'spd', `date` as 'dat', `time` as tim from `data1` where `vehicle`= $serial order by id desc limit 1";

		$res    =   $db->query( $sql );
		if( $res ) while( $rs=$res->fetch_object() ) $places[]=array( 'latitude'=>$rs->lat, 'longitude'=>$rs->lng, 'speed'=>$rs->spd, 'name'=>$rs->name, 'dat'=>$rs->dat, 'tim'=>$rs->tim);
		$db->close();

		header( 'Content-Type: application/json' );
		echo json_encode( $places,JSON_FORCE_OBJECT );
		exit();
	}
	?>