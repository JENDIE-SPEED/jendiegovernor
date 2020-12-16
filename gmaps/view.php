<?php
$conn=mysqli_connect("localhost","root","","data");
//Check Connection
if(!$conn)
{
die("Connection Failed:".mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table border="1">
	<tbody>
<?php $sql="select * from devicedata order by id desc ";
$result=mysqli_query($conn,$sql);
?>
		<tr>
			<td>datatime</td>
			<td>speedlimitsensor</td>
			<td>speedlimitgps</td>
			<td>calibration</td>
			<td>signalwire</td>
			<td>mainconnector</td>
			<td>mainpowersupply</td>
			<td>satelitefix</td>
			<td>speedsignal</td>
			<td>vehiclespeed</td>
			<td>reg_no</td>
			<td>vehicle_voltage</td>
			<td>imei</td>
			
			<td>latitude</td>
			<td>northorsouth</td>
			<td>longitude</td>
			<td>eastorwest</td>
			<td>reg_date</td>
		</tr>
		<?php while ($row=mysqli_fetch_array($result)) {
			# code...
			extract($row);
			?>
			<tr>
			<td><?php echo $row['datatime'];?></td>
			<td><?php echo $row['speedlimitsensor'];?></td>
			<td><?php echo $row['speedlimitgps'];?></td>
			<td><?php echo $row['calibration'];?></td>
			<td><?php echo $row['signalwire'];?></td>
			<td><?php echo $row['mainconnector'];?></td>
			<td><?php echo $row['mainpowersupply'];?></td>
			<td><?php echo $row['satelitefix'];?></td>
			<td><?php echo $row['speedsignal'];?></td>
			<td><?php echo $row['vehiclespeed'];?></td>
			<td><?php echo $row['reg_no'];?></td>
			<td><?php echo $row['vehicle_voltage'];?></td>
			<td><?php echo $row['imei'];?></td>
			
			<td><?php echo $row['latitude'];?></td>
			<td><?php echo $row['northorsouth'];?></td>
			<td><?php echo $row['longitude'];?></td>
			<td><?php echo $row['eastorwest'];?></td>
			<td><?php echo $row['reg_date'];?></td>
			

		</tr>
			<?
		}
		?>
		
	</tbody>
</table>
</body>
</html>