<?php
session_start();
require 'db.php';
$company=$_SESSION['company'];
require('TCPDF-master/tcpdf_include.php');
require_once('TCPDF-master/tcpdf_import.php');
?>