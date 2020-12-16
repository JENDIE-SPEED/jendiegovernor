<?php
session_start();
$serial = $_GET['serial'];
$serial = "0".$serial;
$reg_number = htmlspecialchars($_GET['name']);
$_SESSION['serial']=$serial;
$_SESSION['name']=$reg_number;
$unique=$_GET['unique'];
$_SESSION['unique']=$unique;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<!-- Default Theme (Core) -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script type="text/javascript">
	$(document).ready(function(){
   
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            
            todayHighlight: true,
            autoclose: true,
        });


    $('#fechasiniestro').datepicker({
            format: 'D/mm/yyyy',
            todayHighlight: true,
            autoclose: true,
        })



    });
</script>
</head>
<body>
	<table class="table">
		
			<thead class="thead-dark">
    <tr>
      <th scope="col">JENDIE</th>
      <th scope="col" class="pull-right"><a href="http://jendie.co.ke/jendiegovernor/list_vehicels.php?unique=<?php echo $unique ;?>">BACK</th>
      
    </tr>
  </thead>
</table>
<form method="post" action="markers/index.php">
<div class="input-group"  data-provide="fecha-default" >
<span class="input-group-addon"><i class="far fa-calendar-alt"></i>
</span>

<input title="Fecha derivacion"  name="fecha" id="datepicker"  class="form-control input-sm datepicker" type="text"    size="30" placeholder="FROM">

</div>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<div class="input-group"  data-provide="fecha-default" >
<span class="input-group-addon"><i class="far fa-calendar-alt"></i>
</span>

<input title="Fecha derivacion"  name="fecha1" id="fechasiniestro"  class="form-control input-sm datepicker" type="text"    size="30" placeholder="TO">



</div>
<br/>
<button>SUBMIT</button>

</form>
</body>
</html>


    <!-- <!DOCTYPE html>
    <html>
    <head>
        <title></title>
         <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyR68Sur1myFAGxM4RORiheOvWNFqPJhA&callback=initMap">
    </script>
        <script>
function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("peta"), mapOptions);
    map.setTilt(50);
        
    
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);
    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(14);
        google.maps.event.removeListener(boundsListener);
    });
    
}

// Load initialize function
google.maps.event.addDomListener(window, 'load', initMap);
</script>
        <style type="text/css">
            #peta {
    width: 100%;
    height: 650px;
}
        </style>
    </head>
    <body>
         <table class="table">
        
            <thead class="thead-dark">
    <tr>
       <th scope="col">TRACK</th>
       <th scope="col" class="pull-right"><a href="http://jendie.co.ke/jendiegovernor/list_vehicels.php?unique=<?php //echo $unique ;?>">BACK</th>
    </tr>
  </thead>
</table>
    <div id="peta"></div>
    </body>
    </html> --> -->