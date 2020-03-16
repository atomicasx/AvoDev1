<?php

require_once('include/tcpdf/config/lang/eng.php');
require_once('include/tcpdf/tcpdf.php');
require_once('include/Sugar_Smarty.php');
require_once('modules/AOS_PDF_Templates/PDF_Lib/mpdf.php');
global $db;
// $stokin_id = 'b7707db4-39fd-9c2c-fff3-5df0c088d622';
$stokin_id = 'd5bef517-f8e4-e68e-1eca-5df0be99a340';
$sql = "SELECT fyn_stock_in_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb as qr_id
		FROM fyn_stock_in_fyn_qr_code_boxes_1_c where deleted='0' 
		AND fyn_stock_in_fyn_qr_code_boxes_1fyn_stock_in_ida='$stokin_id'";

$result = $db->query($sql);
$qrBoxIds = array();
while($row = $db->fetchByAssoc($result)){
	$qrBoxIds[] = $row['qr_id'];
}
$total_records = sizeof($qrBoxIds);
$html = '<table cellspacing="20" width="100%" align="center">';
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
		<td style="border-radius: 50px !important;border: 2px solid black;padding: 10px 10px 10px 10px;"> 
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
		$html .= '<td style="border-radius: 50px;border: 2px solid black;padding: 10px 10px 10px 10px;">
			<table align="center"><tr>
				<td><img src="'.$qr_image.'" height="160" width="160"></td>
				<td><p style="font-size: 12px;font-family: Arial;">'.$product_name .'<br>'. $qr_id . '<br>'. $date . '<br>'. $truck .'</p></td>
			</tr></table>
			</td>
		</tr>';
	}

}
echo $html;
die();
$html .= '</table>';
$html='<style>@page {margin: 25px;}</style>'.$html;
$printable = str_replace("\n","<br />",$html);	
$pdf=new mPDF();
// $pdf->setAutoFont();
$pdf->SetFont('Arial','',9);
$pdf->writeHTML($html);

ob_clean();
$pdfName = "QRBoxes.pdf";

$pdf->Output($pdfName, "D");
?>