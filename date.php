<?php
$conn = mysqli_connect("localhost","root", "jameskinuthia", "alexa");
if (!$conn) {
    # code...
    die("Connection Failed:".mysqli_connect_error());
}
$date=date("d-m-Y", strtotime("-3 day"));
$sql="delete from data where date='$date'";
$query=mysqli_query($conn,$sql);
?>