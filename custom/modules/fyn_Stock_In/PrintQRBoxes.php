<?php
if ( !empty($_REQUEST['uid']) ) {
	require_once('include/tcpdf/config/lang/eng.php');
	require_once('include/tcpdf/tcpdf.php');
	require_once('include/Sugar_Smarty.php');
	require_once('modules/AOS_PDF_Templates/PDF_Lib/mpdf.php');
	global $db;

	$uids = $_REQUEST['uid'];
	$stokin_ids = "'" . str_replace(",","','",$uids) . "'";

	// $stokin_id = 'b7707db4-39fd-9c2c-fff3-5df0c088d622';
	//Get related QR Boxes Ids from selected Stockin records ids
	$sql = "SELECT fyn_stock_in_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb as qr_id
			FROM fyn_stock_in_fyn_qr_code_boxes_1_c where deleted='0' 
			AND fyn_stock_in_fyn_qr_code_boxes_1fyn_stock_in_ida IN ($stokin_ids)";

	$result = $db->query($sql);
	$qrBoxIds = array();
	while($row = $db->fetchByAssoc($result)){
		$qrBoxIds[] = $row['qr_id'];
	}
	$total_records = sizeof($qrBoxIds); //get size of qrboxes aray to check if its last element or not

	//Start Html element to create table
	$html = '<table cellspacing="20" width="100%" align="center" >';
	foreach($qrBoxIds as $key => $qrBoxId ){
		$qrBoxBean = BeanFactory::getBean('fyn_QR_CODE_BOXES',$qrBoxId);
		$str='upload/'.$qrBoxBean->qr_image;
		if (!file_exists($str.'.png'))
		{
			copy($str, $str.'.png');
		}
		$qr_image= $str.'.png';
		// $qr_image= $qrBoxBean->qr_image;
		$qr_id = $qrBoxBean->name; 
		$product_name = $qrBoxBean->aos_products_fyn_qr_code_boxes_1_name;
		$date = $qrBoxBean->date_entered;
		$truck = $qrBoxBean->truck_info;
		if($key % 2 == 0){
			$html .= '<tr>
			<td style="background:#fff;border-radius: 20px !important;border: solid 2px #000;padding: 10px;border-style: solid;"> 
				<table align="center"><tr>
					<td><img src="'.$qr_image.'" height="160" width="160"></td>
					<td><p style="font-size: 12px;font-family: Arial;">'.$product_name .'<br>'. $qr_id . '<br>'. $date . '<br>'. $truck .'</p>
					
					</td>
				</tr></table>
			</td>';
			if($key == $total_records - 1){
				$html .= '</tr>';
			}
		}else{
			$html .= '<td style="background:#fff;border-radius: 20px !important;border: solid 2px #000;padding: 10px;border-style: solid;">
				<table align="center"><tr>
					<td><img src="'.$qr_image.'" height="160" width="160"></td>
					<td><p style="font-size: 12px;font-family: Arial;">'.$product_name .'<br>'. $qr_id . '<br>'. $date . '<br>'. $truck .'</p></td>
				</tr></table>
				</td>
			</tr>';
		}

	}

	$html .= '</table>';
	$html='<style>@page {margin-top: 50px;margin-bottom: 30px;margin-left: 15px;margin-right: 15px;}</style>'.$html;
	$printable = str_replace("\n","<br />",$html);	
	$pdf=new mPDF();
	// $pdf->setAutoFont();
	$pdf->SetFont('Arial','',9);
	$pdf->writeHTML($html);

	ob_clean();
	$pdfName = "QRBoxes.pdf";

	$pdf->Output($pdfName, "D"); //download pdf
}
?>