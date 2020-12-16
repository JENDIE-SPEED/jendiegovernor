<?php
include 'db.php';
$sql="select * from work limit 10";
$query=mysqli_query($conn,$sql) or die($conn);
while ($row=mysqli_fetch_array($query)) {
	# code...
$connection = mysqli_connect("3.134.214.157","root", "jameskinuthia", "alexa");
if (!$conn) {
	# code...
	die("Connection Failed:".mysqli_connect_error());
}
  $reg=$row['reg_no' ];
  $contact=$row['contact']; 
  $cus_name=$row['cus_name']; 
  $make=$row['make']; 
  $model=$row['model']; 
  $vin=$row['vin_no']; 
  $chasis=$row['chasis']; 
  $company=$row['dealer']; 
  $problem=$row['problem']; 
  $action=$row['action']; 
  $tech=$row['tech']; 
  $serial=$row['serial']; 
  $date=$row['date']; 
  $user=$row['user'];
$insert="INSERT INTO `work`(`reg_no`, `contact`, `cus_name`, `make`, `model`, `vin_no`, `chasis`, `problem`, `action`, `tech`, `serial`, `date`,`dealer`,`user`) VALUES('$reg','$contact','$cus_name','$make','$model','$vin','$chasis','$problem','$action','$tech','$serial','$date','$company','$user')";
$like=mysqli_query($connection,$insert)or die($connection);
if ($like===true) {
	# code...
	echo "yesss";
	echo"\n";
} else {
	# code...
	echo "naaaaaah";
	echo"\n";
}

 mysqli_close($connection); 
}


