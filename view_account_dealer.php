<?php
session_start();
require 'auth.php';
include 'db.php';
$company=$_SESSION['company'];

$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "SELECT * from client_account WHERE rights='$company' and  `username` LIKE '%".$search."%' OR password LIKE '%".$search."%'  order by id DESC LIMIT 10
   ";
}
else
{
 $query = "
  SELECT * from client_account WHERE rights='$company'  order by id DESC limit 10
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '

                                    <tr>
                                    <th>ID</th>
                                    <th>USERNAME</th>
                                    <th>PASSWORD</th> 
                                    <th>VEHICLES</th>
                                    
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
 $unique=$row['key'];
  $output .= '
   <tr>
    <td> '.$row['id'].'</td>
    <td> '.$row['username'].'</td>    
    <td>'.$row['password'].'</td>
    
   <td><a href="list_vehicels.php?unique='.$unique.' " target="_blank"><button>View</button></a></td>
   <td><a href="edit_vehicles.php?unique='.$unique.' " ><button>Edit</button></a></td>
   <td><a href="delete_vehicles.php?unique='.$unique.' " target="_blank"><button>Delete Car</button></a></td>
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