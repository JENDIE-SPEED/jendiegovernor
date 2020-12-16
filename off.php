<?php
$conn = mysqli_connect("localhost","root", "jameskinuthia", "alexa");
if (!$conn) {
	
	die("Connection Failed:".mysqli_connect_error());
}
$sql="SELECT FROM off1 where date='never' ";
$query=mysqli_query($conn,$sql);
while ($a=mysqli_fetch_array($query)) {
    
    $serial=$a['serial'];
    $serial=substr($serial,-11);
    
    $sql1="select * from work where `serial`='$serial'";
    $query1=mysqli_query($conn,$sql1);
    $b=mysqli_fetch_array($query1);
    $vehicle=$b['reg_no'];
    $date=$b['date'];
    $cus_name=$b['cus_name'];
    $contact=$b['contact'];
    $sql_2="INSERT INTO `alan`(`serial`, `vehicle`, `inst`, `client`, `number`) 
    VALUES ('$serial','$vehicle','$date','$cus_name','$contact')";
    $query_2=mysqli_query($conn,$sql_2);
    echo nl2br($serial." \n");
}
echo nl2br("success \n");