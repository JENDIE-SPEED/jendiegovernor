<?php  
session_start();
require('TCPDF-master/examples/tcpdf_include.php');
require_once('TCPDF-master/tcpdf_import.php');
require 'auth.php';
include 'db.php';
$company=$_SESSION['company'];
 
 
 function fetch_data()  
 {  
      $output = '';
      $company=$_SESSION['company']; 
      $connect = mysqli_connect("localhost", "root", "JAMESKINUTHIA", "alexa");  
      $date=date("Y-m-d");
       $newdate = strtotime ( '-7 day' , strtotime ( $date ) ) ;
      $newdate = date ( 'Y-m-d' , $newdate ); 
      $sql = "SELECT * from work where dealer='$company' and problem='INSTALLATION' and `date` BETWEEN '$newdate' and '$date'";  
      $result = mysqli_query($connect, $sql);  
      $i=0;

      while($row = mysqli_fetch_array($result))  
      {     
      $i++;  
      $output .= '<tr>  <td>'.$i.'</td>
                          <td>'.$row['cus_name'].'</td>  
                          <td>'.$row['vin_no'].'</td>  
                          <td>'.$row['amount'].'</td>
                          <td>'.$row['serial'].'</td>   
                          <td>'.$row['dealer'].'</td>  
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
      <h4 align="center">Weekly summary reports</h4><br /> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  <th width="5%">No.</th>
                <th width="17%">Client</th>
				<th width="10%">Unique NO.</th>
				<th width="13%">Amount</th>
        <th width="20%">Serial</th>
				<th width="14%">Dealer</th>
				<th width="10%">Inst. Date</th>
				<th width="14%"> Vehicle reg</th>
				
           </tr>  
      '; 
      
       	# code...
       	 $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content); 

      $obj_pdf->Output($today.'.pdf', 'I'); 
     
     
        
       
 ?>  
 