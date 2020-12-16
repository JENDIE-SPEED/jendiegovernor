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
  SELECT * from work WHERE  `date` LIKE '%".$search."%' OR `dealer` LIKE '%".$search."%' OR `serial` LIKE '%".$search."%'  ";
}
else
{
 $query = "
  SELECT * from work  ORDER BY `id` DESC  LIMIT 10
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '

                                    <tr>
                                    <th>DATE</th>
                                    <th>SERIAL</th>
                                    <th>DEALER</th> 
                                    <th>REGISTRATION</th>
                                    
                                    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  
  $output .= '
   <tr>
    
    <td> '.$row['date'].'</td>    
    <td>'.$row['serial'].'</td>
    <td>'.$row['dealer'].'</td>
    <td>'.$row['reg_no'].'</td>
   
    
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