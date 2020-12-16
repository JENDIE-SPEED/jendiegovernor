<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jendie";

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
    $postData = file_get_contents('php://input');
    
    $filePath = "messages.log";
    //error log
    $errorLog = "errors.log";
    //Parse payload to json
    $jdata = json_decode($postData);
    $date=date('Y-m-d');
    $serial =$jdata->serial;
    $serial='0'.$serial;
    //Insert into database
    $sql = "SELECT * FROM data where vehicle='$serial' and `date`='$date'";

    if ($conn->query($sql) === TRUE) {
        $resp = '{"ResultCode": 1, "success":"Validation success"}';
      echo $resp;
    } else {
    $resp = '{"ResultCode": 0, "failed":"Validation failed"}';
      echo $resp;
    }

    
    //perform business operations here
    //open text file for logging messages by appending
    $file = fopen($filePath,'a');
    //log incoming request
    fwrite($file, $postData);
    fwrite($file,"\r\n");
} catch (Exception $ex){
    //append exception to file
    $logErr = fopen($errorLog,'a');
    fwrite($logErr, $ex->getMessage());
    fwrite($logErr,"\r\n");
    fclose($logErr);
    //set failure response
    $resp = '{"ResultCode": 1, "ResultDesc":"Validation failure due to internal service error"}';
}
    

?>