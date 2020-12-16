<?php
session_start();
require 'auth.php';
include 'db.php';
$company=$_SESSION['company'];

$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * from incident WHERE vin_no LIKE '%".$search."%' OR reg LIKE '%".$search."%'";
}
else
{
 $query = "
  SELECT * from incident  GROUP BY vin_no 
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '

                                    <tr>
                                    <th>ID</th>
                                    <th>VEHICLE</th>
                                    <th>INCIDENT</th> 
                                    <th>COMMENT</th>

                                    
                                    <th>DATE</th>
                                    
                                    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $vin=$row['vin_no'];
  $output .= '
   <tr>
    <td>'.$row['vin_no'].'</td>
    <td> <a href="vehicles.php?id='.$vin.'">'.$row['reg'].'</a></td> 
    <td> '.$row['incident'].'</td>   
    <td>'.$row['comment'].'</td>
    
    <td>'.$row['date'].'</td>
    
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>