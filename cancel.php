<?php
session_start();
require 'auth.php';
include 'db.php';
$company=$_SESSION['company'];
$id=$_GET['id'];
$serial=$_GET['serial'];
$select ="SELECT * from work where `serial`='$serial'";
$selected=mysqli_query($conn,$select);
$row=mysqli_fetch_array($selected) or die($conn);
$date=$row['date'];
//$date='2020-05-06';
$date1=strtotime($date);
$today=date('Y-m-d');
$today1=strtotime($today);
$months=( date('m',$today1) - date('m',$date1));

if ($months > '9') {
	# code...
	echo "this device can't be canceled because its for renewal in less than 2 MONTHS" ;
} else {
	# code...
	$sql="INSERT INTO canceled SELECT * FROM work WHERE `serial`='$serial'";
$query=mysqli_query($conn,$sql);
if ($query===true) {
	# code...
	$s="DELETE FROM work WHERE `serial`='$serial'";
	$sql1="UPDATE alocate_serial SET sold=0 where `serial`='$serial'";
$query=mysqli_query($conn,$s);
$query1=mysqli_query($conn,$sql1);
header('location:admin_cancel.php');

} else {
	# code...
	echo "error";
}
}


