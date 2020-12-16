<?php
session_start();
$_SESSION['alocate']=$_POST['dealers'];
header('location:index.php');
?>