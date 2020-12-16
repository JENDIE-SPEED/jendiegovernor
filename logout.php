<?php
session_start();
unset($_SESSION['company']);
unset($_SESSION['user']);
unset($_SESSION['last']);
session_destroy();
header('Location: index.html');
 ?>