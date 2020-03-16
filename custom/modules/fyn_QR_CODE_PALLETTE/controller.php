<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
class fyn_QR_CODE_PALLETTEController extends SugarController{
	function __construct(){
		parent::__construct();
	}

    /**
     * @deprecated deprecated since version 7.6, PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code, use __construct instead
     */
    function fyn_QR_CODE_PALLETTEController(){
        $deprecatedMessage = 'PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code';
        if(isset($GLOBALS['log'])) {
            $GLOBALS['log']->deprecated($deprecatedMessage);
        }
        else {
            trigger_error($deprecatedMessage, E_USER_DEPRECATED);
        }
        self::__construct();
    }

	
	function action_editview(){
		$this->view = 'edit';
		return true;
	}

	

	public function action_displaypassedids() 
    {
    	require('fpdf/fpdf.php');
//require('WriteHTML.php');

		$pdf = new FPDF();
        if ( !empty($_REQUEST['uid']) ) 
        {
        //	echo $_REQUEST['uid'];
             $recordIds = explode(',',$_REQUEST['uid']);

            $pdf = new FPDF();
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',16);

			$i=1;
			$firstX = $pdf->GetX();
            $firstY = $pdf->GetY();
            foreach ( $recordIds as $recordId ) 
            {
                if($i==5){
                    $pdf->AddPage();                
                    $i=1;
                    $pdf->SetXY($firstX,$firstY);
                }
                //echo $recordId;
            	$pallete= BeanFactory::getBean('fyn_QR_CODE_PALLETTE',$recordId);
                 //echo "<pre>";print_r($pallete); exit;
               // echo $pallete->qr_image_c;exit;
            	//echo 
            	if($pallete->qrimage == '')
            		continue;
            	$str='qrboximages/'.$pallete->qrimage.'.png'; // exit;
            	$qr_id = $pallete->name; 
            	$no_of_boxes = $pallete->total_boxes;
            	$date = $pallete->date_entered;
            	$truck = $pallete->truckinfo;
            	$farm = $pallete->farmunit;
					$pdf->SetFont('Arial','',10);
					//$m = $qr_id.$product_name;
				$pdf->Cell(70, 70, $pdf->Image($str,$pdf->GetX(),$pdf->GetY(),70,70), 0, 2, 'C',false);
                $pdf->Cell(70, 4, $qr_id, 0, 2, 'C',false);
                $pdf->Cell(70, 4, 'Boxes :'.$no_of_boxes, 0, 2, 'C',false);
                $pdf->Cell(70, 4, $date, 0, 2, 'C',false);
                $pdf->Cell(70, 4, 'Truck Info :'.$truck, 0, 2, 'C',false);
                $pdf->Cell(70, 4, $farm, 0, 2, 'C',false);
                if($i<2)
                    $pdf->SetXY((int)$pdf->GetX()+100,10);
                elseif($i<4)
                    $pdf->SetXY((int)$pdf->GetX()+100,110);
                elseif($i<6)
                    $pdf->SetXY((int)$pdf->GetX()+100,210);
                elseif($i<8)
                    $pdf->SetXY((int)$pdf->GetX()+100,310);
                if($i==2 || $i==4)
                    $pdf->SetX($firstX);
            	//$image = $pdf->Image($str,$variables,$a,$b,$c);
            	//$pdf->Cell(25, 25, $image, 0, 0, 'C',false);
            	//$pdf->cell(25,47,$qr_id,0,0,'L',false);
				//	$pdf->cell(10,52,$no_of_boxes,0,0,'C',false);
               //$pdf->Ln();
					//$pdf->SetX($h);
            	
				//	$pdf->cell(10,55,$date,0,0,'L',false);
				//	$pdf->cell(10,55,$truck,0,0,'L',false);
				//	$pdf->cell(10,55,$farm,0,0,'L',false); */
     		
            	
            	//$pdf->Cell( 38, 38, $image, 1, 0, 'C',false);
            	//$pdf->Cell( 28, 28,  $pdf->Image($str,'20,20,-300',$a,$b,$c), 0, 0, 'R',false);
					//$pdf->Write(28,$qr_id);
            	/*$qr_id = $bean->name; 
            	$product_name = $bean->st_products_qr_qr_boxes_1_name;
            	$date = $bean->date_entered;
            	$truck = $bean->truck_info_c;
            	$pdf->Image($str,$variables,$a,$b,$c);
            	$pdf->SetFont('Arial','',5);*/
            	
            	
					//$pdf->Write(110,$product_name);
					//$pdf->Write(120,$qr_id);
					
					//$pdf->Write(150,$date);
				//	$pdf->Write(180,$truck);
            	// $str='http://101.53.136.161/avocado/SuiteCRMnew/index.php?entryPoint=download&id='.$bean->qr_image_c.'&type=qr_QR_Boxes';
            	
            	//$a=$a+5;
            	//$b=$b+30;
            	//$c=$c+40;
//$v = $v+20;
            	//$pdf->Ln();
            	$i++;
            }


            

			$pdf->Output();

			//exit;


         
        }
        }
    
      //  sugar_die('');
    //}



}
?>