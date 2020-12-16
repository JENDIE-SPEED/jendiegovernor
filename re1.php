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
$date=date('d-m-Y');
$sql3="UPDATE work SET `code`='$code',`dealer-renew`='$company',`date`='$date',`problem`='RENEWAL',approve='1' where `serial`='$serial'";
$query3=mysqli_query($conn,$sql3);
// if ($data=='james') {
// 			# code...
// $sql4="UPDATE work SET status= 1 where `serial`='$serial'";
// $query4=mysqli_query($conn,$sql4);
header('location:approve1.php');
//ALTER TABLE `work` ADD `approve` INT(10) NOT NULL DEFAULT '0' AFTER `status_renew`;
		