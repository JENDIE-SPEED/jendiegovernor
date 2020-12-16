<?php
session_start();
require 'auth.php';
include 'db.php';
$company=$_SESSION['company'];
$sql="SELECT * FROM `alocate_serial` ORDER BY id DESC";
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