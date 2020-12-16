<?php
session_start();
require 'auth.php';
include 'db.php';
$company=$_SESSION['company'];
$email=mysqli_real_escape_string($conn,$_POST['dealers']);
$price=mysqli_real_escape_string($conn,$_POST['price']);
$sql="UPDATE users set renewal='$price' where email='$email'";
$query=mysqli_query($conn,$sql);
header('location:accounts.php');
?>