<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'jameskinuthia';
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
	
   $table_name = "work";
   $backup_file  = "/opt/lampp/htdocs/ruby/jendiegovernor/work.sql";
   $sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";
   
   mysql_select_db('alexa');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not take data backup: ' . mysql_error());
   }
   
   echo "Backedup  data successfully\n";
   
   mysql_close($conn);
?>
