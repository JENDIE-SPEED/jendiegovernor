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
  SELECT * from `del_users` WHERE    branch  LIKE '%".$search."%' OR firstname LIKE '%".$search."%'";
}
else
{
 $query = "
  SELECT * from `del_users`  ORDER BY id DESC
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
                                    
                                    <th>branch</th>
                                    <th>email</th>
                                    
                                    
                                    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  
  $output .= '
   <tr>
    <td>'.$row['id'].'</a></td>
    <td> '.$row['firstname'].'</td>    
    <td>'.$row['secondname'].'</td>
    
    <td>'.$row['branch'].'</td>
     <td>'.$row['email'].'</td>
    <td><a href="return_dealer.php?id='.$row['id'].'"><button>return</button></a></td>
    
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