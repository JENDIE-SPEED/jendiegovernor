<?php
session_start();
require 'auth.php';
include 'db.php';
if(isset($_POST['export'])){
	if(isset($_POST['from_date']) && !empty($_POST['from_date'])){
		$date_from = $_POST['from_date'];
		$to_date = $_POST['to_date'];
		$today = date("Y-m-d h-i-s");
		$company=$_SESSION['company'];
		$sql="SELECT `id`,`reg_no`,`contact`,`cus_name`,`make`,`model`,`model`,`chasis`,`dealer`,`serial`,`date` FROM `work` where problem='RENEWAL' AND date BETWEEN '$date_from' AND '$to_date' ORDER BY id DESC";
		$productResult = mysqli_query($conn,$sql);
			$filename = $today."Export_excel.xls";
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
			header("location:renewed.php");
	}else{
		$today = date("Y-m-d h-i-s");
		$company=$_SESSION['company'];
		$sql="SELECT`id`,`reg_no`,`contact`,`cus_name`,`make`,`model`,`model`,`chasis`,`dealer`,`serial`,`date` FROM `work` where problem='RENEWAL' ORDER BY id DESC";
		$productResult = mysqli_query($conn,$sql);
			$filename = $today."Export_excel.xls";
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
			header("location:renewed.php");
	}
}

?>