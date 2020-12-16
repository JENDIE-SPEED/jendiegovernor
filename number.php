<?php

include 'db.php';

$sql="SELECT * FROM alocate_serial ";
$query=mysqli_query($conn,$sql);

while ($row = mysqli_fetch_array($query)) {
	# code...
	$serial=$row['serial'];
	$number=$row['phone'];
	$update="UPDATE work set `phone`=`$number` where `serial`='$serial'";
	mysqli_query($conn,$update);
}
echo "good";
?>