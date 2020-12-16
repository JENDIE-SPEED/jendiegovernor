<?php
   $username="root";  
$password="";  
  $db="alexa";
//connection string with database  
$dbhandle = mysqli_connect("localhost","root", "JAMESKINUTHIA", "alexa") or die("Unable to connect to MySQL");  
 
//query fire  
$result = mysqli_query($dbhandle,"SELECT * FROM work order by id DESC LIMIT 100000");  
$json_response = array();  
// fetch data in array format  
while ($row = mysqli_fetch_array($result)) {  
// Fetch data of Fname Column and store in array of row_array  
$row_array['id'] = $row['id']; 
$row_array['contact'] = $row['contact']; 
$row_array['reg_no'] = $row['reg_no']; 
$row_array['cus_name'] = $row['cus_name']; 
$row_array['make'] = $row['make']; 
$row_array['model'] = $row['model']; 
$row_array['vin_no'] = $row['vin_no'];
$row_array['chasis'] = $row['chasis']; 
$row_array['dealer'] = $row['dealer']; 
$row_array['action'] = $row['action']; 
$row_array['tech'] = $row['tech'];
$row_array['serial'] = $row['serial']; 
$row_array['date'] = $row['date']; 
$row_array['user'] = $row['user'];
$row_array['defaulter']=$row['defaulter'];
$row_array['number']=$row['number'];
//push the values in the array  
array_push($json_response,$row_array);  
}  
//  
$url = 'http://jendientsa.co.ke/search/listener.php';
echo $payload=json_encode($json_response);
//create a new cURL resource
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

//set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

//return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execute the POST request
$result = curl_exec($ch);

//close cURL resource
curl_close($ch);

  
  ?>
  
