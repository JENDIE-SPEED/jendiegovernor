<?php
session_start();
$serial=$_GET['serial'];


$conn = mysqli_connect("localhost", "root", "jameskinuthia", "alexa");  
     
      $sql = "SELECT * FROM work WHERE `serial`='$serial'";  
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
   mysqli_close($conn);
   $conn = mysqli_connect("localhost", "root", "jameskinuthia", "bot");  
     
      $sql = "select part1.identifier,part1.sim,part2.DataAndtime,part2.SpeedAndangle from part1 inner join part2 on part1.identifier=part2.identifier where taxino='$serial' order by part2.id desc LIMIT 20;";  
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