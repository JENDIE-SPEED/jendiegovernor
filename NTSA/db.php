<?php
$conn = mysqli_connect("localhost","root", "jameskinuthia", "alexa");
if (!$conn) {
	# code...
	die("Connection Failed:".mysqli_connect_error());
}
?>