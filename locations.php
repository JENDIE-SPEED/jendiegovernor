<?php
	/*
		$server     = 'localhost';
$username   = 'root';
$password   = 'jameskinuthia';
$database   = 'alexa';

$dsn        = "mysql:host=$server;dbname=$database";
try {

$db = new PDO($dsn, $username, $password);
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$sth = $db->query("SELECT * FROM locations");
$locations = $sth->fetchAll();
	*/
	$lat = 23.6838716;
	$lng = 73.37194090000003;
	echo '{"lat":"'.$lat.'", "lng":"'.$lng.'"}';
?>