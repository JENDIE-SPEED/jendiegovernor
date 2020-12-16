
<?php  
$connect = mysqli_connect("localhost", "root", "jameskinuthia", "alexa");
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
    $reg = mysqli_real_escape_string($connect, $data[1]);
                $date=date('Y-m-d');
                $query = "UPDATE `work` set `reg_no`='$reg' WHERE `serial`='$serial' ";
                mysqli_query($connect, $query) or die($connect);
   }
   fclose($handle);
   echo "<script>alert('Import done');</script>";
  }
 }
}
header('location:addstock.php');
?> 