<?php  
session_start();
require('TCPDF-master/examples/tcpdf_include.php');
require_once('TCPDF-master/tcpdf_import.php');
require 'auth.php';
include 'db.php';
$company=$_SESSION['company'];
 
 
 function fetch_data()  
 {  $company=$_SESSION['company'];
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "JAMESKINUTHIA", "alexa");  
      $today=date("Y-m-d");
      $sql = "SELECT * FROM `work` WHERE  problem='RENEWAL' and `date` LIKE '%" . $today . "%' ";  
      $result = mysqli_query($connect, $sql);  
      $i=0;


      while($row = mysqli_fetch_array($result))  
      {     
      $i++; 
      $code=$row['code']; 
      $renewal="SELECT * from payments WHERE TransID='$code'";
      $james=mysqli_query($connect,$renewal);
      $TransID=mysqli_fetch_array($james);

      $output .= '<tr>  <td>'.$i.'</td>
                          <td>'.$row['cus_name'].'</td>  
                          <td>'.$TransID['TransAmount'].'</td>  
                          <td>'.$row['amount'].'</td>
                          <td>'.$row['code'].'</td>   
                          <td>'.$row['renewal_name'].'</td>  
                          <td>'.$row['date'].'</td>  
                          <td>'.$row['reg_no'].'</td> 
                          
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 
    
        
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $today=date("Y-m-d");
      $obj_pdf->SetTitle("Daily summary reports");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '8', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 8);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h4 align="center">Daily summary reports</h4><br /> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  <th width="5%">No.</th>
                <th width="17%">Client</th>
				<th width="10%">Paid.</th>
				<th width="13%">Renewed</th>
        <th width="14%">Code</th>
				<th width="20%">Users</th>
				<th width="10%">Date</th>
				<th width="14%"> Vehicle reg</th>
				
           </tr>  
      '; 
      
       	# code...
       	 $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content); 

      $obj_pdf->Output($today.'.pdf', 'I'); 
     
     
        
       
 ?>  