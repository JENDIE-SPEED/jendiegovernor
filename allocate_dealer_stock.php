<?php
session_start();
require 'db.php';

$dealer=mysqli_real_escape_string($conn,$_POST['dealers']);

$date=date('Y-m-d');

$_SESSION['dealer']=$dealer;
$watu=$_SESSION['dealer'];

 /*$list = $_POST['framework'];

$items=implode( ", ", $list );

$devices=explode(",",$items) ;*/
/*$connect = mysqli_connect("localhost", "root", "", "testing");*/
if(isset($_POST["framework"]))
{
	
	$list = $_POST['framework'];
	$framework=$_POST["framework"];
	$num=count($list);
for($i=0; $i < $num;$i++)
         {
         	$serial=$framework[$i];
 $query = "UPDATE work set defaulter='$dealer' where `serial`='$serial'";
 mysqli_query($conn, $query);
 
}
 header('location:accounts.php');
}
/*
for ($i=0; $i <count($devices) ; $i++) { 
	# code...
	$serial=$items;
	$sql="UPDATE alocate_serial set alocate=0,dealer='$dealer' where `serial`='$serial'";

$query=mysqli_query($conn,$sql) ;
if ($query===true) {
	# code...
	$s="INSERT INTO `ledger`( `serial`, `date`, `vendor`) VALUES('$serial','$date','$dealer')";
mysqli_query($conn,$s) or die($conn) ;
echo $serial;
	
} else {
	# code...
	echo "record not transfered";
	
}
}
*/

?>