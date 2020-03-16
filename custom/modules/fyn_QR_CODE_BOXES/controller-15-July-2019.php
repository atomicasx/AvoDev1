<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
class fyn_QR_CODE_BOXESController extends SugarController{
	function __construct(){
		parent::__construct();
	}

    /**
     * @deprecated deprecated since version 7.6, PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code, use __construct instead
     */
    function fyn_QR_CODE_BOXESController(){
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
            $recordIds = explode(',',$_REQUEST['uid']);

            //$pdf = new FPDF();
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',16);

			$i=1;
			$firstX = $pdf->GetX();
			$firstY = $pdf->GetY();
            foreach ( $recordIds as $recordId ) 
            {            	            	
				if($i==19){
					$pdf->AddPage();				
					$i=1;
					$pdf->SetXY($firstX,$firstY);
				}
            	$bean= BeanFactory::getBean('fyn_QR_CODE_BOXES',$recordId);
            	//echo "<pre>";print_r($bean);exit; $bean->qr_image_c;exit;
            	$str='qrboximages/'.$bean->qr_image.'.png';
            	$qr_id = $bean->name; 
            	$product_name = $bean->aos_products_fyn_qr_code_boxes_1_name;
            	$date = $bean->date_entered;
            	$truck = $bean->truck_info;
					$pdf->SetFont('Arial','',5);
					$m = $qr_id.$product_name;
				$pdf->Cell(25, 25, $pdf->Image($str,$pdf->GetX(),$pdf->GetY(),25,25), 0, 0, 'C',false);
				$pdf->Cell(25, 3, "", 0, 2, 'C',false);
				$pdf->Cell(25, 3, "", 0, 2, 'C',false);
				$pdf->Cell(25, 3, $product_name, 0, 2, 'C',false);
				$pdf->Cell(25, 3, $qr_id, 0, 2, 'C',false);
				$pdf->Cell(25, 3, $date, 0, 2, 'C',false);
				$pdf->Cell(25, 3, 'Truck Info :'.$truck, 0, 2, 'C',false);
				if($i<3)
					$pdf->SetXY((int)$pdf->GetX()+30,10);
				elseif($i<6)
					$pdf->SetXY((int)$pdf->GetX()+30,55);
				elseif($i<9)
					$pdf->SetXY((int)$pdf->GetX()+30,100);
				elseif($i<12)
					$pdf->SetXY((int)$pdf->GetX()+30,145);
				elseif($i<15)
					$pdf->SetXY((int)$pdf->GetX()+30,190);
				elseif($i<18)
					$pdf->SetXY((int)$pdf->GetX()+30,235);
				if($i==3 || $i==6 || $i==9 || $i==12 || $i==15)
					$pdf->SetX($firstX);
            	$i++;            	
            }
           
			$pdf->Output();

			//exit;         
        }
        }

}
?>