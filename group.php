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
  SELECT * from work WHERE  `date` LIKE '%".$search."%'  GROUP BY date LIMIT 10";
}
else
{
 $query = "
  SELECT * from work GROUP BY `date`  ORDER BY id DESC limit 10
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '

                                    <tr>
                                    <th>UNIQUE ID</th>
                                    <th>VEHICLE</th>
                                    <th>SERVICE</th> 
                                    <th>TECHNICAN</th>
                                    <th>DEALER</th>
                                    <th>COMMENT</th>
                                    <th>INST DATE</th>
                                    <th>USER</th>
                                    <th>DATE</th>
                                    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $vin=$row['vin_no'];
  $date=$row['date'];
  $output .= '
   <tr>
    <td><a href="view.php?id='.$vin.'">'.$row['vin_no'].'</a></td>
    <td> '.$row['reg_no'].'</td>    
    <td>'.$row['problem'].'</td>
    <td>'.$row['tech'].'</td>
    <td>'.$row['dealer'].'</td>
    <td>'.$row['action'].'</td>
    <td>'.$row['date'].'</td>
    <td>'.$row['user'].'</td>
    <td><a href="excel_data.php?serial='.$date.' " target="_blank"><button>export</button></a></td>
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