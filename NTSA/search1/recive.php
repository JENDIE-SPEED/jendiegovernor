<?
$conn = mysqli_connect("localhost","root", "jameskinuthia", "alexa");
if (!$conn) {
    # code...
    die("Connection Failed:".mysqli_connect_error());
}
set_time_limit(60*60); // set title limit
	header('Content-Type: text/json');

	$json = file_get_contents('php://input');
	$obj = json_decode($json, true);
	
	echo $vehicle_reg = string_sanitize($obj['vehicle_reg']);
	echo $contact = string_sanitize($obj["contact"]);
     echo $cus_name = string_sanitize($obj["cus_name"]);
     echo $make = string_sanitize($obj["make"]);
    echo $vin_no = string_sanitize($obj["vin_no"]);
    echo $chasis = string_sanitize($obj["chasis"]);
    echo $dealer = string_sanitize($obj["dealer"]);
    echo $action = string_sanitize($obj["action"]);
    echo $tech = string_sanitize($obj["tech"]);
    echo $serial = string_sanitize($obj["serial"]);
    echo $date = string_sanitize($obj["date"]);
    echo $user = string_sanitize($obj["user"]);
    echo $model = string_sanitize($obj["model"]);
	//$id=string_sanitize($obj['id']);
	if(!empty($vehicle_reg))
	{
     $sql="INSERT INTO `work`( `reg_no`, `contact`, `cus_name`, `make`, `model`, `vin_no`, `chasis`, `dealer`, `problem`, `action`, `tech`, `serial`, `date`,  `user`) VALUES ('1','1','1','1','1','1','1','1','1','1','1','1','1','1')";
     $query=mysqli_query($conn,$sql) or die($conn);

     
	
        } 

        else
	{
		$msg = "ERROR";
		$StatusCode = 102;
		$StatusMessage ="Invalid request Format";
		echo  "{status}";
	}
        
       
	
	
	

	function string_sanitize($s) 
	{
	$s = stripslashes($s);
    $result = str_replace("'", "", html_entity_decode($s, ENT_QUOTES));
    return $result;
   }
	
/*
	 */
?>