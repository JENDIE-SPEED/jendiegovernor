<?php
	//Start session
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if($_SESSION['role']!='super admin') {
		header("location:index.html");
		exit();
	}
?>