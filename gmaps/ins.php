#!/usr/bin/env php
<?php

	$db_host = "localhost";
	$db_name = "root";
	$db_pswd="";
	$db_database = "data";
	//echo "insert successful";

	$db_connection = mysqli_connect("$db_host", "$db_name", "$db_pswd","$db_database") or die("database error");
	if($argc < 1) {
		echo "Variables not enough \n";
		exit();
	}

	$devId=$argv[1];
	if(strlen($devId)>1){
		date_default_timezone_set("Africa/Nairobi");
	        $datetime=date("Y-m-d H:i:s");
       		$id=md5($datetime.$devId);

		$input = $devId;
		$devices = explode("*", $input);
		$devdata = explode(",", $devices[1]);
	   
	   	//echo "devdata".$devdata."\n" ; 
		
		$datatime  =  ""; 
		$speedlimitsensor =  ""; 
		$speedlimitgps =  ""; 
		$calibration =  ""; 
		$signalwire =  ""; 
		$mainconnector =  ""; 
		$mainpowersupply =  ""; 
		$satelitefix =  ""; 
		$speedsignal =  ""; 
		$vehiclespeed =  "";  
		$reg_no =  ""; 
		$vehicle_voltage =  ""; 
		$imei =  ""; 
		$latitude =  ""; 
		$northorsouth =  ""; 
		$longitude =  ""; 
		$eastorwest =  ""; 
		if (array_key_exists(0, $devdata)) {
		 	$datatime  =  $devdata[0]; 
		}
		if (array_key_exists(1, $devdata)) {
			$speedlimitsensor  =  $devdata[1]; 
		}
		if (array_key_exists(2, $devdata)) {
			$speedlimitsgps    =  $devdata[2]; 
		}
		if (array_key_exists(3, $devdata)) {
			$calibration     =  $devdata[3];  
		}
		if (array_key_exists(4, $devdata)) {
			$signalwire      =  $devdata[4];
		}
		if (array_key_exists(5, $devdata)) {
		 	$mainconnector   =  $devdata[5]; 
		}
		if (array_key_exists(6, $devdata)) {
			$mainpowersupply =  $devdata[6];
		}

		if (array_key_exists(7, $devdata)) {
			$satelitefix     =  $devdata[7]; 
		}
		if (array_key_exists(8, $devdata)) {
			$speedsignal     =  $devdata[8]; 
		}
		if (array_key_exists(9, $devdata)) {
			$vehiclespeed    =  $devdata[9];  
		}
		if (array_key_exists(10, $devdata)) {
			$reg_no          =  $devdata[10];

		}
		if (array_key_exists(11, $devdata)) {
			$vehicle_voltage  =  $devdata[11];
		}
		
		if (array_key_exists(12, $devdata)) {
			$imei            =  $devdata[12];
		}

		if (array_key_exists(13, $devdata)) {
			$latitude        =  $devdata[13];
		}
		if (array_key_exists(14, $devdata)) {
			$northorsouth    =  $devdata[14];
		}
  
		if (array_key_exists(15, $devdata)) {
			$longitude       =  $devdata[15];
		}
		if (array_key_exists(16, $devdata)) {
			$eastorwest =  $devdata[16];
		}

		$sql="insert into devicedata values (null,'$datatime','$speedlimitsensor','$speedlimitsgps','$calibration','$signalwire','$mainconnector','$mainpowersupply','$satelitefix','$speedsignal','$vehiclespeed','$reg_no','$vehicle_voltage','$imei','$latitude','$northorsouth','$longitude','$eastorwest',now())";
		$sql2="insert into datas values (null,'$input')";
        $query = @mysqli_query($db_connection,$sql);
        $query2 = @mysqli_query($db_connection,$sql2);

        if (mysqli_query($db_connection,$sql)) {
		    echo "inserted";
		} else {
		    echo "failed1" ;
		}
		 if (!mysqli_query($db_connection,$sql2)) {
		     echo "failed";
		 }
	}
	else{
		//echo "Device error: ".$devId;
		exit();
	}


?>