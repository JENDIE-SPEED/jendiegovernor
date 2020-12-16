<?php
session_start();
require 'auth.php';
include 'db.php';
$shortcode = mysqli_real_escape_string($conn, $_POST['shortcode']);

$user = mysqli_real_escape_string($conn, $_POST['user']);
$sql = "INSERT INTO `presenter`(`name`, `short code`) VALUES ('$shortcode','$user')";
$result = mysqli_query($conn, $sql);
if ($result===true) {
	# code...
	header('location:presenter-list.php');
} else {
	# code...
	echo "something went wrong";
}
?>