<?php
	//Start session
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['company']) || (trim($_SESSION['company']) == '')) {
		header("location:index.html");
		exit();
	}
?>