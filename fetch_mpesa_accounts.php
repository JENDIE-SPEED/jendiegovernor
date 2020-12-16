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
  SELECT * from payments WHERE  `TransID` LIKE '%".$search."%' OR `MSISDN` LIKE '%".$search."%' ";
}
else
{
 $query = "
  SELECT * from payments  ORDER BY id DESC
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '

                                    <tr>
                                    <th>ID</th>
                                    <th>TRANSACTION ID</th> 
                                    <th>AMOUNT</th>
                                    <th>FIRST NAME</th>
                                    <th>SECOND NAME</th>
                                    <th>BALANCE</th>
                                    <th>DATE</th>
                                    
                                    </tr>
 ';
 $i=0;
 while($row = mysqli_fetch_array($result))
 {
  $i++;
  $output .= '
   <tr>
    <td>'.$i.'</td>
    <td> '.$row['TransID'].'</td>    
    <td>'.$row['TransAmount'].'</td>
    <td>'.$row['FirstName'].'</td>
    <td>'.$row['MiddleName'].'</td>
    <td>'.$row['OrgAccountBalance'].'</td>
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