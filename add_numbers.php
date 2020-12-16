<?php
$conn = mysqli_connect("localhost","root", "JAMESKINUTHIA", "alexa");
if (!$conn) {
    # code...
    die("Connection Failed:".mysqli_connect_error());
}
$select="select * from off";
$query=mysqli_query($conn,$select);
while ($rows=mysqli_fetch_array($query)) {
	# code...
	$serial=$rows['serial'];
	$sql="SELECT * from alocate_serial where `serial`='$serial'";
	$james=mysqli_query($conn,$sql) or die($conn);
	$key=mysqli_fetch_array($james);
	$number=$key['phone'];
	$alan="UPDATE off set `date`= '$number' where `serial`='$serial'";
	mysqli_query($conn,$alan);
	echo $serial;

}
echo "yess";
?>
