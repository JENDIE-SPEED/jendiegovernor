<?php
session_start();
include('dbconnect.php');
$date=date();
$txtitem=$_POST['item'];

$txtsrp=$_SESSION['alocate'];
$gov=str_replace("SN:","","$txtitem");

$sql="INSERT INTO barcode(itemcode,item) VALUES ('".$gov."','".$txtsrp."')";
if(!mysql_query($sql,$con))
{
die('Error:'.mysql_error());
}
else
{
	$query = "UPDATE alocate_serial set alocate=0,dealer='$txtsrp' where `serial`='$gov'";
	mysql_query($query,$con);
	$s="INSERT INTO `ledger`( `serial`, `date`, `vendor`) VALUES('$serial','$date','$txtsrp')";
    mysql_query($s,$conn);
}
header('location:index.php');
mysql_close($con);
?>