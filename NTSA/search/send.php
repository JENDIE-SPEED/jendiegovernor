<?php
	header('Content-Type: text/json');
include 'db.php';
$sql= "SELECT * FROM work ";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result))
{
  extract($row);
  $data = array(
  "vehicle_reg" => 'kaz',
  "contact" => 'kaz',
     "cus_name" =>'kaz', 
     "make" => 'kaz',
     "vin_no" => 'kaz',
     "chasis" => 'kaz',
     "dealer" => 'kaz',
     "action" => 'kaz',
     "tech" => 'kaz',
     "serial" => 'kaz',
     "date" => 'kaz',
     "user" => 'kaz',
     "model" => 'kaz'
);
}

$url_send ="http://jendientsa.co.ke/search/recive.php";
$str_data = json_encode($data);

echo $str_data."\n";

function sendPostData($url, $post){
	
	 
	 
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
  //curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
  $result = curl_exec($ch);
  curl_close($ch);  // Seems like good practice
  return $result;
}

echo " " . sendPostData($url_send, $str_data);




?>