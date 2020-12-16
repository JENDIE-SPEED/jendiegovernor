<?php
session_start();
include 'auth.php';
include 'db.php';
$company=$_SESSION['company'];
$user=  $_SESSION['user'];
$serial=$_SESSION['serial'];
$amount= '575.00';
$data='alan';
// fetch json from db ntsa
$code=mysqli_real_escape_string($conn,$_POST['code']);
$sql="SELECT * from payments where `TransID`='$code'and `TransAmount`='575.00' ";
$query=mysqli_query($conn,$sql);
if (mysqli_num_rows($query)>0) {
	# code...
	$sql2="SELECT * from work where `code`='$code'";
	$query2=mysqli_query($conn,$sql2);
	if (mysqli_num_rows($query2)>0) {
		# code...
		echo "THIS TRANSACTION IS INVALID";
	} else {
		# code...
		$date=date('d-m-Y');
		$sql3="UPDATE work SET `code`='$code',`dealer-renew`='$company',`date`='$date',`problem`='RENEWAL' where `serial`='$serial'";
		$query3=mysqli_query($conn,$sql3);
		if ($data=='james') {
			# code...
			$sql4="UPDATE work SET status= 1 where `serial`='$serial'";
		$query4=mysqli_query($conn,$sql4);
		header('location:checker.php');
		} 
		else {
			# code...
			echo "NO DATA FOR THE LAST 24HRs VISIT THE NEAREST DEALER TO CHECK YOUR VEHICLE OR CALL 0720522544";
		}
		
		

	}
	
} else {
	# code...
	echo "ERROR PAYMENTS NOT MADE";
}
//ALTER TABLE `work` ADD `status_renew` INT(5) NOT NULL DEFAULT '0' AFTER `dealer-renew`;