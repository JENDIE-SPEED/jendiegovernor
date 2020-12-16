<?php
require_once('dbconnect.php');
$itemcode = $_POST['txtitemcode'];
$item = $_POST['txtitem'];
$qty = $_POST['txtqty'];
$srp = $_POST['txtsrp'];
$markuprate = $_POST['txtmarkuprate'];
$txtsp=($srp*$markuprate)+$srp;
$id = $_POST['id'];

mysql_query("UPDATE barcode SET itemcode ='".$itemcode."',item='".$item."',qty='".$qty."',srp='".$srp."',markup='".$markuprate."',sp='".$txtsp."' where id='".$id."'");
echo "<script> alert('1 record updated');
window.location.href='index.php';
</script>";
mysql_close($con);
?>