<?php


//$url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$url = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
//$credentials = base64_encode('fwuKVdHGbRvJLiNmrM3Mhs8dtobr8jmW:E0Bql4QVvSauA25k');
$credentials = base64_encode('nhat8G3V1sY5PYxiGkCA6URlTMiZcUp9:vNYTmDwG3ODPgrPX');
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
curl_setopt($curl, CURLOPT_HEADER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

  echo $curl_response = curl_exec($curl);

   $num=substr_replace( $curl_response ,"",0,226);
  echo $num2=substr($num, 0, -40);
  echo "<br>";

include 'token_db.php';

