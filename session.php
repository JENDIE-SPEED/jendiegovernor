<?php
session_start();
$amount=$_SESSION['amount'];
$amount=(float)$amount;
echo $amount;