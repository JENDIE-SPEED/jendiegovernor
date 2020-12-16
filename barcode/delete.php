<html>
<body bgcolor=black>
<?php
require_once('dbconnect.php');
$id = $_REQUEST['id'];
mysql_query("DELETE FROM barcode where id= '$id''");
header('location:index.php');
?>
</body>
</html>