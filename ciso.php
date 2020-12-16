<?php
$conn = mysqli_connect("localhost", "root", "jameskinuthia", "alexa");
$sql="select select DISTINCT reg_no from work where cus_name like '%SCICO%' ";
$query=