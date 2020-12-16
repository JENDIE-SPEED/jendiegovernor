<?php
session_start();
require 'db.php';
require('TCPDF-master/examples/tcpdf_include.php');
require_once('TCPDF-master/tcpdf_import.php');
$company=$_SESSION['company'];
$user=  $_SESSION['user'];
  function sequence(){
    $letter = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    $content = file_get_contents("seq_file");
    $content = file_get_contents("seq_file") + 1 ;
    $letter_number = file_get_contents("letter_number");

    if ($content ==99999){

        file_put_contents("seq_file",0);
        $content = 0 ;
        $letter_number = $letter_number + 1 ;
        file_put_contents("letter_number",$letter_number);
    }
    file_put_contents("seq_file",$content);

       return sprintf("%s-%04d",$letter[$letter_number],$content); // A-0252
        } 
$cus_name=$_SESSION['customer'];
$contact=$_SESSION['contact'];
$make=$_SESSION['make'];
$model=$_SESSION['model'];
$chasis=$_SESSION['chasis'];
$reg = $_SESSION['reg'];
$tech = $_SESSION['tech'];
$serial=$_SESSION['serial'];
$problem = $_SESSION['problem'];
$action=$_SESSION['action'];
$service="INSATALLATION";
$date=date('d-m-Y');
$phone=$_SESSION['phone'];
$query="SELECT * from users where company='$company'";
$query1=mysqli_query($conn,$query);
$query2=mysqli_fetch_array($query1);
$id=$query2['id'];
$select="SELECT * from dealer_info where dealer_id='$id'";
$select_query=mysqli_query($conn,$select);
$dealer_info=mysqli_fetch_array($select_query);
$business_reg=$dealer_info['business_reg'];
$pin_no=$dealer_info['pin_no'];
$vat=$dealer_info['vat'];
$address=$dealer_info['address'];
$date1=date('Y-m-d');
$date2=date('Y-m-d',strtotime($date1 . "-0 days"));
$newdate = strtotime ( '+365 day' , strtotime ( $date2 ) ) ;
    $newdate = date ( 'd-m-Y' , $newdate );
   
$vin='JDN-'.sequence();
$gen="unique id:".$vin."\nregistration:".$reg."\nexpiry: ".$newdate ;
$sql="INSERT INTO `work`(`reg_no`, `contact`, `cus_name`, `make`, `model`, `vin_no`, `chasis`, `problem`, `action`, `tech`, `serial`, `date`,`dealer`,`user`,`phone`) VALUES('$reg','$contact','$cus_name','$make','$model','$vin','$chasis','$problem','$action','$tech','$serial','$date2','$company','$user','$phone')";

