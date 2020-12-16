<?php
session_start();
require 'db.php';

$unique=$_GET['unique'];
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </head>
<body>
	<table class="table">
		
			<thead class="thead-dark">
    <tr>
      <th scope="col">SERIAL</th>
      <th scope="col">REG NO</th>
      <th scope="col">TRACK</th>
    </tr>
  </thead>
  <tbody>
			<?php 
			$sql="SELECT * FROM $unique ORDER BY id DESC ";
			$query=mysqli_query($conn,$sql);
			while ($row=mysqli_fetch_array($query)) {
				# code...
				$s=$row['serial'];
				?>
				<tr>
					<td><?php echo $row['serial']; ?></td>
				
				
					<td><?php 
					
					$select_serial="SELECT * from work where `serial`='$s'";
					$query_serial=mysqli_query($conn,$select_serial);
					$f=mysqli_fetch_array($query_serial);
					$r=$f['reg_no'];
					echo $f['reg_no']; ?></td>
				
				
					<td><a href="delete.php?name=<?php echo $s;?>&unique=<?php echo $unique;?>" ><button>delete</button></a></td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
</body>
</html>