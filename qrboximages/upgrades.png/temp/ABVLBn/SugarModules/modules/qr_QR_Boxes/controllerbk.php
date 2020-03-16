<?php

class qr_QR_BoxesController extends SugarController{
	function __construct(){
		parent::__construct();
	}

    /**
     * @deprecated deprecated since version 7.6, PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code, use __construct instead
     */
    function qr_QR_BoxesController(){
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

            $pdf = new FPDF();
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',16);

			$i=1;
			$a=8;$b=25;$c=25;
			$variables='';
			$h = 10;
            foreach ( $recordIds as $recordId ) 
            {
            	if($i==1)
            	{
            		$variables='10,10,-300';
            		
            	}
            	if($i==2)
            	{
            		$variables='45,10,-300';
            		//$v = '110';

            	}
            	if($i==3)
            	{
            		$variables='80,10,-300';
            		
            	}
            	if($i==4)
            	{
            		$variables='115,10,-300';
            		
						
            		
            	}
					if($i==5)
            	{
            		$variables='10,95,-300';
						$a = 38;
						$pdf->Ln();
            		
            	}
					if($i==6)
            	{
            		$variables='155,60,-300';
            		
            	}
            	

            	$bean= BeanFactory::getBean('qr_QR_Boxes',$recordId);

            	$str='qrboximages/'.$bean->qr_image_c.'.png';
            	$qr_id = $bean->name; 
            	$product_name = $bean->st_products_qr_qr_boxes_1_name;
            	$date = $bean->date_entered;
            	$truck = $bean->truck_info_c;
					$pdf->SetFont('Arial','',5);
					$m = $qr_id.$product_name;
					
            	$image = $pdf->Image($str,$variables,$a,$b,$c);
            	//$pdf->Cell(25, 25, $image, 0, 0, 'C',false);
            	$pdf->cell(25,47,$product_name,0,0,'L',false);
					$pdf->cell(10,52,$qr_id,0,0,'C',false);
               //$pdf->Ln();
					//$pdf->SetX($h);
            	
					$pdf->cell(10,55,$date,0,0,'L',false);
     		
            	
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