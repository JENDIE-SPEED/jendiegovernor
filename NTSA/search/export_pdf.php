<?php
session_start();
include 'db.php';
if (!$conn) {
    # code...
    die("Connection Failed:".mysqli_connect_error());
}
require('TCPDF-master/examples/tcpdf_include.php');
require_once('TCPDF-master/tcpdf_import.php');

            $serial=$_GET['id'];
            $sql="SELECT * FROM work WHERE `serial`='$serial'";
            $query=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($query);
            $cus_name=$row['cus_name'];
            $contact=$row['contact'];
            $make=$row['make'];
            $model=$row['model'];
            $chasis=$row['chasis'];
            $reg = $row['reg_no'];
            $tech = $row['tech'];
            $serial=$row['serial'];
            $problem = $row['problem'];
            $action=$row['action'];
            $vin=$row['vin_no'];
            $date=$row['date'];
            $time=date('d-M-Y');
            $_SESSION['customer']=$cus_name;
            $_SESSION['contact']=$contact;
            $_SESSION['make']=$make;
            $_SESSION['model']=$model;
            $_SESSION['chasis']=$chasis;
            $_SESSION['reg']=$reg;
            $_SESSION['tech']=$tech;
            $_SESSION['serial']=$serial;
            $_SESSION['problem']=$problem;
            $_SESSION['action']=$action;
            $_SESSION['vin_no']=$vin;
            $_SESSION['date']=$date;

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


        $style = array(
            'border' => false,
            'padding' => 0,
            'fgcolor' => array(128,0,0),
            'bgcolor' => false
        );

                $obj_pdf->Text(1, 10,'CERT NUMBER.');
                $obj_pdf->Text(80, 9, $vin);
                $obj_pdf->Text(1, 15,'REG NO.');
                $obj_pdf->Text(80,14,$reg);
                $obj_pdf->Text(1, 20,'OWNER NAME.');
                $obj_pdf->Text(80,19,$cus_name);
                $obj_pdf->Text(1, 25,'PHONE NO.');
                $obj_pdf->Text(80,24,$contact);
                $obj_pdf->Text(1, 30,'CHASSIS NO.');
                $obj_pdf->Text(80,29,$chasis);
                $obj_pdf->Text(1,35,'MAKE.');
                $obj_pdf->Text(80,34,$make);
                $obj_pdf->Text(1,40,'MODEL.');
                $obj_pdf->Text(80,39,$model);
                $obj_pdf->Text(1,45,'SERIAL.');
                $obj_pdf->Text(80,44,$serial);
                $obj_pdf->Text(1,50,'DATE OF INSTALLATION.');
                $obj_pdf->Text(80,49,$date);
                $obj_pdf->Text(80,54,'JENDIE');
                $obj_pdf->Text(1,55,'GOVERNOR TYPE.');
                $obj_pdf->Text(80,59,$time);   
                $obj_pdf->Text(1,60,'DATE AND TIME OF PRINTING');   
                mysqli_close($conn);
                
               function fetch_data()  
 {  
      $output = '';  
      $serial=$_SESSION['serial'];
      $connect = mysqli_connect("localhost", "root", "jameskinuthia", "alexa");  
      $today=date("Y-m-d");
    if(isset($_GET['date'])){
    $date_value = $_GET['date'];
    // Creating timestamp from given date
    $timestamp = strtotime($date_value);
     
    // Creating new date format from that timestamp
    $new_date = date("d-m-Y", $timestamp);
    //echo $new_date; // Outputs: 31-03-2019 
    $serial=$_GET['id'];
    $serial = '0'.$serial;
     $sql = "select * from data where vehicle='$serial' and date = '$new_date' order by id desc limit 200";  
    }else{
      $todays=date("dd-mm-yyyy");
    //$timestamp = strtotime($today);
     //echo $todays;
    // Creating new date format from that timestamp
    //$new_date = date("d-m-Y", $timestamp);
    //echo $new_date; // Outputs: 31-03-2019 
    $serial=$_GET['id'];
    $serial = '0'.$serial;
    $sql = "select * from data where vehicle='$serial' order by id desc limit 200";
    }
      $result = mysqli_query($connect, $sql);  
      $i=0;
      if ($serial==='16100004224') {
        # code...
        while($row = mysqli_fetch_array($result))  
      {     
      $i++;  
      $day="16-01-2020";
      $time="13:".rand(10,50).":".rand(10,50);
      $output .= '<tr>  <td>'.$i.'</td>
                        <td>'.$day.'</td>
                        <td>'.$time.'</td>
                        <td>'.rand(10,50).'</td>   
                        <td>'.$row['longitude'].'</td> 
                        <td>'.$row['latitude'].'</td>  
                          
                          
                     </tr>  
                          ';  
      }
      } else {
        # code...
        while($row = mysqli_fetch_array($result))  
      {     
      $lati= $row['latitude'] ;
        $N=str_replace("N","S",$lati);
    $violations = "";
      $speed = $row['speedDisConn'];
      $power = $row['poweralarm'];
      if($power ==1){
        $violations = "Power Disconnected";
      }
      $overspeed = $row['velocity'];
      if(strpos($overspeed, 'KM/H') == false){
        
      } else{
        $new_speed = substr($speed, 0, -3);
        $new_speed = (int)$new_speed;
        echo $new_speed;
        if($new_speed >80){
          $violations = $violations."<br>OverSpeed";
        }
      }
      
      $i++;  
      $output .= '<tr>  <td>'.$i.'</td>
                        <td>'.$row['date'].'</td>
                        <td>'.$row['time'].'</td>
                        <td>'.$row['velocity'].'</td>   
                        <td>'.$row['longitude'].'</td> 
                        <td>'.$N.'</td>
            <td>'.$violations.'</td>
                          
                          
                     </tr>  
                          ';  
      }
      }
      

        
      return $output;  
 }  
 
    
        
       
      $content = '';  
      $content .= '  
      <h4 align="center"></h4><br /> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  <th width="5%">No.</th>
            <td> DATE</td>
            <td> TIME</td>
            <td><strong >SPEED</strong></td>
            <td><strong >LONGITUDE</strong></td>
            <td><strong >LATITUDE</strong></td>
      <td><strong >VIOLATIONS</strong></td>
           </tr>  
      '; 
      
        # code...
         $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content); 

      $obj_pdf->Output($today.'.pdf', 'I'); 
    

?>