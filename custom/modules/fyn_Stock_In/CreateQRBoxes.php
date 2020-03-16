<?php
include "qrcode.php"; 
// CreateStockInQRBoxes ();
function randString($length) {
	$char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$char = str_shuffle($char);
	for($i = 0, $rand = '', $l = strlen($char) - 1; $i < $length; $i ++) {
		$rand .= $char{mt_rand(0, $l)};
	}
	return $rand;
}
function CreateStockInQRBoxes(){
	global $db;
	$stockIn_id = '984c9cf1-c205-063d-4fd1-5e5df03f1f8d';
	$bean = BeanFactory::getBean('fyn_Stock_In', $stockIn_id);
	// echo '<pre>';
	// print_r($bean);
	// die();
	$product_id = $bean->aos_products_fyn_stock_in_1aos_products_ida;
	$sqls="SELECT aos_products.id, aos_products_cstm.product_qr_code_c FROM aos_products inner join aos_products_cstm on aos_products.id = aos_products_cstm.id_c WHERE aos_products.id = '".$product_id."' AND aos_products.deleted=0";
	$results=$db->query($sqls);
	$rows=$results->fetch_assoc();
	//echo "<pre>";
	//print_r($bean->fetched_row['quantity']);
	//print_r($bean->quantity);
	
	// if($bean->status_c == "ApproveAndGenerate") {    //Old Condition 
	if($bean->status_c == "ApproveAndGenerate" ){
		
		deleteOldQRBoxes($bean->id);
		$model_name = $rows['product_qr_code_c'];
		//$product_id = $rows['id'];
		$date = date('m/d/Y');
		
		/*echo "<pre>";
		print_r($bean);exit;*/
		$count = $bean->quantity;
		// $count = 15;
		// echo "$count";exit;
		if($count>0){
					  
			for($j=1; $j<=$count; $j++)
			{
				 
					$ii = create_guid();
					$d1= date("md");
					$iii = create_guid();
					$qc = new QrCode(); 
					//$w= $model_name."-"."$d1";
					$w= $model_name."-".$d1."-". randString(5);
					$qc->TEXT($w);
					$qc->QRCODE1(400,"$ii"."_qr_image");
					$no_of_boxes = $j." of ".$count;
					//$qrin =$pl=$bean->qr_in;    
					//
					$in1="INSERT INTO `fyn_qr_code_boxes` SET id = '".$ii."', no_of_boxes= '$no_of_boxes', name='$w',date_entered= '" . $bean->date_modified . "', qr_image ='".$ii."_qr_image"."'";
					$db->query($in1);
					/* if($db->query($in1)){
						echo "qr_boxes id inserted";
					}
					else{
						echo "255"; die ($db->error);
					} */
						
					$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $bean->date_modified . "', 	aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
					$db->query($ins);
					/* if($db->query($ins)){
						echo "product_qr_boxes id inserted";				
					}
					else{
						echo "255"; die ($db->error); 
					} */

					$stock_in_qr_code = create_guid();
					$d1 = $db->query("INSERT INTO fyn_stock_in_fyn_qr_code_boxes_1_c SET id='".$stock_in_qr_code."',fyn_stock_in_fyn_qr_code_boxes_1fyn_stock_in_ida='".$bean->id."',fyn_stock_in_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb='".$ii."',deleted=0");
			}
		}

		//echo "Test123 Here...";
		
	}

}

function deleteOldQRBoxes($stockInId){
	//Delete all old QR Boxes
	global $db;
	//get all QR Box ids related to Stockin ID
	$sql1 = "SELECT fyn_stock_in_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb  
				FROM fyn_stock_in_fyn_qr_code_boxes_1_c 
				WHERE deleted=0 AND fyn_stock_in_fyn_qr_code_boxes_1fyn_stock_in_ida = '$stockInId'";
				
	//Mark Deleted all qrboxes and Products related records			
	$sql2 = "UPDATE aos_products_fyn_qr_code_boxes_1_c SET deleted=1 where deleted=0 
				AND aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb IN ( $sql1 )";
	$db->query($sql2);
	
	//Mark Deleted all qrboxes
	$sql3 = "UPDATE fyn_qr_code_boxes SET deleted=1 where deleted=0 AND id IN ( $sql1 )";
	$db->query($sql3);
	
	//Mark Deleted all qrboxes and Stock In related records
	$sql4 = "UPDATE fyn_stock_in_fyn_qr_code_boxes_1_c SET deleted=1 where deleted=0 AND fyn_stock_in_fyn_qr_code_boxes_1fyn_stock_in_ida = '$stockInId'";
	$db->query($sql4);
	
}
?>