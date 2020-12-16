<?php
include'db.php';
try
{
    //Set the response content type to application/json
    header("Content-Type:application/json");
    $resp = '{"ResultCode":0,"ResultDesc":"Validation passed success"}';
    //read incoming request
    $postData = file_get_contents('php://input');
    //$filePath = "messages.log";
    //error log
    //$errorLog = "errors.log";
    //Parse payload to json
    $jdata = json_decode($postData,true);
    
    $sql="SELECT * FROM work WHERE `serial`= $jdata";
    $query=mysqli_query($conn,$sql);
    if (mysqli_num_rows($query)>0) {
        # code...
        $date=date('Y-m-d');
        $serial='0'.$jdata;
        $sql1="SELECT * from data where vehicle='$serial' and `date`='$date'";
        $query1=mysqli_query($conn,$sql1);
        if (mysqli_num_rows($query1)>0) {
            # code...
            $resp = '{"ResultCode": 1, "ResultDesc":"Validation success"}';
            echo $resp;
        } else {
            # code...
            $resp = '{"ResultCode": 0, "ResultDesc":"Validation failure due to no data"}';
            echo $resp;
        }
        
    } else {
        # code...
        $resp = '{"ResultCode": 1, "ResultDesc":"Validation failure due to internal service error"}';
        echo $resp;
    }
    
    //perform business operations here
    //open text file for logging messages by appending
    //$file = fopen($filePath,'a');
    //log incoming request
    //fwrite($file, $postData);
    //fwrite($file,"\r\n");
} catch (Exception $ex){
    //append exception to file
    $logErr = fopen($errorLog,'a');
    fwrite($logErr, $ex->getMessage());
    fwrite($logErr,"\r\n");
    fclose($logErr);
    //set failure response
    $resp = '{"ResultCode": 1, "ResultDesc":"Validation failure due to internal service error"}';
}
    //log response and close file
    fwrite($file,$resp);
    fclose($file);
    //echo response
    echo $resp;

?>