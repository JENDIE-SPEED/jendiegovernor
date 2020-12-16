<?php
$serial = $_GET['serial'];
$serial = "0".$serial;
$reg_number = htmlspecialchars($_GET['name']);
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
      <th scope="col" class="pull-right"><a href="http://jendie.co.ke/jendiegovernor/list_vehicels.php?unique=<?php echo $_GET['unique'] ;?>">BACK</th>
      
    </tr>
  </thead>
</table>
<form method="post" action="">
<div class="input-group"  data-provide="fecha-default" >
<span class="input-group-addon"><i class="far fa-calendar-alt"></i>
</span>

<input title="Fecha derivacion"  name="fecha" id="datepicker"  class="form-control input-sm " type="text" name="fecha"   size="30" placeholder="FROM">

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

<input title="Fecha derivacion"  name="fecha1" id="fechasiniestro"  class="form-control input-sm " type="text" name="fecha"   size="30" placeholder="TO">



</div>
<br/>
<button>SUBMIT</button>
</form>
</body>
</html>