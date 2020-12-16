<?php
session_start();
include 'db.php';
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$idnumber = mysqli_real_escape_string($conn, $_POST['idno']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$branch=mysqli_real_escape_string($conn,$_POST['branch']);
$dealer=$_SESSION['company'];
$sql="INSERT INTO `technician`( `first_name`, `second_name`, `phone`, `identification`, `branch`,`dealer`) VALUES ('$firstname','$lastname','$phone','$idnumber','$branch','$dealer')";
  $result=mysqli_query($conn,$sql) or die($conn);
  if ($result=== true) {
    # code...
    header('location:presenter-list.php');
  } else {
    # code...
    echo "something is wrong";
  }