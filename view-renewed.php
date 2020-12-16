<?php
session_start();
require 'auth.php';
include 'db.php';
$company=$_SESSION['company'];
$user=  $_SESSION['user'];
header('location:pending_renewal.php');