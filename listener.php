<?php
try
{
    //Set the response content type to application/json
    header("Content-Type:application/json");
    $conn = mysqli_connect("localhost","root", "JAMESKINUTHIA", "alexa");
    if (!$conn) {
        # code...
        die("Connection Failed:".mysqli_connect_error());
    }
    //read incoming request
    $postData = file_get_contents('php://input');
    $filePath = "messages.log";
    //error log
    $errorLog = "errors.log";
    //Parse payload to json
    $obj = json_decode($postData,true);
    //perform business operations here

    // $number=$obj->{'MSISDN'};
    // //print " ";
    // $first_name= $obj->{'FirstName'};
    // $second_name=$obj->{'MiddleName'};
    // $last_name= $obj->{'LastName'};

    // $TransID=$obj->{'TransID'};
    // $TransTime=$obj->{'TransTime'};
    // $OrgAccountBalance=$obj->{'OrgAccountBalance'};
    // $TransAmount=$obj->{'TransAmount'};

    //     $sql = "INSERT INTO payments (TransactionType, TransID, TransTime, TransAmount, BusinessShortCode, BillRefNumber, OrgAccountBalance, MSISDN, FirstName, MiddleName, LastName)
    //         VALUES ('paid', '$TransID', '$TransTime', '$TransAmount', 'null', 'null', '$OrgAccountBalance', '$number', '$first_name', '$second_name', '$last_name')";
    //     $query=mysqli_query($conn,$sql);
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
    //log response and close file
    fwrite($file);
    fclose($file);
    //echo response
    

?>