$result=mysqli_query($conn,$sql) ;
if ($result===true && $reg!='KCB 934D' && $reg!='KCB934D' && $reg!='KCT 358A' && $reg!='KCT358A' ) {
    # code...
    $results="UPDATE `alocate_serial` SET `sold`='1' WHERE `serial`='$serial'";
    $query=mysqli_query($conn,$results) ;
    if ($query===true) {
        # code...
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);

        /*$pdf->SetTitle('Fireball Technologies');ALTER TABLE `cert` ADD `address` VARCHAR(225) NOT NULL AFTER `contact`;
        $pdf->SetSubject('Fireball Technologies');
        $pdf->SetKeywords('fireball tech');*/

        // set default header data
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // set header and footer fonts
        //$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        //$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // NOTE: 2D barcode algorithms must be implemented on 2dbarcode.php class file.

        // set font
        $pdf->SetFont('helvetica', 8);

        // add a page
        $pdf->AddPage();

        // print a message
        //$txt = "james kinuthia.\n";
        //$pdf->MultiCell(90, 50, $txt, 0, 'J', false, 1, 125, 30, true, 0, false, true, 0, 'T', false);


        $pdf->SetFont('helvetica', 8);

        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

        // set style for barcode
        /*    'border' => true,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );*/


        $style = array(
            'border' => false,
            'padding' => 0,
            'fgcolor' => array(128,0,0),
            'bgcolor' => false
        );

                 $pdf->write2DBarcode($gen, 'DATAMATRIX',245, 29, 0, 17, $style, 'N');
                $pdf->Text(1, 37, $vin);
                $pdf->Text(200, 37, $vin);
                $pdf->Text(173,37,'Unique ID No');
                $pdf->Text(108,63,'THIS IS TO CERTIFY THAT:');
                $pdf->Text(108,71,'Vehicle Reg No .....................................');
                $pdf->Text(143,70,$reg);
                $pdf->Text(184, 71,'Chassis No...........................................');
                $pdf->Text(208,70,$chasis);
                $pdf->Text(108,78,'Make...............................................');
                $pdf->Text(121,77,$make);
                $pdf->Text(184,78,'Model...........................................................');
                $pdf->Text(200,77,$model);
                $pdf->Text(108,85,'Has been fitted with approved speed governor of type JENDIE ');
                 $pdf->Text(108,93,'SERIAL...................................................');
                $pdf->Text(125,92,$serial);
                $pdf->Text(184,93,'Date..................................................');
                $pdf->Text(200,92,$date2);
                $pdf->Text(108,105,'THE SPEED GOVERNOR IS SET AND SEALED NOT TO EXCEED 80km/h');
                $pdf->Text(120,115,'This certificate is valid for 12 months from date of issuing.');
                $pdf->Text(108,121,'Its is an offence to tamper with the governor and it will nullify all warranty and conditions');
                $pdf->Text(108,129,'Signed with stamp by Supplier/Dealer/Agent');
                $pdf->Text(108,137,'FITTING CENTER DETAILS');
                $pdf->Text(108,145,'Business Reg. No.............................................');
                $pdf->Text(145,144,$business_reg);
                $pdf->Text(195,145,'Pin No..........................');
                $pdf->Text(208,144,$pin_no);
                $pdf->Text(240,145,'VAT No..........................');
                $pdf->Text(256,144,$vat);
                $pdf->Text(108,152,'Company Address..............................................................................');
                $pdf->Text(145,151,$address);
                $pdf->Text(108,159,'Date of Installation/Inspection........................................');
                $pdf->Text(167,158,$date2);
                $pdf->Text(211,159,'Certified by...........................................');
                $pdf->Text(108,166, 'signature.........................................');
                $pdf->Text(175,166,'EXPIRY DATE................................................................');
                $pdf->Text(208,165,$newdate);
               
                
                
                //vehicle sitcker
               $pdf->Text(59, 146, $vin);
                $pdf->write2DBarcode($gen, 'DATAMATRIX',47, 140, 0, 12, $style, 'N');
                $pdf->Text(25,154,'Veh. Reg. No................................');
                $pdf->Text(52,153,$reg);
                $pdf->Text(25,160,'Serial....................................');
                $pdf->Text(38,159,$serial);
                $pdf->Text(25,165,'Chassis......................................');
                $pdf->Text(41,164,$chasis);
                $pdf->Text(25,170,'Inst. Date....................................');
                $pdf->Text(45,169,$date2);
                 
                $pdf->Text(25,177,'EXPIRY.................................');
                  
                $pdf->Text(41,176,$newdate);
                // cert copy
                /*
                $pdf->Text(1,10,'VEHICLE ................');
                $pdf->Text(114, 86,'Chasis No......................................');
                $pdf->Text(137,85,$chasis);
                $pdf->Text(1,92,'MAKE.........................................................................................');
                $pdf->Text(55,91,$make);
                $pdf->Text(1,98,'SERIAL NO......................................................................');
                $pdf->Text(55,97,$serial);
                $pdf->Text(114,98,'DATE................................');
                $pdf->Text(137,97,$date);
                $pdf->Text(1,107,'EXPIRY DATE.....................................................................');
                $pdf->Text(55,106,$newdate);
                
                 //$pdf->Text(5,118, 'signature.........................................');
                $pdf->Text(1,147,'DEALER NAME..................................................');
                $pdf->Text(85,147,'business registration N0..........................');
                $pdf->Text(1,157,'service type..............................................');
                $pdf->Text(40,156,$service);
                 */
        // -------------------------------------------------------------------

        //Close and output PDF document
        $doc=$vin.".pdf";
        $pdf->Output($doc, 'I');
     
    } 
    else{
        echo $serial;
    }   
}
 else {
    # code...
    echo"data not inserted";
}

?>