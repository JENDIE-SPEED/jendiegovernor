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

    $query = "update work set reg_no ='$reg', contact='$contact', cus_name='$cus_name', make='$make',model='$model',chasis='$chasis',problem='$problem',action='$action',tech='$tech' where serial = '$serial'";
	mysqli_query($conn, $query);
	?>