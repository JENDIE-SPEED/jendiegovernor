<?php
$conn=mysqli_connect("localhost","root","","data");
//Check Connection
if(!$conn)
{
die("Connection Failed:".mysqli_connect_error());
}
?>