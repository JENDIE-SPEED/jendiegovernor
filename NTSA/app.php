<?php
$servername = "localhost";
$username = "root";
$password = "jameskinuthia";
$dbname = "alexa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
try
{
    //Set the response content type to application/json
    header("Content-Type:application/json");
    //$resp = '{"ResultCode":0,"ResultDesc":"Validation passed success"}';
    //read incoming request
    //$postData = file_get_contents('php://input');
   
    //$filePath = "messages.log";
    //error log
    //$errorLog = "errors.log";
    //Parse payload to json
    //$jdata = json_decode($postData);
    $date=date('d-m-Y');
    $serial =$_GET['serial'];
    $serial='0'.$serial;
	//echo $serial;
    //Insert into database
    $sql = "SELECT * FROM data1 WHERE vehicle = '$serial' and velocity !='0KM/H' AND `date` = '$date' limit 1";

		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
        @$myObj->message = "success";
		$myJSON = json_encode($myObj);
		echo $myJSON;
		}else{
		@$myObj->message = "fail";
		$myJSON = json_encode($myObj);
		echo $myJSON;	
		}

   
    //perform business operations here
    //open text file for logging messages by appending
    //$file = fopen($filePath,'a');
    //log incoming request
    //fwrite($file, $postData);
    //fwrite($file,"\r\n");
} catch (Exception $ex){
    //append exception to file
    //$logErr = fopen($errorLog,'a');
    //fwrite($logErr, $ex->getMessage());
    //fwrite($logErr,"\r\n");
    //fclose($logErr);
    //set failure response
    $resp = 'error';
	echo $ex;
}
   

?>