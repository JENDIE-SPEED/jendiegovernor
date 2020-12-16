<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#upleft { 
   width:100%; 
   height: 10%; 
   background:white;
   position: static; 
   border: 0;
}

#lowleft{
   width: 17%;
   height:90%;
   background:;
   float: left; 
   border: 0;
}
#lowcenter{
   width: 17%;
   height: 90%;
   background:;
   float: right;
   border: 0;
   overflow-y:hidden;
}
#funs{
   width: 20%;
   height: 90%;
   background:;
   float: left;
   border: 0;
   overflow-y:hidden;
}
#center{
   width: 63%;
   height: 90%;
   background:url(../image/img/2book.jpg);
   position: relative;
   float: left;
   border:0;
   overflow-y:hidden;
}
html,body{
	height: 100%;
}

	</style>

</head>
<body id="main">
<iframe src="header.php" name="header" id="upleft" scrolling="no"></iframe>
<iframe src="users.php" name="left"  id="lowleft"></iframe>
<iframe src="map.php" name="center" id="center"></iframe>
<iframe src="vehicle.php" name="right" id="funs" scrolling="yes"></iframe>
</body>
</html>