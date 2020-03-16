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
    	require('fpdf/PDF_Label.php');
		$pdf = new PDF_Label('5163');

        if ( !empty($_REQUEST['uid']) ) 
        {
            $recordIds = explode(',',$_REQUEST['uid']);

            //$pdf = new FPDF();
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',16);

			$i=1;
			$firstX = $pdf->GetX()+15;
                        //echo $firstX;
                        //echo " ---- ";
                        
			$firstY = $pdf->GetY();
                        //echo $firstY;//exit;
                        $pdf->SetXY((int)$pdf->GetX()+15,20);
            foreach ( $recordIds as $recordId ) 
            {			
            	$bean= BeanFactory::getBean('fyn_QR_CODE_BOXES',$recordId);
            	//echo "<pre>";print_r($bean);exit; $bean->qr_image_c;exit;
				$str='upload/'.$bean->qr_image;
				if (!file_exists($str.'.png'))
				{
					copy($str, $str.'.png');
				}
				
				$str= $str.'.png';
				//echo $str;exit;
            	$qr_id = $bean->name; 
            	$product_name = $bean->aos_products_fyn_qr_code_boxes_1_name;
            	$date = $bean->date_entered;
            	$truck = $bean->truck_info;
					$pdf->SetFont('Arial','',9);
					$m = $qr_id.$product_name;
					
				$pdf->Cell(50, 50, $pdf->Image($str,$pdf->GetX(),$pdf->GetY(),40,40), 0, 0, 'C',false);
				//print_r($pdf);
				$pdf->Cell(20, 4, "", 0, 2, 'C',false);
				$pdf->Cell(20, 4, "", 0, 2, 'C',false);
				$pdf->Cell(20, 4, $product_name, 0, 2, 'C',false);
				$pdf->Cell(20, 4, $qr_id, 0, 2, 'C',false);
				$pdf->Cell(20, 4, $date, 0, 2, 'C',false);
				$pdf->Cell(20, 4, 'Truck Info :'.$truck, 0, 2, 'C',false);
				
				if($i<2)
					$pdf->SetXY((int)$pdf->GetX()+50,20);
				elseif($i<4)
					$pdf->SetXY((int)$pdf->GetX()+50,70);
				elseif($i<6)
					$pdf->SetXY((int)$pdf->GetX()+50,120);
				elseif($i<8)
					$pdf->SetXY((int)$pdf->GetX()+50,170);
				elseif($i<10)
					$pdf->SetXY((int)$pdf->GetX()+50,220);
				elseif($i<12)
					$pdf->SetXY((int)$pdf->GetX()+50,290);
				if($i==2 || $i==4 || $i==6 || $i==8 || $i==10)
					$pdf->SetX($firstX);
					
            	
                                if($i==10 && count($recordIds) > 10){
                                    $pdf->AddPage();				
                                    $i=1;
                                    //$pdf->SetXY($firstX,$firstY);
                                    $pdf->SetXY((int)$pdf->GetX()+15,20);
                                } 
                                $i++;  
            }
           //exit;
			$pdf->Output();
			//print_r($pdf);
			//exit;         
        }
        }

}
?>