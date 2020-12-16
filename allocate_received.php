<?php
session_start();
require 'db.php';
$company=$_SESSION['company'];
$serial=$_GET['id'];
$sql="UPDATE alocate_serial set alocate=1 where `serial`='$serial'";
$query=mysqli_query($conn,$sql) ;
if ($query===true) {
	# code...
	header('location:receive_stock.php');
} else {
	# code...
	echo "record not transfered";
	
}