<?php
session_start();
require 'db.php';

$dealer=mysqli_real_escape_string($conn,$_POST['dealers']);
$date=date('Y-m-d');

$sql="SELECT * FROM `client_account` WHERE password='$dealer'";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($query);
$unique=$row['key'];
// echo $unique;

if(isset($_POST["framework"] ))
{
	
	$list = $_POST['framework'];
	$framework=$_POST["framework"];
	$num=count($list);
for($i=0; $i < $num;$i++)
         {
         	 $serial=$framework[$i];
         	// echo $unique;
 $q = "INSERT IGNORE INTO $unique(`serial`,`date`) VALUES('$serial','$date')";
       mysqli_query($conn, $q) or die($conn);
 
 	
}
 header('location:list_vehicels.php?unique='.$unique);
}
else
{
	echo "weeeeeel";
}


?>