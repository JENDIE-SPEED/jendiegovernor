<?php	
//The URL with parameters / query string.
$url = 'http://47.56.158.70:8011//GetDateServices.asmx/GetDate?method=SendCommandsSpecial&cmd=DRIVING_RECORD_SETTING&macid=016600000191&param=58682,21531,26526,KCF272L,781863,ISUZU/5VEHICLE,AGL3800041,5184,16600000191,12/20/2019 08:59:29,15632,71546,82874,82874,1934,9527';
 
//Once again, we use file_get_contents to GET the URL in question.
$contents = file_get_contents($url);
 
//If $contents is not a boolean FALSE value.
if($contents !== false){
    //Print out the contents.
    echo $contents;
}
?>