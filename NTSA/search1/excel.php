<?php
session_start();
$serial=$_GET['id'];
$conn = mysqli_connect("localhost", "root", "jameskinuthia", "alexa");  
     
      $sql = "SELECT `cus_name`,`contact`,`reg_no`,`chasis`,`make`,`serial` FROM work WHERE `serial`='$serial'";  
    $productResult = mysqli_query($conn,$sql);
    $filename = "Export_excel.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $isPrintHeader = false;
    if (! empty($productResult)) {
        foreach ($productResult as $row) {
            
            echo implode("\n", array_values($row)) . "\n \n \n";
        }
    }
   mysqli_close($conn);
   $conn = mysqli_connect("localhost", "root", "jameskinuthia", "alexa");  
     
      $sql = "select * from data where vehicle like'%".$serial."%' limit 4320";  
    $productResult = mysqli_query($conn,$sql);
    $filename = "Export_excel.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $isPrintHeader = false;
    if (! empty($productResult)) {
        foreach ($productResult as $row) {
            if (! $isPrintHeader) {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
    }
    exit();

?>