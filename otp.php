<?php
session_start();
include 'db.php';
require 'auth.php';
$email=$_SESSION['user'];
$otp=mysqli_real_escape_string($conn, $_POST['otp']);
/*$sql="SELECT * FROM otp where email='$email'";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($query);*/
$onetime='1234';
$rits='8456';
$alan='1234';
$role=$_SESSION['role'];
  
	# code...
	if (strcmp($otp, $onetime) === 0 && ($role==='admin' ))
	{
		
    
		header('location:index-1.php');
	}
	
	elseif (strcmp($otp, $onetime) === 0  && $role==='accounts') {
		# code...
		header('location:accounts.php');
	}
	elseif (strcmp($otp, $onetime) === 0  && ($role==='dealers')) {
		# code...
		header('location:index-1.php');
	}
	elseif (strcmp($otp, $onetime) === 0  && ($role==='user')) {
		# code...
		header('location:index-1.php');
	}
	elseif (strcmp($otp, $onetime) === 0  && ($role==='super admin')) {
		# code...
		header('location:switch.php');
	}
	elseif (strcmp($otp, $rits) === 0  && ($email==='ritzcartrackandtracing@gmail.com')) {
		# code...
		header('location:index-1.php');
	}
	else
	{
		header('location:otp.html');
	}
?>