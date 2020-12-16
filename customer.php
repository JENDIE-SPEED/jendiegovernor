<?php

$conn = mysqli_connect("localhost","root", "jameskinuthia", "alexa");
if (!$conn) {
    # code...
    die("Connection Failed:".mysqli_connect_error());
}
if(isset($_POST['submit'])){
$cus=$_POST['cus'];

$filename = "report_".date('Ymd') . ".xls";
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");
$isPrintHeader = false;
$sql="SELECT`id`,`reg_no`,`contact`,`cus_name`,`make`,`model`,`chasis`,`dealer`,`serial`,`date` from work WHERE `cus_name`like'% $cus%' ";
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