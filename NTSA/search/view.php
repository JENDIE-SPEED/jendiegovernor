<?php
session_start();
require '../auth.php';
$conn = mysqli_connect("localhost","root", "jameskinuthia", "alexa");
if (!$conn) {
    # code...
    die("Connection Failed:".mysqli_connect_error());
}
$company=$_SESSION['company'];
$serial=$_GET['serial'];
$sql="SELECT * FROM work WHERE `serial`='$serial'";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($query);
$cus_name=$row['cus_name'];
$contact=$row['contact'];
$make=$row['make'];
$model=$row['model'];
$chasis=$row['chasis'];
$reg = $row['reg_no'];
$tech = $row['tech'];
$serial=$row['serial'];
$problem = $row['problem'];
$action=$row['action'];
$vin=$row['vin_no'];
$date=$row['date'];
$_SESSION['customer']=$cus_name;
$_SESSION['contact']=$contact;
$_SESSION['make']=$make;
$_SESSION['model']=$model;
$_SESSION['chasis']=$chasis;
$_SESSION['reg']=$reg;
$_SESSION['tech']=$tech;
$_SESSION['serial']=$serial;
$_SESSION['problem']=$problem;
$_SESSION['action']=$action;
$_SESSION['vin_no']=$vin;
$_SESSION['date']=$date;
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>NTSA JENDIE</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <?php
		if(!isset($_POST['data'])){
  ?>
  <script type="text/javascript">
    setInterval("my_function();",5000); 
    function my_function(){
      $('#table_data').load(location.href + ' #table_data');
    }
  </script>
<?php 
		}
?>
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="home.html"></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    
        <div class="input-group-append">
          <a href="index.php"><button class="btn btn-primary" type="button" >
           BACK
          </button></a>
        

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a href="export.php?id=<?php echo $serial; ?><?php if(isset($_POST['date_value'])){ echo "&date=".$_POST['date_value'];}?>" target="_blank"><button class="btn btn-primary" type="button" >
          EXPORT SPEED DATA PDF
          </button></a>
        </li>
		 <li class="nav-item dropdown no-arrow mx-1">
        <a href="exportAll.php?id=<?php echo $serial; ?><?php if(isset($_POST['date_value'])){ echo "&date=".$_POST['date_value'];}?>" target="_blank"><button class="btn btn-primary" type="button" >
          EXPORT ALL DATA PDF
          </button></a>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
        <a href="speeddata.php?serial=<?php echo $serial; ?>" ><button class="btn btn-primary" type="button" >
          SPEED DATA
          </button></a>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
        <a href="view.php?serial=<?php echo $serial; ?>" ><button class="btn btn-primary" type="button" >
          ALL DATA
          </button></a>
        </li>
		

        
        
     
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
 
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Vehicle Speed and Tracking Information - TELEMETRY DATA</div>
          <div class="card-body">
		  
		 	
		  
		        <div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
               
			    <form action="" method="post">
				  Select Date:
				  <div class="row">
				  <input type="date" name="date_value" value=<?php if(isset($_POST['date_value'])){ echo $_POST['date_value'];} ?> class="form-control">
				  <input type="submit" name = "data" value="Fetch Data" class="btn btn-primary">
				  </div>
				  </form>
			   
            </div>
        </div>
    </div>
