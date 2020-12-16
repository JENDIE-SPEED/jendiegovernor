<?php
session_start();
require '../auth.php';
include '../db.php';
$company=$_SESSION['company'];
$user=  $_SESSION['user'];
$selected = array();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Jendie Automobiles Limited</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>

</head>

<body>

	<div id="page-wrap">

		<textarea id="header">INVOICE</textarea>
		
		<div id="identity">

            <div id="logo">

              <!-- <div id="logoctr">
                <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                |
                <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
              </div> -->

              <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 100px)
              </div>
			  <img id="image" src="images/logo.png" alt="logo" />
			  <h1 class="company"> JENDIE AUTOMOBILES LIMITED </h1>
			  <p class="email">info@jendiespeedgovernors.com</p>
			  <h4 class="phone">Tel: 0720522544</h4>
			  <br>
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">
			<h3 class="to">TO</h3>
			<br>
			<table>
				<tr>
					<td class="company-name">COMPANY NAME
</td>
<td>
            <textarea id="customer-title">EUREKA TECHNICAL SERVICES LIMITED</textarea>
</td>
<tr>
</table>
            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><textarea>000123</textarea></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><textarea id="date">December 15, 2009</textarea></td>
                </tr>
                <!-- <tr>
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due">15960</div></td>
                </tr> -->

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th >Description</th>
		      <th>Unit Cost</th>
			  <th>Quantity</th>
			  <th>TAX (14%)</th>
		      <th>Amount</th>
		  </tr>
		  
		  <tr class="item-row">
		      <td class="description"><div class="delete-wpr"><textarea>New online digital speed governor (One year subscription)</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
		      <td><textarea class="cost">14000</textarea></td>
			  <td><textarea class="qty">1</textarea></td>
			  <td><textarea class="tax">1960</textarea></td>
		      <td><span class="price">15960</span></td>
		  </tr>
		  
		  <tr id="hiderow">
		    <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank note">NOTE</td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal">14000</div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank">All cheques are payable to JENDIE AUTOMOBILES LTD </td>
		      <td colspan="2" class="total-line">Tax 14%</td>
		      <td class="total-value"><div id="taxtotal">1960</div></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank">You can also use our Till number <b>430309</b></td>
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value"><div id="total">15960</div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank">Direct transfer: Acc: <b>0910276530763</b> Swift Code: <b>EQBLKENA</b>.</td>
		      <td colspan="2" class="total-line"></td>

		      <td class="total-value"><textarea id="paid"></textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank">Bank Code: <b>68000</b> Branch code:<b>68091</b> Equity Bank, Ngara Branch</td>
		      <td colspan="2" class="total-line balance"></td>
		      <td class="total-value balance"><div class="ue"></div></td>
		  </tr>
		  
		</table>
		<div id="terms">
		  <h5>Thank You For Your Business!</h5>
		</div>
	
	</div>
	
</body>

</html>