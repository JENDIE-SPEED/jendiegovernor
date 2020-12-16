<?php
session_start();
require 'db.php';
require 'auth.php';
$company=$_SESSION['company'];
$serial=$_GET['serial'];
$cus_name=$_SESSION['cus_name'];
$password=$_SESSION['cus_password'];
$unique=uniqid();
$date=date('Y-m-d');
$sql="INSERT INTO client_account (`username`,`password`,`key`,`rights`) VALUES('$cus_name','$password','$unique','$company'); ";

if ($query=mysqli_query($conn,$sql)===true) {
	# code...
	$new="CREATE TABLE `$unique` ( `id` INT(5) NOT NULL AUTO_INCREMENT , `serial` VARCHAR(225) NOT NULL UNIQUE, `date` VARCHAR(225) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
$new_query=mysqli_query($conn,$new);
$insert="INSERT IGNORE INTO $unique (`serial`,`date`) VALUES('$serial','$date');";
$insert_query=mysqli_query($conn,$insert);
} else {
	# code...
	$select="SELECT * FROM client_account WHERE password='$password';";
	$select_query=mysqli_query($conn,$select);
	$row=mysqli_fetch_array($select_query);
	$key=$row['key'];
	$insert="INSERT IGNORE INTO $key (`serial`,`date`) VALUES('$serial','$date');";
	$insert_query=mysqli_query($conn,$insert);
}





header('location:view_account.php');