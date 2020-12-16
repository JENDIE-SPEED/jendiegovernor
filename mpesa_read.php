<?php
$conn = mysqli_connect("localhost","root", "", "alexa");
if (!$conn) {
	# code...
	die("Connection Failed:".mysqli_connect_error());
}
$json = '{"ResultCode":0,"ResultDesc":"Validation passed success"}{
            "TransactionType": "Customer Merchant Payment",
            "TransID": "OIF9KH9YTF",
            "TransTime": "20200915180134",
            "TransAmount": "10.00",
            "BusinessShortCode": "7368323",
            "BillRefNumber": "",
            "InvoiceNumber": "0",
            "OrgAccountBalance": "20.00",
            "ThirdPartyTransID": "",
            "MSISDN": "254725091605",
            "FirstName": "JAMES",
            "MiddleName": "RAPHAEL",
            "LastName": "KINUTHIA"
        }';
$obj = json_decode($json);
$number=$obj->{'MSISDN'};
//print " ";
$first_name= $obj->{'FirstName'};
$second_name=$obj->{'MiddleName'};
$last_name= $obj->{'LastName'};

$TransID=$obj->{'TransID'};
$TransTime=$obj->{'TransTime'};
$OrgAccountBalance=$obj->{'OrgAccountBalance'};
$TransAmount=$obj->{'TransAmount'};

$sql = "INSERT INTO payments (TransactionType, TransID, TransTime, TransAmount, BusinessShortCode, BillRefNumber, OrgAccountBalance, MSISDN, FirstName, MiddleName, LastName)
	VALUES ('paid', '$TransID', '$TransTime', '$TransAmount', 'null', 'null', '$OrgAccountBalance', '$number', '$first_name', '$second_name', '$last_name')";
$query=mysqli_query($conn,$sql);
echo " yess";
?>
                