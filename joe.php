<?php
session_start();
$_SESSION['company']='JENDIE';
$company=$_SESSION['company'];
$_SESSION['user']='jameskinuthiary@gmail.com';
$user=  $_SESSION['user'];
$connect = mysqli_connect("localhost", "root", "jameskinuthia", "alexa"); 
  function sequence(){
    $letter = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    $content = file_get_contents("seq_file");
    $content = file_get_contents("seq_file") + 1 ;
    $letter_number = file_get_contents("letter_number");

    if ($content ==99999){

        file_put_contents("seq_file",0);
        $content = 0 ;
        $letter_number = $letter_number + 1 ;
        file_put_contents("letter_number",$letter_number);
    }
    file_put_contents("seq_file",$content);

       return sprintf("%s-%04d",$letter[$letter_number],$content); // A-0252
        } 
        if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   $i=1;
   while($data = fgetcsv($handle))
   {
    $serial = mysqli_real_escape_string($connect, $data[0]);
    $make = mysqli_real_escape_string($connect, $data[3]);
    $cus_name='CHINA WU YI';
$contact='0723821563';
$vin='JDN-'.sequence();
$model=mysqli_real_escape_string($connect, $data[4]);
$chasis=mysqli_real_escape_string($connect, $data[2]);
$reg = mysqli_real_escape_string($connect, $data[1]);
$date=date('Y-m-d');
$newdate = strtotime ( '+365 day' , strtotime ( $date ) ) ;
    $newdate = date ( 'd-m-Y' , $newdate );
    $date1=date('Y-m-d');

$sql="INSERT INTO `work`(`reg_no`, `contact`, `cus_name`, `make`, `model`, `vin_no`, `chasis`, `dealer`, `problem`, `action`, `tech`, `serial`, `date`, `user`) VALUES('$reg','$contact','$cus_name','$make','$model','$vin','$chasis','HENJIK','INSTALLATION','VERY SIMPLE','HENJIK','$serial','$date1','$user')";

$result=mysqli_query($connect,$sql) ;
if ($result===true) {
    # code...
    $results="UPDATE `alocate_serial` SET `sold`='1' WHERE `serial`='$serial'";
    $query=mysqli_query($connect,$results) ;
        
}
 else {
    # code...
    $i++;
    echo $reg."-".$i."-";
}
   }
   fclose($handle);
   
  }
 }
}


?>