</div>
            <div class="table-responsive">
              <table>
                <tbody>
                                <tr class="info">
                          <td><strong >NAME</strong></td>
                          <td><?php echo $_SESSION['customer']; ?></td>
                          <td><strong >CONTACT</strong></td>
                          <td><?php echo $_SESSION['contact']; ?></td>
                          
                            </tr>
                            <tr class="info">
                          
                          
                            </tr> 
                            <tr class="info">
                          <td><strong >REGISTRATION</strong></td>
                          <td><?php echo $_SESSION['reg']; ?></td>
                           <td><strong >CHASIS</strong></td>
                          <td><?php echo $_SESSION['chasis']; ?></td>
                          
                            </tr> 
                            <tr class="info">
                         
                          
                            </tr> 
                             <tr class="info">
                          <td><strong >MAKE</strong></td>
                          <td><?php echo $_SESSION['make']; ?></td>
                          <td><strong >MODEL</strong></td>
                          <td><?php echo $_SESSION['model']; ?></td>
                            </tr> 
                             <tr class="info">
                          
                          
                            </tr>   

                            <tr class="info">
                              <td><strong >SERIAL</strong></td>
                              <td><?php echo $_SESSION['serial']; ?></td>
                              <td><strong>CERT ID</strong></td>
                              <td><?php echo $_SESSION['vin_no']; ?></td>
                            </tr>   
                            <tr class="info">
                          
      <td><strong >LIMITER TYPE</strong></td>
                              <td><?php echo "JENDIE"; ?></td>
                              <td><strong>DATE</strong></td>
                              <td><?php echo $_SESSION['date']; ?></td>
    </tr>
    
    
    <tr class="success">
    
     
      
      
    </tr>
    
  </tbody>
              </table>
              <div id="table_data">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Speed</th>
                    <th>Longitude</th>
                    <th>Latitude</th>
					<th>Location</th>
					<th>Violation</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Speed</th>
                    <th>Longitude</th>
                    <th>Latitude</th>
					<th>Location</th>
					<th>Violation</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
				  
				  if(isset($_POST['data'])){
					$date_value = $_POST['date_value'];
					// Creating timestamp from given date
					$timestamp = strtotime($date_value);
					 
					// Creating new date format from that timestamp
					$new_date = date("d-m-Y", $timestamp);
					//echo $new_date; // Outputs: 31-03-2019 
					$connect = mysqli_connect("localhost", "root", "jameskinuthia", "alexa");  
     
     $serial = '0'.$serial;
      $sql = "select * from data where vehicle = '$serial' and date = '$new_date'  order by id desc limit 200";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {     
        
      ?><tr id = "data">  
                          <td><?php echo $row['date']; ?></td>  
                          <td><?php echo $row['time']; ; ?> </td>  
                          <td> <?php echo $row['velocity'] ; ?></td>
                          <td> <?php echo $row['longitude'] ; ?></td>
                          <td> <?php echo $lati= $row['latitude'] ; ?></td>
                          <td> <?php 
						  $lat = $row['latitude'] ;
						  $log =  $row['longitude'];
						  
						  
						  
							$new_lat = "";
							$new_log = "";

							if(strpos($lat, 'S') !== false){
								$lat = "-".$lat;
								$new_lat = substr($lat, 0, -2);
								//echo $new_lat;
							} else{
								$new_lat = substr($lat, 0, -2);
								//echo $new_lat;
							}
							if(strpos($log, 'W') !== false){
								$log = "-".$log;
								$new_log = substr($log, 0, -2);
								//echo $new_log;
							} else{
								$new_log = substr($log, 0, -2);
								//echo $new_log;
							}
						  ?>
						  <a href=<?php echo "https://maps.google.com/?q=".$new_lat.",".$new_log; ?> target="_blank">Maps</a>
						  </td>
						  <td>
							<?php $alarm = $row['poweralarm']; 
								if($alarm == 1){
									echo "Power Disconnected";
									echo "<br>";
								}
							?> 
							<?php $signal = $row['speedDisConn']; 
								if($signal == 1){
									//echo "Speed Signal Disconnected";
									echo "<br>";
								}
							?> 
							<?php $speed = $row['velocity']; 
								if(strpos($speed, 'KM/H') == false){
									echo "";
								} else{
									$new_speed = substr($speed, 0, -3);
									$new_speed = (int)$new_speed;
									//echo $new_speed;
									if($new_speed >80){
										echo "OverSpeed";
									}
								}
							?> 
						  </td>
                          
                     </tr>  
                     <?php
	              } 	  
					  
				  } else {
                            $connect = mysqli_connect("localhost", "root", "jameskinuthia", "alexa");  
     
     $serial = '0'.$serial;
      $sql = "select * from data where vehicle = '$serial' order by id desc limit 200";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {     
        
      ?><tr id = "data">  
                          <td><?php echo $row['date']; ?></td>  
                          <td><?php echo $row['time']; ; ?> </td>  
                          <td> <?php echo $row['velocity'] ; ?></td>
                          <td> <?php echo $row['longitude'] ; ?></td>
                          <td> <?php echo $lati= $row['latitude'] ;
                           ?></td>
                          <td> <?php 
						  $lat = $row['latitude'] ;
						  $log =  $row['longitude'];
						  
						  
						  
							$new_lat = "";
							$new_log = "";

							if(strpos($lat, 'S') !== false){
								$lat = "-".$lat;
								$new_lat = substr($lat, 0, -2);
								//echo $new_lat;
							} else{
								$new_lat = substr($lat, 0, -2);
								//echo $new_lat;
							}
							if(strpos($log, 'W') !== false){
								$log = "-".$log;
								$new_log = substr($log, 0, -2);
								//echo $new_log;
							} else{
								$new_log = substr($log, 0, -2);
								//echo $new_log;
							}
						  ?>
						  <a href=<?php echo "https://maps.google.com/?q=".$new_lat.",".$new_log; ?> target="_blank">Maps</a>
						  </td>
						  
						  <td>
							<?php $alarm = $row['poweralarm']; 
								if($alarm == 1){
									echo "Power Disconnected";
									echo "<br>";
								}
							?>
							<?php $signal = $row['speedDisConn']; 
								if($signal == 1){
									//echo "Speed Signal Disconnected";
									echo "<br>";
								}
							?> 
							<?php $speed = $row['velocity']; 
								if(strpos($speed, 'KM/H') == false){
									echo "";
								} else{
									$new_speed = substr($speed, 0, -3);
									$new_speed = (int)$new_speed;
									//echo $new_speed;
									if($new_speed >80){
										echo "OverSpeed";
									}
									
								}
							?> 
						  </td>
                          
                     </tr>  
                     <?php
	  }                   
      }  
      ?>
                </tbody>
              </table>
			  </div>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="index.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
