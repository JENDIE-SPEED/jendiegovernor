<?php
session_start();
require 'db.php';



  $username=mysqli_real_escape_string ( $conn, $_POST ['uname']);
	$password = mysqli_real_escape_string ( $conn, $_POST ['password']);
  $sql=" SELECT * FROM `client_account` where password='$password' ";
  $result = mysqli_query($conn,$sql);
 if (mysqli_num_rows($result)>0) {
   # code...
  $row = mysqli_fetch_array ($result);
  $key=$row['key'];
  header('location:list_vehicels.php?unique='.$key.'');
 } else {
   # code...
  echo "invalid login";
  echo $username;
  echo " n ";
  echo $password;
 }
 

?>