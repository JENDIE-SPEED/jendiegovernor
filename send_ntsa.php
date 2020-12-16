<?php
//API URL
$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,"http://bigmachini.net:22023/speedlimiter");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,'2019/9/20 10:17:10,868714043801783,JENDIE,KCQ 593D,0,36.820030,East,-1.285790,South,0,1');


	// Receive server response ...
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	echo $server_output = curl_exec($ch);

	curl_close ($ch);
?>