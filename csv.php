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
    // $phone= mysqli_real_escape_string($connect, $data[1]);
                
                $query = "INSERT IGNORE INTO`off`(`serial`) VALUES('$serial') ";
                mysqli_query($connect, $query) or die($connect);
   }
   fclose($handle);
   echo "<script>alert('Import done');</script>";
  }
 }
}
echo "yess";
?> 