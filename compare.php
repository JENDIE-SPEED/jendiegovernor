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
                $date=date('Y-m-d');
                $query = "SELECT * from work where `serial`='%".$serial."%'";
                $result=mysqli_query($connect, $query);
                $row=mysqli_fetch_array($result);
                echo $row['serial'];


   }
   fclose($handle);
   
  }
 }
}
?>  