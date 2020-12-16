<?php
session_start();
require ('auth.php');
include ('db.php');
$company=$_SESSION['company'];
$user=  $_SESSION['user'];
$code = $_GET['code'];
$date=date('Y-m-d');

if(isset($_GET['id'])){
	$id = $_GET['id'];
	
	$sql = "UPDATE work SET `code`='',`dealer-renew`='$company',`date`='$date', `amount`= '0',`problem`='INSTALLATION' where `id`='$id'";
	
	$query=mysqli_query($conn,$sql);
	if($query){
		header('location:transaction_detail.php?id='.$code.'&success=1');
	}else{
		header('location:transaction_detail.php?id='.$code.'&success=0');
	}
}

?>