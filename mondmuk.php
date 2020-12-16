<?php

try

{

    //Set the response content type to application/json

    header("Content-Type:application/json");

    $resp='{"ResultCode":0,"ResultDesc":"Recieved successfully"}';

    //read incoming request

    $postData=file_get_contents('php://input');

    //log file

    $filePath="mess1.log";

    //error log

    $errorLog="errors.log";

    //Parse payload to json
    echo "JSON DECODE RESULTS";

   $jdata=json_decode($postData,true);
  // echo var_dump(json_decode($postData,true));

   //echo $result_param=$jdata['Result']['ResultParameters']['ResultParameter'];
 

    //perform business operations on $jdata here
     

    //open text file for logging messages by appending

    $file = fopen($filePath,"a");

    //log incoming request

    fwrite($file, $postData);

    fwrite($file,"\r\n");

    //log response and close file

    

    fclose($file);

} catch (Exception $ex){

    //append exception to errorLog

    $logErr= fopen($errorLog,"a");

    fwrite($logErr, $ex->getMessage());

    fwrite($logErr,"\r\n");

    fclose($logErr);

}

    //echo response

    echo $resp;