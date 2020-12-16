<?php
session_start();
require 'db.php';
$company=$_SESSION['company'];
$unique=$_SESSION['unique'];
$cus_name=mysqli_real_escape_string($conn, $_POST['name']);
//sql query
$sql="UPDATE `client_account` SET `username`='$cus_name' WHERE `key`='$unique'";
$query=mysqli_query($conn,$sql);
header('location:view_account.php');