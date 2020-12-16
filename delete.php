<?php
session_start();
require 'db.php';
$unique=$_GET['unique'];
$name=$_GET['name'];
$sql="DELETE from $unique where `serial`='$name'";
$query=mysqli_query($conn,$sql);
header('location:delete_vehicles.php?unique='.$unique);