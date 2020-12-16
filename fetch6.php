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
  SELECT * from `suspend_tech` WHERE    dealer  LIKE '%".$search."%' OR identification LIKE '%".$search."%'";
}
else
{
 $query = "
  SELECT * from `suspend_tech`  ORDER BY id DESC
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '

                                    <tr>
                                    <th>ID</th>
                                    <th>first_name</th>
                                    <th>second_name</th> 
                                    <th>phone</th>
                                    <th>branch</th>
                                    <th>dealer</th>
                                    
                                    
                                    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  
  $output .= '
   <tr>
    <td>'.$row['id'].'</a></td>
    <td> '.$row['first_name'].'</td>    
    <td>'.$row['second_name'].'</td>
    <td>'.$row['phone'].'</td>
    <td>'.$row['branch'].'</td>
     <td>'.$row['dealer'].'</td>
    <td><a href="return.php?id='.$row['id'].'"><button>return</button></a></td>
    
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