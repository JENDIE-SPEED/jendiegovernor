<?php
session_start();
include 'db.php';
$company=$_SESSION['company'];
if (isset($company)) {
	# code...
	$id=$_GET['id'];
	
	$sql="INSERT into suspend_tech select *from `technician` where id ='$id' ";
	$query=mysqli_query($conn,$sql);
	if ($query===true) {
		# code...
		$sql1="DELETE from `technician` where id='$id'";
		$query=mysqli_query($conn,$sql1);
		header('location:presenter-list.php');
	} else {
		# code...
		echo "invalid";
	}
	
} else {
	# code...
	header('location:logout.php');
}


?>