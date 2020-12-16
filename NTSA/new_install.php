<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2/16/2020
 * Time: 9:50 PM
 */
require 'db.php';
//Goes to ntsa system

	$cus_name=$_POST['cus_name'];
	$contact=$_POST['contact'];
	$make=$_POST['make'];
	$model=$_POST['model'];
	$chasis=$_POST['chasis'];
	$reg = $_POST['reg_no'];
	$tech = $_POST['tech'];
	$serial=$_POST['serial'];
	$problem = $_POST['problem'];
	$action=$_POST['action'];

   $sql="INSERT INTO `work`(`reg_no`, `contact`, `cus_name`, `make`, `model`, `vin_no`, `chasis`, `problem`, `action`, `tech`, `serial`, `date`,`dealer`,`user`) VALUES('$reg','$contact','$cus_name','$make','$model','$vin','$chasis','$problem','$action','$tech','$serial','$date2','$company','$user')";

   $result=mysqli_query($conn,$sql) ;
	
	?>