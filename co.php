<?php
// Connects to your Database 
$conn = mysqli_connect("localhost","root", "", "alexa");
if (!$conn) {
	# code...
	die("Connection Failed:".mysqli_connect_error());
}
    

$sql="SELECT alan.vehicle,alan.number,offline.airtel FROM alan INNER JOIN offline ON alan.number!=offline.airtel";
$query=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_array($query)) {
	# code...
	$vehicle=$row['vehicle'];
	$number=$row['number'];
	// $q="INSERT INTO allan2 (`vehicle`,`number`) values('$vehicle','$number')";
	// $s=mysqli_query($conn,$q);

}
?> 