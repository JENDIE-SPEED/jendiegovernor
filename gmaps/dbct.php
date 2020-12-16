<?php
session_start();
require_once '../encrypt/classes/Cryptography.php';
$conn=mysqli_connect("localhost","root","","roadsafety");
//Check Connection
if(!$conn)
{
die("Connection Failed:".mysqli_connect_error());
}
$email=mysqli_real_escape_string($conn,$_POST['user']);
$work=mysqli_real_escape_string($conn,$_POST['pass']);

$sql="SELECT * FROM admin WHERE email='$email'";
$query=mysqli_query($conn,$sql);
$num=mysqli_num_rows($query);
$row=mysqli_fetch_array($query);
extract($row);

if ($num>=1) {
	# code...
	$crypted=$row['password'];
	
    $decrypt = Cryptography::decrypt($crypted);
	if (strcmp($decrypt,$work) === 0) {
		# code...
	$_SESSION['company']=$row['company_name'];
	$_SESSION['email']=$row['email'];
	header('location:../main/');
	} else {
		# code...
		echo "invalid username or password \n";
		
	}
	
	
}
else{
	echo "invalid code";
} 

?>