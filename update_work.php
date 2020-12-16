<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2/16/2020
 * Time: 9:50 PM
 */
require 'db.php';
//Be sure to include the file you've just downloaded
    // Specify your login credentials


if(isset($_POST['update'])){

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

if(mysqli_query($conn, $query)) {
	$url = "http://jendientsa.co.ke/search/update.php"; // change this!
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($_POST));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	$response = curl_exec($ch);
	// $response will contain the output of the OTHER website processing the form submission
	// you can echo it to the screen or do your own processing if you want.
	echo $response;
    
    header("location:insurance.php");
}
    else{
    echo "fail";
}



}
?>