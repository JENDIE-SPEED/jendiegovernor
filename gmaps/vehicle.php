<?php

$conn=mysqli_connect("localhost","root","jameskinuthia","alexa");
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript"
     src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
    </script> 
    <script type="text/javascript"
     src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
    </script>
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
    </script>
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
   <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">                <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/tooplate-style.css"> 
    <script type="text/javascript">
      $(document).ready(function () {
    $("#filter").keyup(function () {
        var filter = $(this).val(),
            count = 0;
        $("li").each(function () {
            if (filter == "") {
                $(this).css("visibility", "visible");
                $(this).fadeIn();
            } else if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).css("visibility", "hidden");
                $(this).fadeOut();
            } else {
                $(this).css("visibility", "visible");
                $(this).fadeIn();
            }
        });
    });
});
      $('.forward').click(function(){
    $(this).parent().addClass('show');
    $(this).parent().parent().addClass('hide');
});

$('.back').click(function(){
    $(this).parent().parent().removeClass('show');
    $(this).parent().parent().parent().removeClass('hide');
});
    </script>
</head>
<body>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">CLIENTS</th>
      
    </tr>
  </thead>
  <thead>
    <tr >
      <td></td>
    </tr>
  </thead>
  
  	</table>
    <input id="filter" type="text" />
    <ul>
  		<?php
      $sql="SELECT COUNT(reg_no) as 'group',dealer FROM work GROUP BY dealer ORDER BY COUNT(reg_no) DESC";
      $query=mysqli_query($conn,$sql);
      while ($row=mysqli_fetch_array($query)) {
        ?>
        <li>
          <a class="forward"><?php echo $row['dealer']." ".$row['group']; ?></a>

        </li>
        <?php
      }
      ?>
  		
  
</ul>
</body>
</html>