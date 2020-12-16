<?php
session_start();
require 'db.php';
$company=$_SESSION['company'];
$vin=$_SESSION['vin'];
$incident=$_POST['incident'];
$comment=$_POST['comments'];
$reg=$_SESSION['reg'];
$date=date('d-m-Y');
$dealer= $_SESSION['dealer'];
$tech=$_SESSION['tech'];
$sql="INSERT INTO `incident`(`vin_no`, `comment`, `reg`, `date`, `dealer`, `tech`,`incident`) VALUES('$vin','$comment','$reg','$date','$dealer','$tech','$incident')";
$query=mysqli_query($conn,$sql);
if ($query===true) {
	# code...
	header('location:view_incident.php');
} else {
	# code...
	echo "error on inserting";
}

?>
