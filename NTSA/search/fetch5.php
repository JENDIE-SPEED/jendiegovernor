<?php
session_start();
include 'db.php';
$company=$_SESSION['company'];

$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * from work WHERE   vin_no LIKE '%".$search."%' OR reg_no LIKE '%".$search."%' OR chasis LIKE '%".$search."%' OR serial LIKE '%".$search."%' LIMIT 4";
}
else
{
 $query = "
  SELECT * from work  ORDER BY id DESC  LIMIT 0
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '

                                    <tr>
                                    <th>UNIQUE ID</th>
                                    <th>VEHICLE</th>
                                    <th>CHASIS</th>
                                    <th>INST DATE</th>
                                    <th>LOG</th>
                                    
                                    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $vin=$row['vin_no'];
  $serial=$row['serial'];
  $output .= '
   <tr>
    <td>'.$row['vin_no'].'</td>
    <td> '.$row['reg_no'].'</td>    
    <td> '.$row['chasis'].'</td>
    <td>'.$row['date'].'</td>
    
    <td><a href="view1.php?serial='.$serial.'"><button>ALL DATA</button></a></td>
    
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