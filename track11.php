
<?php
$serial = $_GET['serial'];
$serial = "0".$serial;
$reg_number = htmlspecialchars($_GET['name']);
?>
<!doctype html>
<html>
    <head>
        <meta charset='utf-8'/>
        <title>MAPS</title>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDyR68Sur1myFAGxM4RORiheOvWNFqPJhA"></script>
        <script type='text/javascript'>
            (function(){

                var map,marker,latlng,bounds,infowin;
                /* initial locations for map */
                var _lat= -1.278148;
                var _lng= 36.830112;
				//mapTypeId: 'roadmap',

                var getacara=0; /* What should this be? is it a function, a variable ???*/
				
				var res = "";
				var reg = "<?php echo $reg_number ?>";
				var serial = "<?php echo $serial ?>";
				var marker_clicked = false;
				var flightPathCoordinates = [];
				
				//infoWindow = new google.maps.InfoWindow();

                function showMap(){
                    /* set the default initial location */
                    latlng={ lat: _lat, lng: _lng };

                    bounds = new google.maps.LatLngBounds();
                    infowin = new google.maps.InfoWindow();

                    /* invoke the map */
                    map = new google.maps.Map( document.getElementById('map'), {
                       center:latlng,
                       zoom: 11
                    });

                    /* show the initial marker */
                    //marker = new google.maps.Marker({
                    //   position:latlng,
                    //   map: map,
                    //   title: 'Hello World!'
                    //});
                    //bounds.extend( marker.position );              
                }
				function update(){
					/* I think you can use the jQuery like this within the showMap function? */
                    $.ajax({
                        /* 
                            I'm using the same page for the db results but you would 
                            change the below to point to your php script ~ namely
                            phpmobile/getlanglong.php
                        */
						
                        //url: document.location.href,
						url: 'map_data.php?serial='+serial,
                        type: 'get',
                        data: { 'id': getacara, 'ajax':true },
                        dataType: 'json',
                        success: function( data, status ){
                            $.each( data, function( i,item ){
                                /* add a marker for each location in response data */ 
                                addMarker( item.latitude, item.longitude, item.speed, item.name, item.dat, item.tim );
								//addPoitsList(item.latitude, item.longitude);
                            });
							//setInterval('location.reload("#map")', 10000);
                        },
                        error: function(){
                            output.text('There was an error loading the data.');
                        }
                    });   
				}
				//res +=
				//function addPoitsList(lat, lng){
				//	position:{ lat:parseFloat( lat ), lng:parseFloat( lng ) };
				//	flightPathCoordinates = [position];
				//}
                /* simple function just to add a new marker */
                function addMarker(lat,lng, spd,title, dat, tim){
                    marker = new google.maps.Marker({/* Cast the returned data as floats using parseFloat() */
                       position:{ lat:parseFloat( lat )*-1, lng:parseFloat( lng ) },
                       map:map,
					   icon: "transportation.png",
                       title: String(reg)
                    });
					
                    google.maps.event.addListener( marker, 'click', function(event){
                        infowin.setContent("<div id='container'><b>Registration:</b> " + String(reg) + "<br>"
						+ "<b>Latitude:</b> " + String(lat).substring(0, String(lat).length - 1)+"N"+ "<br>"
						+ "<b>Longitude:</b> " + String(lng)+ "<br>"
						+ "<b>Serial:</b> " + String(title)+ "<br>"
						+ "<b>Speed:</b> " + String(spd)+ "<br>"
						+ "<b>Date:</b> " + String(dat)+ "<br>"
						+ "<b>Time:</b> " + String(tim)+ "<br>"
						+"</div>");
                        infowin.open(map,this);
                        infowin.setPosition(this.position);
                    }.bind( marker ));

                    bounds.extend( marker.position );
                    map.fitBounds( bounds );
					map.setCenter(bounds.getCenter());
					map.setZoom(17);
					
                }
				//function addPoitsList(lat, lng){
				//	position:{ lat:parseFloat( lat ), lng:parseFloat( lng ) };
				//	flightPathCoordinates = [position];
				//}

                document.addEventListener( 'DOMContentLoaded', showMap, false );
				$(window).load(function(){
					update()
					setInterval(function(){
						marker.setMap(null);
						bounds =null;
						update()
					}, 5000)
				})
            }());
			
        </script>
		
        <style>
            html, html body, #map{ height:95%; width:100%; padding:0; margin:0; }
        </style>
    </head>
    <body>
        <table class="table">
        
            <thead class="thead-dark">
    <tr>
       <th scope="col">TRACK</th>
	   <th scope="col" class="pull-right"><a href="http://jendie.co.ke/jendiegovernor/list_vehicels.php?unique=<?php echo $_GET['unique'] ;?>">BACK</th>
    </tr>
  </thead>
</table>
        <div id='map'></div>
    </body>
</html>