<?php

include 'db.php';

if(isset($_POST['submit'])){
$to=$_POST['to'];
// Creating timestamp from given date
$timestamp_to = strtotime($to);
 
// Creating new date format from that timestamp
$new_to = date("Y-m-d", $timestamp_to); 
					
$from=$_POST['from'];
// Creating timestamp from given date
$timestamp_from = strtotime($from);
 
// Creating new date format from that timestamp
$new_from = date("Y-m-d", $timestamp_from);
$filename = "report_".date('Ymd') . ".xls";
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");
$isPrintHeader = false;
$sql="SELECT`id`,`reg_no`,`contact`,`cus_name`,`make`,`model`,`chasis`,`dealer`,`serial`,`date` from work WHERE `date` BETWEEN '$new_from' AND '$new_to' ";
$product = mysqli_query($conn,$sql);
if($product){
while($result = mysqli_fetch_array($product)){
	if (! $isPrintHeader) {
		echo @implode("\t", @array_keys($result)) . "\n";
		$isPrintHeader = true;
	}else{
	echo @implode("\t", @array_values($result)) . "\n";
	}
}
}
 exit();
}
header("location:report_date.php");

?>