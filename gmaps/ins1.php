#!/usr/bin/env php

<?php

	$conn=mysqli_connect("localhost","root","","data");
//Check Connection
if(!$conn)
{
die("Connection Failed:".mysqli_connect_error());
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
		


		function table_exists($tablename, $database = false) {

    if(!$database) {
        $res = mysql_query("SELECT DATABASE()");
        $database = mysql_result($res, 0);
    }

    $res = mysql_query("
        SELECT COUNT(*) AS count 
        FROM information_schema.tables 
        WHERE table_schema = '$database' 
        AND table_name = '$tablename'
    ");

    return mysql_result($res, 0) == 1;

}
		$lati=$latitude/100; 
		$longi=$longitude/100;

		$lati=round((($lati-($lati%100))*100/60+($lati%100)),5);
		$longi=round((($longi-($longi%100))*100/60+($longi%100)),5);
		
		$longDir=$eastorwest;
		$latDir=$northorsouth;

		if($longDir=="S") $lati=$lati-(2*$lati);
		if($latDir=="W") $longi=$longi-(2*$longi);

		
		$sql="INSERT INTO `vehicles`( `reg_no`, `speed`, `signal_wire`, `power`, `latitude`, `longitude`, `date`) VALUES('$reg_no','$vehiclespeed','$signalwire','$mainpowersupply','$lati','$longi','$datatime')ON DUPLICATE KEY UPDATE `speed`='$vehiclespeed',`signal_wire`='$signalwire',`power`='$mainpowersupply',`latitude`='$lati',`longitude`='$longi',`date`='$datatime';";
		if(table_exists('$reg_no', 'demo')) {
    // do something
		$query="INSERT INTO `$reg_no`( `reg_no`, `speed`, `signal_wire`, `power`, `latitude`, `longitude`, `date`) VALUES ('$reg_no','$vehiclespeed','$signalwire','$mainpowersupply','$lati','$longi','$datatime');";
		mysqli_query($conn,$query) or die($conn) ;
			}
			else {
			    // do something else
			    $sql1="CREATE TABLE if NOT EXISTS `$reg_no` ( `id` INT(225) NOT NULL AUTO_INCREMENT , `reg_no` VARCHAR(225) NOT NULL , `speed` VARCHAR(225) NOT NULL , `signal_wire` VARCHAR(225) NOT NULL , `power` VARCHAR(225) NOT NULL , `latitude` VARCHAR(225) NOT NULL , `longitude` VARCHAR(225) NOT NULL , `date` INT(225) NOT NULL , PRIMARY KEY (`id`));";
			    
			    
			    if (mysqli_query($conn,$sql1)===true ) {
			    	# code...
			    	$query1="INSERT INTO `$reg_no`(`reg_no`, `speed`, `signal_wire`, `power`, `latitude`, `longitude`, `date`) VALUES ('$reg_no','$vehiclespeed','$signalwire','$mainpowersupply','$lati','$longi','$datatime');";
			    	mysqli_query($conn,$query1);
			    } 
			    else {
			    	# code...
			    	echo "what the heal";
			    }
			    
			}

//replace records or update
			
   // $sql2="INSERT INTO `datas`(`message`) values ('$input')";
    //create atable if not exists else insert     
	

        //$query = mysqli_query($conn,$sql) or die($conn);
        //$query2 = mysqli_query($conn,$sql2) or die($conn);
        
        if (mysqli_query($conn,$sql)or die($conn)) {
		    echo "inserted";
		} else {
		    echo "failed" ;
		}
		/* if (!mysqli_query($conn,$sql2)) {
		     echo "failed";
		 }
	//ex}
	else{
		//echo "Device error: ".$devId;
		exit();
	}*/

?>
