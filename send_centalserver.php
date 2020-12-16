<?php

//API Url
$url = 'http=>//example.com/api/JSON/create';

//Initiate cURL.
$ch = curl_init($url);

//The JSON data.
$jsonData = array(
  "calibrated_speed"=> "450",
  "fitting_date"=> "22-08-2019",
  "limiter_serial"=> "9571757345360857311",
  "limiter_type"=> "JENDIE",
  "accountNumber"=> "6571757345360887311",
  "user_id"=> 1,
  "vehicle_chassis_no"=> "KDH201-0104391",
  "vehicle_make"=> "TOYOTA",
  "vehicle_type"=> "HIACE",
  "vehicle_max_speed"=> "80",
  "vehicle_reg_no"=> "KCR 12T",
  "owner_full_name"=> "john doe",
  "owner_number"=> "254712345678",
  "owner_email"=> "email@eamil.com",
  "apn"=> "airtel",
  "sacco"=> "sacco name"
);

//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);

//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);

//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type=> application/json')); 

//Execute the request
$result = curl_exec($ch);
?>