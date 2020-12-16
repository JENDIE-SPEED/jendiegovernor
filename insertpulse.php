<?php
session_start();
require 'auth.php';
include 'db.php';

$model= mysqli_real_escape_string($conn, $_POST['email']);
$number = mysqli_real_escape_string($conn, $_POST['number']);
$make=mysqli_real_escape_string($conn,$_POST['company']);
$sql="INSERT INTO `pulse`(`make`, `model`, `pulse`) VALUES('$make','$model','$number')";
$query=mysqli_query($conn,$sql);
if ($query==true) {
	# code...
	header('location:index-1.php');
} else {
	# code...
	echo "data not inserted";
}
