<html>
<body>
<form action=aaa.php method=POST>
<table border=0 align=center bgcolor="#0000FF">
<tr><td>ENTER BARCODE</td><td><input type="text" name="barcode" /></td>
</tr>

</table>
</form>
<hr />
<?php
require_once('dbconnect.php');
$txtbarcode=$_POST['barcode'];
$result=mysql_query("SELECT * from barcode where itemcode='".$txtbarcode."'");
echo "<center><table border=1>";
echo"<tr><th>ITEM CODE:</th><th>ITEM:</th><th>QTY</th><th>SRP</th><th>MARKUP RATE</th><th>SELLING PRICE</th></tr>";
while($row=mysql_fetch_array($result))
{
echo"<tr>";
echo "<td align= center>".$row['itemcode']."</td>";
echo "<td align=center>".$row['item']."</td>";
echo "<td align=center>".$row['qty']."</td>";
echo "<td align=center>".$row['srp']."</td>";
echo "<td align=center>".$row['markup']."</td>";
echo "<td align=center>".$row['sp']."</td>";
echo"</tr>";
}
echo "</table>";
mysql_close($con);
?>
</body>
</html>
