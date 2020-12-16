<?php
session_start();
 $conn = mysqli_connect("localhost", "root", "jameskinuthia", "bot"); 
if (!$conn) {
    # code...
    die("Connection Failed:".mysqli_connect_error());
}
$serial=$_GET['id'];

$output = '';
if(isset($serial))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  select part1.identifier,part1.sim,part2.DataAndtime,part2.SpeedAndangle  from part1 inner join part2 on part1.identifier=part2.identifier where taxino='$serial' order by part2.id desc LIMIT 20;";
}
else
{
 $query = "
  select part1.identifier,part1.sim,part2.DataAndtime,part2.SpeedAndangle  from part1 inner join part2 on part1.identifier=part2.identifier where taxino='$serial' order by part2.id desc LIMIT 20;
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
                          <tr>
                          <td><strong >REGISTRATION </strong></td>
                          <td>TIME</td>
                          <td><strong >SPEED AND ANGLE</strong></td>
                          </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  
  $output .= '
   <tr>
    <td>'.$row['sim'].'</td>
    <td> '.$row['DataAndtime'].'</td>    
    <td> '.$row['SpeedAndangle'].'</td>
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