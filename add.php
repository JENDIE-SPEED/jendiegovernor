<?php
session_start();
require 'auth.php';
include 'db.php';
$shortcode = mysqli_real_escape_string($conn, $_POST['shortcode']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$user = mysqli_real_escape_string($conn, $_POST['user']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$select = mysqli_real_escape_string($conn, $_POST['select']);
$sql = "INSERT INTO `product`(`shortcode`, `product_title`, `price`, `user`, `description`, `category`, `subscribers`) VALUES('$shortcode','$title','$price','$user','$description','$select','0') ";
$result = mysqli_query($conn, $sql);
if ($result===true) {
	# code...
	header('location:product-list.php');
} else {
	# code...
	echo "something went wrong";
}
?>