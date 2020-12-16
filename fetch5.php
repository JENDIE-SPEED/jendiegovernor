<?php
session_start();
require 'auth.php';
include 'db.php';
$company=$_SESSION['company'];
$id=$_SESSION['ledger'];
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * from ledger WHERE vendor='$id' and `serial` LIKE '%".$search."%' OR `date` LIKE '%".$search."%' ";
}
else
{
 $query = "
  SELECT * from ledger WHERE vendor='$id' ORDER BY id DESC
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '

                                    <tr>
                                    <th>ID</th>
                                    <th>SERIAL</th> 
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
    <td> '.$row['serial'].'</td>    
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