<?php
session_start();
require 'auth.php';
include 'db.php';
$company=$_SESSION['company'];
$vin=$_SESSION['vin_no'];
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * from work WHERE dealer='$company' and vin_no LIKE '%".$search."%' OR reg_no LIKE '%".$search."%'";
}
else
{
 $query = "
  SELECT * from incident WHERE dealer='$company' and vin_no='$vin' ORDER BY id DESC  
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

                                    <th>TECHNICAN</th>
                                    <th>DATE</th>
                                    
                                    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $vin=$row['vin_no'];
  $output .= '
   <tr>
    <td>'.$row['vin_no'].'</td>
    <td> '.$row['reg'].'</td> 
    <td> '.$row['incident'].'</td>   
    <td>'.$row['comment'].'</td>
    <td>'.$row['tech'].'</td>
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