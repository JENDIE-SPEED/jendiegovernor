<?php
// codes will be a string of barcodes seperated by "\n"
$codes = $_POST['codes'];

// get as array like so
$barcodes = explode("\n", $codes);

// build up string of barcodes
$barcode_str = "";
$prefix = '';
foreach ($barcodes as $barcode){
    $barcode_str .= $prefix . "'" . $barcode . "'";
    $prefix = ', ';
}

$query = "select * from hdds where serial IN (" . $barcode_str . ");";

/* do things with query here */

// once your done processing
// redirect the user back to the form page
header("Location: scan.php");
?>