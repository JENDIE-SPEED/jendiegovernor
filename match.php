<?php
$conn = mysqli_connect("localhost","root", "JAMESKINUTHIA", "alexa");
if (!$conn) {
	# code...
	die("Connection Failed:".mysqli_connect_error());
}
$sql="SELECT * from alocate_serial ";
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