<?php
session_start();
require 'auth.php';
include 'db.php';
$location=$_POST['location'];
$sql="INSERT INTO `location`( `location`) VALUES ('$location')";
$query=mysqli_query($conn,$sql);
if ($query===true) {
	# code...
	header('location:index-1.php');
} else {
	# code...
	echo "location not inserted";
}

?>