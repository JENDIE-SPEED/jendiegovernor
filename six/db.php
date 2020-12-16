<?php
$conn = mysqli_connect("localhost","root", "", "alexa");
if (!$conn) {
	# code...
	die("Connection Failed:".mysqli_connect_error());
}
?>
