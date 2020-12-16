<?php
session_start();
require 'auth.php';
include 'db.php';
$company=$_SESSION['company'];
$user=  $_SESSION['user'];

$code=mysqli_real_escape_string($conn,$_POST['mpesa']);
$date=date('Y-m-d');

//echo $code;

if(isset($_POST["framework"]))
{
	
	$framework=$_POST["framework"];
	$amount= $_SESSION['amount'];
	$amount=(int)$amount;
	$sql1="SELECT * from payments where `TransID`='$code' and TransAmount >= $amount";
	$query=mysqli_query($conn,$sql1);
	$row = mysqli_fetch_array($query);
	$total = $row['TransAmount'];
	$message = "";
	if (mysqli_num_rows($query)>0) {
		// kvstore API url
			$url = 'http://3.134.214.157/search/app.php?serial='.$framework;
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			//Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_HTTPHEADER, [
			  'Content-Type: application/json'
			]);
			$response = curl_exec($curl);
			curl_close($curl);
			$arr = json_decode($response);
			//echo $arr;
			if(!empty($arr)){
			if($arr->message == "success"){
			# code...
			//echo "success";
         	$serial=$framework;
         	//$code=$code.'-'.$i;
         	//$sql2="SELECT * from work where `code`='$code' and sum(amount)+$amount <= $total";
			$sql2="SELECT * from work where `code`='$code'";
			$query2=mysqli_query($conn,$sql2);
         	if (mysqli_num_rows($query2)>0) {
         		# code...
         		# code...
				$sql2="SELECT sum(amount) as amount from work where `code`='$code'";
				$query2=mysqli_query($conn,$sql2);
				$rows = mysqli_fetch_array($query2);
				$tamount = $rows['amount'];
				if (mysqli_num_rows($query2)>0){
					if(($tamount + $amount) <= $total){
						$sql="UPDATE work SET `code`='$code',`dealer-renew`='$company',`date`='$date', `amount`= '$amount',`problem`='RENEWAL',`renewal_name`='$user' where `serial`='$serial'";
						$query=mysqli_query($conn,$sql);
						if($query){
							$message ="success";
							echo $message;
							$sql = "SELECT * FROM work 	WHERE serial = '$serial'";
							$query = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($query);
							$_SESSION['customer'] = $row['cus_name'];
							$_SESSION['contact'] = $row['contact'];
							$_SESSION['make'] = $row['make'];
							$_SESSION['model'] = $row['model'];
							$_SESSION['chasis'] = $row['chasis'];
							$_SESSION['reg'] = $row['reg_no'];
							$_SESSION['tech'] = $row['tech'];
							$_SESSION['serial'] = $row['serial'];
							$_SESSION['problem'] = $row['problem'];
							$_SESSION['action'] = $row['action'];
							$_SESSION['phone'] = $row['phone'];
							$id = $row['vin_no'];
							
							//header("location:reprint.php?id=".$id);
							
							
						}else{
							$message = "failed";
							echo $message;
						}
						}else{
							$message = "you have exhausted your account";
							echo $message;
						}
				}
         	} else {
         		$sql="UPDATE work SET `code`='$code',`dealer-renew`='$company',`date`='$date', `amount`= '$amount',`problem`='RENEWAL',`renewal_name`='$user' where `serial`='$serial'";
				$query=mysqli_query($conn,$sql);
				if($query){
					$message ="success";
					echo $message;
					$sql = "SELECT * FROM work WHERE serial = '$serial'";
					$query = mysqli_query($conn, $sql);
					$row = mysqli_fetch_array($query);
					$_SESSION['customer'] = $row['cus_name'];
					$_SESSION['contact'] = $row['contact'];
					$_SESSION['make'] = $row['make'];
					$_SESSION['model'] = $row['model'];
					$_SESSION['chasis'] = $row['chasis'];
					$_SESSION['reg'] = $row['reg_no'];
					$_SESSION['tech'] = $row['tech'];
					$_SESSION['serial'] = $row['serial'];
					$_SESSION['problem'] = $row['problem'];
					$_SESSION['action'] = $row['action'];
					$_SESSION['phone'] = $row['phone'];
					$id = $row['vin_no'];
					
					//header("location:reprint.php?id=".$id);
					
					
				}else{
					$message = "failed";
					echo $message;
				}
         	}
         	
         //update original code
         //$original_code=$num-1;
         //$sql="UPDATE work SET `code`='$code' where `code`='$original_code'";
			
		//header('location:view-renewed.php');
		}else{
			$message = "Unable to renew, Vehicle has no speed data";
			echo $message;
		}
		}else{
			$message = "Error occured while renewing, consult administrator";
			echo $message;
		}
	} else {
		$message = "Transaction does not exist";
		echo $message;
	}
	

 
}


?>