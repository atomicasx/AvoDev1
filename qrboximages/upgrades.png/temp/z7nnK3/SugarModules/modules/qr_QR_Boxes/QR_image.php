<?php
include "custom/modules/qr_QR_Pallete/qrcode.php"; 
include "UploadFile.php";
if(!defined('sugarEntry') || !sugarEntry) die('Not a valid Entry Point');
class QR_IMAGE
{
	function QR_IMAGE_method($bean, $even, $arguments)
	{
		global $db;
						$product_id = $bean->st_products_qr_qr_boxes_1st_products_ida;
						$query =$db->query("SELECT name FROM st_products WHERE id='".$product_id."'");
						$row = $db->fetchByAssoc($query);
						$product_name = $row['name'];
						$d1= date("md");
						//$bean->name = "PL"."$d1"."001";

						$imgpl=$bean->id; 
        				$qc = new QrCode(); 
                  $qc->TEXT("C1BX28"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg;
                  
                  if($row['name'] == 'Avocado Class1  Box of 28'){
                   $qc = new QrCode(); 
                  $qc->TEXT("C1BX28"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg;
                  $id_to_set = 'C1BX28-'.$d1; 
                  }
                    if($row['name'] == 'Avocado Class1  Box of 32'){ 
                    $id_to_set = 'C1BX32-'.$d1;
                    $qc = new QrCode(); 
                  $qc->TEXT("C1BX32"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg; 
                    }
                    if($row['name'] == 'Avocado Class1  Box of 36'){ $id_to_set = 'C1BX36-'.$d1;
                    $qc = new QrCode(); 
                  $qc->TEXT("C1BX36"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg; 
                    
                     }
                    if($row['name'] == 'Avocado Class1  Box of 40'){ $id_to_set = 'C1BX40-'.$d1;
                    $qc = new QrCode(); 
                  $qc->TEXT("C1BX40"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg; 
                   }
                    if($row['name'] == 'Avocado Class1  Box of 48'){ $id_to_set = 'C1BX48-'.$d1;
                    $qc = new QrCode(); 
                  $qc->TEXT("C1BX48"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg; 
                   }
                    if($row['name'] == 'Avocado Class1  Box of 60'){ $id_to_set = 'C1BX60-'.$d1;
                    $qc = new QrCode(); 
                  $qc->TEXT("C1BX60"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg; 
                   }
                    if($row['name'] == 'Avocado Class1  Box of 70'){ $id_to_set = 'C1BX70-'.$d1; 
                    $qc = new QrCode(); 
                  $qc->TEXT("C1BX70"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg; 
                  }
                    if($row['name'] == 'Avocado Class1  Box of 84'){ $id_to_set = 'C1BX84-'.$d1;
                    $qc = new QrCode(); 
                  $qc->TEXT("C1BX84"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg; 
                   }
                    
                    if($row['name'] == 'Avocado Class2  Box of 28'){ $id_to_set = 'C2BX28-'.$d1;
                    $qc = new QrCode(); 
                  $qc->TEXT("C2BX28"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg;  }
                    if($row['name'] == 'Avocado Class2  Box of 32'){ $id_to_set = 'C2BX32-'.$d1; 
						$qc = new QrCode(); 
                  $qc->TEXT("C2BX32"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg;}
                    if($row['name'] == 'Avocado Class2  Box of 36'){ $id_to_set = 'C2BX36-'.$d1; 
                    $qc = new QrCode(); 
                  $qc->TEXT("C2BX36"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg;}
                    if($row['name'] == 'Avocado Class2  Box of 40'){ $id_to_set = 'C2BX40-'.$d1; 
                    $qc = new QrCode(); 
                  $qc->TEXT("C2BX40"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg;}
                    if($row['name'] == 'Avocado Class2  Box of 48'){ $id_to_set = 'C2BX48-'.$d1; 
                    $qc = new QrCode(); 
                  $qc->TEXT("C2BX48"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg;}
                    if($row['name'] == 'Avocado Class2  Box of 60'){ $id_to_set = 'C2BX60-'.$d1;
                    $qc = new QrCode(); 
                  $qc->TEXT("C2BX60"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg; }
                    if($row['name'] == 'Avocado Class2  Box of 70'){ $id_to_set = 'C2BX70-'.$d1;
                    $qc = new QrCode(); 
                  $qc->TEXT("C2BX70"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg; }
                    if($row['name'] == 'Avocado Class2  Box of 84'){ $id_to_set = 'C2BX84-'.$d1;
                    $qc = new QrCode(); 
                  $qc->TEXT("C2BX84"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg; }
                    
                    if($row['name'] == 'Avocado Organic  Box of 28'){ $id_to_set = 'ORBX28-'.$d1;
                    $qc = new QrCode(); 
                  $qc->TEXT("ORBX28"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg; }
                    if($row['name'] == 'Avocado Organic  Box of 32'){ $id_to_set = 'ORBX32-'.$d1; 
                    $qc = new QrCode(); 
                  $qc->TEXT("ORBX32"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg;}
                    if($row['name'] == 'Avocado Organic  Box of 36'){ $id_to_set = 'ORBX36-'.$d1;
                    $qc = new QrCode(); 
                  $qc->TEXT("ORBX36"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg; }
                    if($row['name'] == 'Avocado Organic  Box of 40'){ $id_to_set = 'ORBX40-'.$d1; 
                    $qc = new QrCode(); 
                  $qc->TEXT("ORBX40"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg;}
                    if($row['name'] == 'Avocado Organic  Box of 48'){ $id_to_set = 'ORBX48-'.$d1;
                    $qc = new QrCode(); 
                  $qc->TEXT("ORBX48"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg; }
                    if($row['name'] == 'Avocado Organic  Box of 60'){ $id_to_set = 'ORBX60-'.$d1;
                    $qc = new QrCode(); 
                  $qc->TEXT("ORBX60"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg; }
                    if($row['name'] == 'Avocado Organic  Box of 70'){ $id_to_set = 'ORBX70-'.$d1;
                    $qc = new QrCode(); 
                  $qc->TEXT("ORBX70"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg; }
                    if($row['name'] == 'Avocado Organic  Box of 84'){ $id_to_set = 'ORBX84-'.$d1;
                    $qc = new QrCode(); 
                  $qc->TEXT("ORBX84"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                  $fimg = "$imgpl"."_qr_image_c";
                  $bean->qr_image_c = $fimg; }
                        
       // QR - Box Id
       				/*$qc = new QrCode(); 
                  $qc->TEXT("ORBX28"."-"."$d1");
                  $qc->QRCODE1(400,"$imgpl"."_qr_image_c");*/
                  //$w= "ORBX28"."-"."$d1";
                  $bean->name = $id_to_set;

    }
 }
?>