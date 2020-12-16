<?php
session_start();
require 'db.php';
require('TCPDF-master/examples/tcpdf_include.php');
require_once('TCPDF-master/tcpdf_import.php');
$company=$_SESSION['company'];
 
        $id=$_SESSION['vin'];
        $sql="SELECT * FROM `work` WHERE vin_no='$id'";
        $query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($query);
$contact=$row['contact'];
$cus_name=$row['cus_name'];
$make=$row['make'];
$ka=$row['serial'];
//$model=$row['model'];
$chasis=$row['chasis'];
$reg = $row['reg_no'];
$tech = mysqli_real_escape_string($conn, $_POST["service"]);
$serial=mysqli_real_escape_string($conn, $_POST["serial"]);
$problem = $row['problem'];
$action=$row['action'];
$model=$row['model'];
$date=$row['date'];
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
$newdate = strtotime ( '+12 month' , strtotime ( $date ) ) ;
    $newdate = date ( 'd-m-Y' , $newdate );
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
        $vin='JDN-'.sequence();
$gen="unique id:".$vin."\nregistration:".$reg."\nexpiry: ".$newdate ;
$sql="INSERT INTO `work`(`reg_no`, `contact`, `cus_name`, `make`, `model`, `vin_no`, `chasis`, `problem`, `action`, `tech`, `serial`, `date`,`dealer`) VALUES('$reg','$contact','$cus_name','$make','$model','$vin','$chasis','$problem','$action','$tech','$serial','$date','$company')";

$result=mysqli_query($conn,$sql) or die($conn) ;
$results="UPDATE `alocate_serial` SET `sold`='1' WHERE `serial`='$serial'";
    $query=mysqli_query($conn,$results) or die($conn) ; 
    $kas="DELETE FROM work WHERE `serial`='$ka'";
    $ed=mysqli_query($conn,$kas);
    $update="UPDATE `alocate_serial` SET `sold`='1' WHERE `serial`='$ka'";
    $mna=mysqli_query($conn,$update);

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
                $pdf->Text(1, 5, $vin);
                $pdf->Text(210, 37, $vin);
                $pdf->Text(183,37,'Unique ID No');
                $pdf->Text(98,63,'THIS IS TO CERTIFY THAT:');
                $pdf->Text(98,71,'Vehicle Reg No .....................................');
                $pdf->Text(133,70,$reg);
                $pdf->Text(174, 71,'Chassis No...........................................');
                $pdf->Text(198,70,$chasis);
                $pdf->Text(98,78,'Make...............................................');
                $pdf->Text(111,77,$make);
                $pdf->Text(174,78,'Model...........................................................');
                $pdf->Text(190,77,$model);
                $pdf->Text(98,85,'Has been fitted with approved speed governor of type JENDIE ');
                 $pdf->Text(98,93,'SERIAL...................................................');
                $pdf->Text(115,92,$serial);
                $pdf->Text(174,93,'Date..................................................');
                $pdf->Text(190,92,$date);
                $pdf->Text(98,105,'THE SPEED GOVERNOR IS SET AND SEALED NOT TO EXCEED 80km/h');
                $pdf->Text(110,115,'This certificate is valid for 12 months from date of issuing.');
                $pdf->Text(98,121,'Its is an offence to tamper with the governor and it will nullify all warranty and conditions');
                $pdf->Text(98,129,'Signed with stamp by Supplier/Dealer/Agent');
                $pdf->Text(98,137,'FITTING CENTER DETAILS');
                $pdf->Text(98,145,'Business Reg. No...........................................');
                $pdf->Text(135,144,$business_reg);
                $pdf->Text(183,145,'Pin No..........................');
                $pdf->Text(198,144,$pin_no);
                $pdf->Text(230,145,'VAT No..........................');
                $pdf->Text(246,144,$vat);
                $pdf->Text(98,152,'Company Address..............................................................................');
                $pdf->Text(135,151,$address);
                $pdf->Text(98,159,'Date of Installation/Inspection........................................');
                $pdf->Text(157,158,$date);
                $pdf->Text(201,159,'Certified by...........................................');
                $pdf->Text(98,166, 'signature.........................................');
                $pdf->Text(165,166,'EXPIRY DATE................................................................');
                $pdf->Text(198,166,$newdate);
               
                
                
                //vehicle sitcker
                $pdf->Text(58, 146, $vin);
                $pdf->write2DBarcode($gen, 'DATAMATRIX',45, 140, 0, 12, $style, 'N');
                $pdf->Text(19,154,'Veh. Reg. No................................');
                $pdf->Text(46,153,$reg);
                $pdf->Text(19,160,'Serial....................................');
                $pdf->Text(32,159,$serial);
                $pdf->Text(19,165,'Chassis......................................');
                $pdf->Text(35,164,$chasis);
                $pdf->Text(19,170,'Inst. Date....................................');
                $pdf->Text(39,169,$date);
                 
                $pdf->Text(19,177,'EXPIRY.................................');
                  
                $pdf->Text(35,176,$newdate);
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
     
	

?>