<?php
session_start();
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "jameskinuthia";
$dbName     = "alexa";
$serial=$_SESSION['serial'];
// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
    /* lat/lng data will be added to this array */
   
        // Fetch the marker info from the database
$result = $db->query("SELECT * FROM data WHERE vehicle='$serial' ");

// Fetch the info-window data from the database
$result2 = $db->query("SELECT * FROM data WHERE vehicle='$serial' ");
?>

    <!DOCTYPE html>
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
        
    // Multiple markers location, latitude, and longitude
    var markers = [
        <?php if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $my_str=$row['latitude'];
                $james=str_replace(",", "", $my_str);
                $sub=substr($james, 0, -1);
                $sub2=substr($james, -1);
                $my_str1=$row['longitude'];
                $james1=str_replace(",", "", $my_str1);
                $sub1=substr($james1,0, -1);
                if ($sub2=='S') {
                    # code...
                    $sub3='-'.$sub;
                    echo '["'.$row['vehicle'].'", '.$sub3.', '.$sub1.'],';
                } else {
                    # code...
                    echo '["'.$row['vehicle'].'", '.$sub.', '.$sub1.'],';
                }
                
                    
                

                
            }
        }
        ?>
    ];
                        
    // Info window content
    var infoWindowContent = [
        <?php if($result2->num_rows > 0){
            while($row = $result2->fetch_assoc()){ ?>
                ['<div class="info_content">' +
                '<h3><?php echo $row['vehicle']; ?></h3>' +
                '<p><?php echo $row['date']; ?></p>' + '</div>'],
        <?php }
        }
        ?>
    ];
        
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
    <div id="peta"></div>
    </body>
    </html>