<?php
session_start();
require 'db.php';


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
 $query = "UPDATE alocate_serial set alocate=1 where `serial`='$serial'";
 mysqli_query($conn,$query) or die($conn);
 
}
 header('location:index-1.php');
}