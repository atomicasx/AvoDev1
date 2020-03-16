<?php
 //error_reporting(E_ALL);
//ini_set('display_errors', 1);
define('sugarEntry', TRUE);
ini_set('max_execution_time', 0);
require_once('include/entryPoint.php');
require("config.php");
require("config_override.php");
require_once('modules/Administration/Administration.php');
//shell_exec('service named reload >/dev/null 2>/dev/null &');
//if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
//require_once('include/entryPoint.php');
include "qrcode.php"; 
  include "UploadFile.php";
echo "hello";
global $db;
$count = 25;
echo $date = date('Y-m-d');
 if($count>=0)
              {
 //FOR CLASS1
							  $sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 28' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			             echo $product_id_c128 = $rows['id'];
			             
			             $sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 32' AND deleted=0";
			       	$results=$db->query($sqls);
			       	$rows=$results->fetch_assoc();
			       	$product_id_c132 = $rows['id'];
			       	
			       	$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 36' AND deleted=0";
			       	$results=$db->query($sqls);
			       	$rows=$results->fetch_assoc();
			       	$product_id_c136 = $rows['id'];
			       	
			       	$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 40' AND deleted=0";
			       	  $results=$db->query($sqls);
			       	  $rows=$results->fetch_assoc();
			       	  $product_id_c140 = $rows['id'];
			       	  
			       	  $sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 48' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id_c148 = $rows['id'];
			       		
			       		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 60' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id_c160 = $rows['id'];
			       		
			       		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 70' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id_c170 = $rows['id'];
			       		
			       		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 84' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id_c184 = $rows['id'];
			       		
			       		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 96' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id_c196 = $rows['id'];
			       		
			       		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 108' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id_c1108 = $rows['id'];
			       		
			       		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 120' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id_c1120 = $rows['id'];
			       		
			       		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 132' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id_c1132 = $rows['id'];
			       		
			       		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 144' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id_c1144 = $rows['id'];
			       		
			       		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 156' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id_c1156 = $rows['id'];
			       		
			       		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 168' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id_c1168 = $rows['id'];
              			  for($j=1; $j<=$count; $j++)
                       {
			             
			                $iic128 = create_guid();
			                $d1= date("md");
							    $iiic128 = create_guid();
	                      $qcc128 = new QrCode(); 
                     	 $qcc128->TEXT("C1BX28"."-"."$d1"."$j");
                         $qcc128->QRCODE1(400,"$iic128"."_qr_image");
                         $w1= "C1BX28"."-"."$d1".$j;
                         
                         $iic132 = create_guid();
			               // $d1= date("md");
							    $iiic132 = create_guid();
	                      $qcc132 = new QrCode(); 
                     	 $qcc132->TEXT("C1BX32"."-"."$d1"."$j");
                         $qcc132->QRCODE1(400,"$iic132"."_qr_image");
                         $w2= "C1BX32"."-"."$d1".$j;
                          
                         $iic136 = create_guid();
			               // $d1= date("md");
							    $iiic136 = create_guid();
	                      $qcc136 = new QrCode(); 
                     	 $qcc136->TEXT("C1BX36"."-"."$d1"."$j");
                         $qcc136->QRCODE1(400,"$iic136"."_qr_image");
                         $w3= "C1BX36"."-"."$d1".$j;
                         
                         
                         $iic140 = create_guid();
			              //  $d1= date("md");
							    $iiic140 = create_guid();
	                      $qcc140 = new QrCode(); 
                     	 $qcc140->TEXT("C1BX40"."-"."$d1"."$j");
                         $qcc140->QRCODE1(400,"$iic140"."_qr_image");
                         $w4= "C1BX40"."-"."$d1".$j;
                         
                         $iic148 = create_guid();
			                //$d1= date("md");
							    $iiic148 = create_guid();
	                      $qcc148 = new QrCode(); 
                     	 $qcc148->TEXT("C1BX48"."-"."$d1"."$j");
                         $qcc148->QRCODE1(400,"$iic148"."_qr_image");
                         $w5= "C1BX48"."-"."$d1".$j;
                         
                         $iic160 = create_guid();
			               // $d1= date("md");
							    $iiic160 = create_guid();
	                      $qcc160 = new QrCode(); 
                     	 $qcc160->TEXT("C1BX60"."-"."$d1"."$j");
                         $qcc160->QRCODE1(400,"$iic160"."_qr_image");
                         $w6= "C1BX60"."-"."$d1".$j;
                         
                         $iic170 = create_guid();
			               // $d1= date("md");
							    $iiic170 = create_guid();
	                      $qcc170 = new QrCode(); 
                     	 $qcc170->TEXT("C1BX70"."-"."$d1"."$j");
                         $qcc170->QRCODE1(400,"$iic170"."_qr_image");
                         $w7= "C1BX70"."-"."$d1".$j;
                         
                         
                         $iic184 = create_guid();
			               // $d1= date("md");
							    $iiic184 = create_guid();
	                      $qcc184 = new QrCode(); 
                     	 $qcc184->TEXT("C1BX84"."-"."$d1"."$j");
                         $qcc184->QRCODE1(400,"$iic184"."_qr_image");
                         $w8= "C1BX84"."-"."$d1".$j;
                         
                         $iic196 = create_guid();
			               // $d1= date("md");
							    $iiic196 = create_guid();
	                      $qcc196 = new QrCode(); 
                     	 $qcc196->TEXT("C1BX96"."-"."$d1"."$j");
                         $qcc196->QRCODE1(400,"$iic196"."_qr_image");
                         $w9= "C1BX96"."-"."$d1".$j;
                         
                         $iic1108 = create_guid();
			               // $d1= date("md");
							    $iiic1108 = create_guid();
	                      $qcc1108 = new QrCode(); 
                     	 $qcc1108->TEXT("C1BX108"."-"."$d1"."$j");
                         $qcc1108->QRCODE1(400,"$iic1108"."_qr_image");
                         $w10= "C1BX108"."-"."$d1".$j;
                         
                         $iic1120 = create_guid();
			                //$d1= date("md");
							    $iiic1120 = create_guid();
	                      $qcc1120 = new QrCode(); 
                     	 $qcc1120->TEXT("C1BX120"."-"."$d1"."$j");
                         $qcc1120->QRCODE1(400,"$iic1120"."_qr_image");
                         $w11= "C1BX120"."-"."$d1".$j;
                         
                         $iic1132 = create_guid();
			                //$d1= date("md");
							    $iiic1132 = create_guid();
	                      $qcc1132 = new QrCode(); 
                     	 $qcc1132->TEXT("C1BX132"."-"."$d1"."$j");
                         $qcc1132->QRCODE1(400,"$iic1132"."_qr_image");
                         $w12= "C1BX132"."-"."$d1".$j;
                         
                         $iic1144 = create_guid();
			                //$d1= date("md");
							    $iiic1144 = create_guid();
	                      $qcc1144 = new QrCode(); 
                     	 $qcc1144->TEXT("C1BX144"."-"."$d1"."$j");
                         $qcc1144->QRCODE1(400,"$iic1144"."_qr_image");
                         $w13= "C1BX144"."-"."$d1".$j;
                         
                         $iic1156 = create_guid();
			                //$d1= date("md");
							    $iiic1156 = create_guid();
	                      $qcc1156 = new QrCode(); 
                     	 $qcc1156->TEXT("C1BX156"."-"."$d1"."$j");
                         $qcc1156->QRCODE1(400,"$iic1156"."_qr_image");
                         $w14= "C1BX156"."-"."$d1".$j;
                         
                         $iic1168 = create_guid();
			               // $d1= date("md");
							    $iiic1168 = create_guid();
	                      $qcc1168 = new QrCode(); 
                     	 $qcc1168->TEXT("C1BX168"."-"."$d1"."$j");
                         $qcc1168->QRCODE1(400,"$iic1168"."_qr_image");
                         $w15= "C1BX168"."-"."$d1".$j;

                         
							    $in1="INSERT INTO `fyn_qr_code_boxes` SET id = '".$iic128."', name='$w1',date_entered= '" . $date . "', qr_image ='".$iic128."_qr_image"."'";
                         if($db->query($in1)){
              				 			echo "qr_boxes id inserted";
            				 }
            				 else{
             						   echo "255"; die ($db->error);
           						 }
							   /* $id3 = create_guid();
							    $inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
								 if($db->query($inc1)){
				              echo "qr_boxes_pallete inserted";
				             }
				             else{
				                  echo "222"; die ($db->error);
				                 }*/
				          $ins1="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iiic128."', deleted='0',date_modified = '" . $date . "', 	aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id_c128."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$iic128."'";
               			
               			if($db->query($ins1)){
              						echo "product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $in2="INSERT INTO `fyn_qr_code_boxes` SET id = '".$iic132."', name='$w2',date_entered= '" . $date . "', qr_image ='".$iic132."_qr_image"."'";
                         if($db->query($in2)){
              				 			echo "qr_boxes id inserted";
            				 }
            				 else{
             						   echo "255"; die ($db->error);
           						 }
							   
				          $ins2="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iiic132."', deleted='0',date_modified = '" . $date . "', 	aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id_c132."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$iic132."'";
               			
               			if($db->query($ins2)){
              						echo "product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $in3="INSERT INTO `fyn_qr_code_boxes` SET id = '".$iic136."', name='$w3',date_entered= '" . $date . "', qr_image ='".$iic136."_qr_image"."'";
                         if($db->query($in3)){
              				 			echo "qr_boxes id inserted";
            				 }
            				 else{
             						   echo "255"; die ($db->error);
           						 }
							   
				          $ins3="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iiic136."', deleted='0',date_modified = '" . $date . "', 	aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id_c136."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$iic136."'";
               			
               			if($db->query($ins3)){
              						echo "product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $in4="INSERT INTO `fyn_qr_code_boxes` SET id = '".$iic140."', name='$w4',date_entered= '" . $date . "', qr_image ='".$iic140."_qr_image"."'";
                         if($db->query($in4)){
              				 			echo "qr_boxes id inserted";
            				 }
            				 else{
             						   echo "255"; die ($db->error);
           						 }
							   
				          $ins4="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iiic140."', deleted='0',date_modified = '" . $date . "', 	aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id_c140."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$iic140."'";
               			
               			if($db->query($ins4)){
              						echo "product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $in5="INSERT INTO `fyn_qr_code_boxes` SET id = '".$iic148."', name='$w5',date_entered= '" . $date . "', qr_image ='".$iic148."_qr_image"."'";
                         if($db->query($in5)){
              				 			echo "qr_boxes id inserted";
            				 }
            				 else{
             						   echo "255"; die ($db->error);
           						 }
							   
				          $ins5="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iiic148."', deleted='0',date_modified = '" . $date . "', 	aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id_c148."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$iic148."'";
               			
               			if($db->query($ins5)){
              						echo "product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $in6="INSERT INTO `fyn_qr_code_boxes` SET id = '".$iic160."', name='$w6',date_entered= '" . $date . "', qr_image ='".$iic160."_qr_image"."'";
                         if($db->query($in6)){
              				 			echo "qr_boxes id inserted";
            				 }
            				 else{
             						   echo "255"; die ($db->error);
           						 }
							   
				          $ins6="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iiic160."', deleted='0',date_modified = '" . $date . "', 	aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id_c160."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$iic160."'";
               			
               			if($db->query($ins6)){
              						echo "product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $in7="INSERT INTO `fyn_qr_code_boxes` SET id = '".$iic170."', name='$w7',date_entered= '" . $date . "', qr_image ='".$iic170."_qr_image"."'";
                         if($db->query($in7)){
              				 			echo "qr_boxes id inserted";
            				 }
            				 else{
             						   echo "255"; die ($db->error);
           						 }
							   
				          $ins7="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iiic170."', deleted='0',date_modified = '" . $date . "', 	aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id_c170."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$iic170."'";
               			
               			if($db->query($ins7)){
              						echo "product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $in8="INSERT INTO `fyn_qr_code_boxes` SET id = '".$iic184."', name='$w8',date_entered= '" . $date . "', qr_image ='".$iic184."_qr_image"."'";
                         if($db->query($in8)){
              				 			echo "qr_boxes id inserted";
            				 }
            				 else{
             						   echo "255"; die ($db->error);
           						 }
							   
				          $ins8="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iiic184."', deleted='0',date_modified = '" . $date . "', 	aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id_c184."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$iic184."'";
               			
               			if($db->query($ins9)){
              						echo "product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $in9="INSERT INTO `fyn_qr_code_boxes` SET id = '".$iic196."', name='$w9',date_entered= '" . $date . "', qr_image ='".$iic196."_qr_image"."'";
                         if($db->query($in8)){
              				 			echo "qr_boxes id inserted";
            				 }
            				 else{
             						   echo "255"; die ($db->error);
           						 }
							   
				          $ins9="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iiic196."', deleted='0',date_modified = '" . $date . "', 	aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id_c196."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$iic196."'";
               			
               			if($db->query($ins9)){
              						echo "product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						  $in10="INSERT INTO `fyn_qr_code_boxes` SET id = '".$iic1108."', name='$w10',date_entered= '" . $date . "', qr_image ='".$iic1108."_qr_image"."'";
                         if($db->query($in10)){
              				 			echo "qr_boxes id inserted";
            				 }
            				 else{
             						   echo "255"; die ($db->error);
           						 }
							   
				          $ins10="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iiic1108."', deleted='0',date_modified = '" . $date . "', 	aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id_c1108."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$iic1108."'";
               			
               			if($db->query($ins10)){
              						echo "product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $in11="INSERT INTO `fyn_qr_code_boxes` SET id = '".$iic1120."', name='$w11',date_entered= '" . $date . "', qr_image ='".$iic1120."_qr_image"."'";
                         if($db->query($in11)){
              				 			echo "qr_boxes id inserted";
            				 }
            				 else{
             						   echo "255"; die ($db->error);
           						 }
							   
				          $ins11="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iiic1120."', deleted='0',date_modified = '" . $date . "', 	aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id_c1120."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$iic1120."'";
               			
               			if($db->query($ins11)){
              						echo "product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $in12="INSERT INTO `fyn_qr_code_boxes` SET id = '".$iic1132."', name='$w12',date_entered= '" . $date . "', qr_image ='".$iic1132."_qr_image"."'";
                         if($db->query($in12)){
              				 			echo "qr_boxes id inserted";
            				 }
            				 else{
             						   echo "255"; die ($db->error);
           						 }
							   
				          $ins12="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iiic1132."', deleted='0',date_modified = '" . $date . "', 	aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id_c1132."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$iic1132."'";
               			
               			if($db->query($ins12)){
              						echo "product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $in13="INSERT INTO `fyn_qr_code_boxes` SET id = '".$iic1144."', name='$w13',date_entered= '" . $date . "', qr_image ='".$iic1144."_qr_image"."'";
                         if($db->query($in13)){
              				 			echo "qr_boxes id inserted";
            				 }
            				 else{
             						   echo "255"; die ($db->error);
           						 }
							   
				          $ins13="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iiic1144."', deleted='0',date_modified = '" . $date . "', 	aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id_c1144."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$iic1144."'";
               			
               			if($db->query($ins13)){
              						echo "product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						  $in14="INSERT INTO `fyn_qr_code_boxes` SET id = '".$iic1156."', name='$w14',date_entered= '" . $date . "', qr_image ='".$iic1156."_qr_image"."'";
                         if($db->query($in14)){
              				 			echo "qr_boxes id inserted";
            				 }
            				 else{
             						   echo "255"; die ($db->error);
           						 }
							   
				          $ins14="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iiic1156."', deleted='0',date_modified = '" . $date . "', 	aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id_c1156."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$iic1156."'";
               			
               			if($db->query($ins14)){
              						echo "product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $in15="INSERT INTO `fyn_qr_code_boxes` SET id = '".$iic1168."', name='$w15',date_entered= '" . $date . "', qr_image ='".$iic1168."_qr_image"."'";
                         if($db->query($in15)){
              				 			echo "qr_boxes id inserted";
            				 }
            				 else{
             						   echo "255"; die ($db->error);
           						 }
							   
				          $ins15="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iiic1168."', deleted='0',date_modified = '" . $date . "', 	aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id_c1168."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$iic1168."'";
               			
               			if($db->query($ins15)){
              						echo "product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
                        }
                   $count--;
                     }
?>