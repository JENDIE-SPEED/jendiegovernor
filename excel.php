<?php  
$connect = mysqli_connect("localhost", "root", "JAMESKINUTHIA", "alexa");
if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $serial = mysqli_real_escape_string($connect, $data[0]);
    $phone= mysqli_real_escape_string($connect, $data[1]);
                $date=date('Y-m-d');
                $query = "INSERT IGNORE INTO alocate_serial(`serial`,`phone`,`dealer`,`alocate`,`sold`)VALUES('$serial','$phone','JENDIE',1,0) ";
                mysqli_query($connect, $query) or die($connect);
   }
   fclose($handle);
   echo "<script>alert('Import done');</script>";
  }
 }
}
header('location:addstock.php');
?> 