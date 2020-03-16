<?php
 include "qrcode.php"; 
  include "UploadFile.php";
shell_exec('service named reload >/dev/null 2>/dev/null &');
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
 
class Class_QrEval
{
  function func_order($bean, $event, $arguments)
  {
	global $current_user;
	global $db;
   $cls1=0;
   $cls2 =0;
   $cls3= 0;
   $clstot =0;
   $cls1= $bean->class1_box_28_c + $bean->class1_box_32_c + $bean->class1_box_36_c + $bean->class1_box_40_c + $bean->class1_box_48_c +       $bean->class1_box_60_c + $bean->class1_box_70_c + $bean->class1_box_84_c + $bean->class1_box_96_c + $bean->class1_box_108_c + $bean->class1_box_120_c + $bean->class1_box_132_c + $bean->class1_box_144_c + $bean->class1_box_156_c + $bean->class1_box_168_c;
   $bean->class1_total_c = $cls1;
   $cls2= $bean->class2_box_28_c + $bean->class2_box_32_c + $bean->class2_box_36_c + $bean->class2_box_40_c + $bean->class2_box_48_c +       $bean->class2_box_60_c + $bean->class2_box_70_c + $bean->class2_box_84_c + $bean->class2_box_96_c + $bean->class2_box_108_c + $bean->class2_box_120_c + $bean->class2_box_132_c + $bean->class2_box_144_c + $bean->class2_box_156_c + $bean->class2_box_168_c;
   $bean->class2_total_c = $cls2;
   $cls3=$bean->organic_box_28_c + $bean->organic_box_32_c + $bean->organic_box_36_c + $bean->organic_box_40_c + $bean->organic_box_48_c +      $bean->organic_box_60_c + $bean->organic_box_70_c +$bean->organic_box_84_c + $bean->organic_box_96_c + $bean->organic_box_108_c + $bean->organic_box_120_c + $bean->organic_box_132_c + $bean->organic_box_144_c + $bean->organic_box_156_c + $bean->organic_box_168_c;
   $bean->organic_total_c = $cls3;
   //$cls4 = $bean->no_of_boxes_c;
   $clstot= $cls1 + $cls2 + $cls3;
   $bean->total_boxes = $clstot;
   $d1= date("md");
	

      
//$bean->name = "PL"."$d1"."001";
	if(empty($bean->fetched_row))
      { 
	     $query = "select name from fyn_qr_code_pallette WHERE deleted ='0' order by name desc limit 0,1 ";	
        $res=$db->query($query);
        $query=$db->fetchByAssoc($res); 
        $value=$query['name']; 

        if(empty($value))
			{
					echo "inside empty";
				   $bean->name='QRPL'."0001";
			}

    	  else
				{
					
					     $bean->name =++$value;
			    }
		}
		$imgpl=$bean->id;
		$pl=$bean->name;
      $qc = new QrCode(); 
      $qc->TEXT("$pl");
      $qc->QRCODE1(400,"$imgpl"."_qrimage"); ///exit;
      $fimg= "$imgpl"."_qrimage";
      $bean->qrimage = $fimg;
  }
}

class Class_genQR
{
  function QR_pal_bx($bean, $event, $arguments)
  {
    global $current_user;
        global $db;
      $imgpl=$bean->id;
		$pl=$bean->name;
      $qc = new QrCode(); 
      $qc->TEXT("$pl");
      $qc->QRCODE1(400,"$imgpl"."_qrimage"); ///exit;
      $fimg= "$imgpl"."_qrimage";
      $bean->qrimage = $fimg;
      
      if($bean->status == 'Approve_And_Generate') {
	 	$s1="SELECT * FROM `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` WHERE fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida = '".$bean->id."'";
      $result1 = $db->query($s1);
      if ($result1->num_rows <= 0) {    //Check if already created QR boxes or not
      $GLOBALS['log']->fatal("INSIDE NEW IF");
    	$s="SELECT * FROM `fyn_qr_code_pallette` WHERE status = 'Approve_And_Generate'";
      $result = $db->query($s);
       
 // Class 1 BOX - 28  - Shifa - Start

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->class1_box_28_c;
            // echo "$count";exit;
              if($count>0)
              {
              			  $sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 28' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              			  for($j=1; $j<=$count; $j++)
                       {
			             
			                $ii = create_guid();
			                $d1= date("md");
							    $iii = create_guid();
	                      $qc = new QrCode(); 
                     	 $qc->TEXT("C1BX28"."-"."$d1"."$j");
                         $qc->QRCODE1(400,"$ii"."_qr_image");

                         //$qrin =$pl=$bean->qr_in;    
                         $w= "C1BX28"."-"."$d1".$j;
							    $in1="INSERT INTO `fyn_qr_code_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_modified'] . "', qr_image ='".$ii."_qr_image"."'";
                         if($db->query($in1)){
              				 			echo "qr_boxes id inserted";
            				 }
            				 else{
             						   echo "255"; die ($db->error);
           						 }
							    $id3 = create_guid();
							    $inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
								 if($db->query($inc1)){
				              echo "qr_boxes_pallete inserted";
				             }
				             else{
				                  echo "222"; die ($db->error);
				                 }
				            $ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "', 	aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
                        }
                     }
                     
 // CLASS 1 - BOX 32 
            
              $count1 = $bean->class1_box_32_c;
              if($count1>0)
               {
                	$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 32' AND deleted=0";
			       	$results=$db->query($sqls);
			       	$rows=$results->fetch_assoc();
			       	$product_id = $rows['id'];
                	for($j=1; $j<=$count1; $j++)
                 	{
                  	$ii = create_guid();
                  	$d1= date("md");
                  	$qc = new QrCode(); 
                  	$qc->TEXT("C1BX32"."-"."$d1"."$j");
                 	 	$qc->QRCODE1(400,"$ii"."_qr_image");
                  	$w= "C1BX32"."-"."$d1".$j;

                  	$in1="INSERT INTO `fyn_qr_code_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "',qr_image ='".$ii."_qr_image"."'";
                  	if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    	}
                 		else{
                           echo "255"; die ($db->error);
                       }
                  	$id3 = create_guid();
                  	$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  	if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    	}
                 	   else{
                        echo "222"; die ($db->error);
                     }
                  
			        		$iii = create_guid();
			        		$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 		if($db->query($ins)){
              	  		echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            			}
            	  		else{
             		  	echo "255"; die ($db->error); 
           			  	}
               	}  
             }
             
 // Class 1 BOX 36
 
 				  $count2 = $bean->class1_box_36_c;
              if($count2>0)
               {
                	$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 36' AND deleted=0";
			       	$results=$db->query($sqls);
			       	$rows=$results->fetch_assoc();
			       	$product_id = $rows['id'];
                	for($j=1; $j<=$count2; $j++)
                 	{
                  	$ii = create_guid();
                  	$d1= date("md");
                  	$qc = new QrCode(); 
                  	$qc->TEXT("C1BX36"."-"."$d1"."$j");
                 	 	$qc->QRCODE1(400,"$ii"."_qr_image");
                  	$w= "C1BX36"."-"."$d1".$j;

                  	$in1="INSERT INTO `fyn_qr_code_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "',qr_image ='".$ii."_qr_image"."'";
                  	if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    	}
                 		else{
                           echo "255"; die ($db->error);
                       }
                  	$id3 = create_guid();
                  	$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  	if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    	}
                 	   else{
                        echo "222"; die ($db->error);
                     }
                  
			        		$iii = create_guid();
			        		$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 		if($db->query($ins)){
              	  		echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            			}
            	  		else{
             		  	echo "255"; die ($db->error); 
           			  	}
               	}  
             }
  //CLass 1 BOX - 40
   
   					$count3 = $bean->class1_box_40_c;
              		if($count3>0)
                   {
                	  $sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 40' AND deleted=0";
			       	  $results=$db->query($sqls);
			       	  $rows=$results->fetch_assoc();
			       	  $product_id = $rows['id'];
                	  for($j=1; $j<=$count3; $j++)
                 	   {
                  	 $ii = create_guid();
                  	 $d1= date("md");
                  	 $qc = new QrCode(); 
                  	 $qc->TEXT("C1BX40"."-"."$d1"."$j");
                 	 	 $qc->QRCODE1(400,"$ii"."_qr_image");
                  	 $w= "C1BX40"."-"."$d1".$j;

                  	 $in1="INSERT INTO `fyn_qr_code_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "',qr_image ='".$ii."_qr_image"."'";
                  	 if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    	 }
                 		 else{
                           echo "255"; die ($db->error);
                       }
                  	 $id3 = create_guid();
                  	 $inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  	 if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    	 }
                 	    else{
                        echo "222"; die ($db->error);
                      }
                  
			        		 $iii = create_guid();
			        		 $ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 		 if($db->query($ins)){
              	  		 echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            			 }
            	  		 else{
             		  	 echo "255"; die ($db->error); 
           			   	}
               	   }  
                  }
                  
 //Class 1 Box - 48
 
 						$count4 = $bean->class1_box_48_c;
              		if($count4>0)
               	{
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 48' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count4; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C1BX48"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C1BX48"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "',qr_image ='".$ii."_qr_image"."'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
 //Class 1- BOX 60
 
 						  $count5 = $bean->class1_box_60_c;
              		  if($count5>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 60' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count5; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C1BX60"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C1BX60"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
 // CLass 1 - BOX 70
 
 						  $count6 = $bean->class1_box_70_c;
              		  if($count6>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 70' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count6; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C1BX70"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C1BX70"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
  //Class 1 - BOX 84
  
  						  $count7 = $bean->class1_box_84_c;
              		  if($count7>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 84' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count7; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C1BX84"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C1BX84"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
  //Class 1 - Box 96
  
  						  //$model_name = $bean->product_model_c;
                	  $count8 = $bean->class1_box_96_c;
 						  if($count8>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 96' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count8; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C1BX96"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C1BX96"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
 // Class 1- Box 108
 	
 						  $count9 = $bean->class1_box_108_c;
              		  if($count9>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 108' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count9; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C1BX108"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C1BX108"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
 //Class 1 Box - 120
 
  						  $count10 = $bean->class1_box_120_c;
              		  if($count10>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 120' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count10; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C1BX120"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C1BX120"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
  //Class 1 - Box 132
  						  $count11 = $bean->class1_box_132_c;
              		  if($count11>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 132' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count11; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C1BX132"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C1BX132"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
   //Class 1 - Box 144
  						  $count12 = $bean->class1_box_144_c;
              		  if($count12>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 144' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count12; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C1BX144"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C1BX144"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
             		
  //Class 1 - Box 156
  						  $count13 = $bean->class1_box_156_c;
              		  if($count13>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 156' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count13; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C1BX156"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C1BX156"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
             		
   //Class 1 - Box 168
  						  $count14 = $bean->class1_box_168_c;
              		  if($count14>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class1 Box of 168' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count14; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C1BX168"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C1BX168"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
  							  
  //Class 2 - BOX 28
  
  						  $count15 = $bean->class2_box_28_c;
              		  if($count15>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class2 Box of 28' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count15; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C2BX28"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C2BX28"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
             	
  //Class 2 - BOX 32
  
  						  $count16 = $bean->class2_box_32_c;
              		  if($count16>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class2 Box of 32' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count16; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C2BX32"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C2BX32"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
  //Class 2 - BOX 36
  
  						  $count17 = $bean->class2_box_36_c;
              		  if($count17>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class2 Box of 36' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count17; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C2BX36"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C2BX36"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
 //Class 2 - BOX 40
  
  						  $count18 = $bean->class2_box_40_c;
              		  if($count18>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class2 Box of 40' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count18; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C2BX40"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C2BX40"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
 //Class 2 - BOX 48
  
  						  $count19 = $bean->class2_box_48_c;
              		  if($count19>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class2 Box of 48' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count19; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C2BX48"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C2BX48"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
 //Class 2 - BOX 60
  
  						  $count20 = $bean->class2_box_60_c;
              		  if($count20>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class2 Box of 60' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count20; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C2BX60"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C2BX60"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
  //Class 2 - BOX 70
  
  						  $count21 = $bean->class2_box_70_c;
              		  if($count21>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class2 Box of 70' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count21; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C2BX70"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C2BX70"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
  //Class 2 - BOX 84
  
  						  $count22 = $bean->class2_box_84_c;
              		  if($count22>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class2 Box of 84' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count22; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C2BX84"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C2BX84"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
             		
   //Class 2 - BOX 96
  
  						  $count23 = $bean->class2_box_96_c;
              		  if($count23>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class2 Box of 96' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count23; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C2BX96"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C2BX96"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
             		
   //Class 2 - BOX 108
  
  						  $count24 = $bean->class2_box_108_c;
              		  if($count24>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class2 Box of 108' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count24; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C2BX108"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C2BX108"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
             		
   //Class 2 - BOX 120
  
  						  $count25 = $bean->class2_box_120_c;
              		  if($count25>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class2 Box of 120' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count25; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C2BX120"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C2BX120"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
             		
  //Class 2 - BOX 132
  
  						  $count26 = $bean->class2_box_132_c;
              		  if($count26>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class2 Box of 132' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count26; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C2BX132"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C2BX132"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
             		
  //Class 2 - BOX 144
  
  						  $count27 = $bean->class2_box_144_c;
              		  if($count27>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class2 Box of 144' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count27; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C2BX144"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C2BX144"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
             		
  //Class 2 - BOX 156
  
  						  $count28 = $bean->class2_box_156_c;
              		  if($count28>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class2 Box of 156' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count28; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C2BX156"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C2BX156"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
             		
   //Class 2 - BOX 168
  
  						  $count29 = $bean->class2_box_168_c;
              		  if($count29>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Class2 Box of 168' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count29; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("C2BX168"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "C2BX168"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
             		
  //Organic - BOX 28
  
  						  $count30 = $bean->organic_box_28_c;
              		  if($count30>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Organic Box of 28' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count30; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("ORGBX28"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "ORGBX28"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
   //Organic - BOX 32
  
  						  $count31 = $bean->organic_box_32_c;
              		  if($count31>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Organic Box of 32' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count31; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("ORGBX32"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "ORGBX32"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
   //Organic - BOX 36
  
  						  $count32 = $bean->organic_box_36_c;
              		  if($count32>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Organic Box of 36' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count32; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("ORGBX36"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "ORGBX36"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
  //Organic - BOX 40
  
  						  $count33 = $bean->organic_box_40_c;
              		  if($count33>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Organic Box of 40' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count33; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("ORGBX40"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "ORGBX40"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
  //Organic - BOX 48
  
  						  $count34 = $bean->organic_box_48_c;
              		  if($count34>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Organic Box of 48' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count34; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("ORGBX48"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "ORGBX48"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
  //Organic - BOX 60
  
  						  $count35 = $bean->organic_box_60_c;
              		  if($count35>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Organic Box of 60' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count35; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("ORGBX60"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "ORGBX60"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
  //Organic - BOX 70
  
  						  $count36 = $bean->organic_box_70_c;
              		  if($count36>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Organic Box of 70' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count36; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("ORGBX70"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "ORGBX70"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
  //Organic - BOX 84
  
  						  $count37 = $bean->organic_box_84_c;
              		  if($count37>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Organic Box of 84' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count37; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("ORGBX84"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "ORGBX84"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
             		
 //Organic - BOX 96
  
  						  $count38 = $bean->organic_box_96_c;
              		  if($count38>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Organic Box of 96' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count38; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("ORGBX96"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "ORGBX96"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
             		
 //Organic - BOX 108
  
  						  $count39 = $bean->organic_box_108_c;
              		  if($count39>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Organic Box of 108' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count39; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("ORGBX108"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "ORGBX108"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
             		
 //Organic - BOX 120
  
  						  $count40 = $bean->organic_box_120_c;
              		  if($count40>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Organic Box of 120' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count40; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("ORGBX120"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "ORGBX120"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
             		
 //Organic - BOX 132
  
  						  $count41 = $bean->organic_box_132_c;
              		  if($count41>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Organic Box of 132' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count41; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("ORGBX132"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "ORGBX132"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
             		
 //Organic - BOX 144
  
  						  $count42 = $bean->organic_box_144_c;
              		  if($count42>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Organic Box of 144' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count42; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("ORGBX144"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "ORGBX144"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
             		
 //Organic - BOX 156
  
  						  $count43 = $bean->organic_box_156_c;
              		  if($count43>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Organic Box of 156' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count43; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("ORGBX156"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "ORGBX156"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
  //Organic - BOX 168
  
  						  $count44 = $bean->organic_box_168_c;
              		  if($count44>0)
               	  {
                		$sqls="SELECT id FROM aos_products WHERE name = 'Avocado Organic Box of 168' AND deleted=0";
			       		$results=$db->query($sqls);
			       		$rows=$results->fetch_assoc();
			       		$product_id = $rows['id'];
                		for($j=1; $j<=$count44; $j++)
                 			{
                  			$ii = create_guid();
                  			$d1= date("md");
                  			$qc->TEXT("ORGBX168"."-"."$d1"."$j");
                 	 			$qc->QRCODE1(400,"$ii"."_qr_image");
                  			$w= "ORGBX168"."-"."$d1".$j;

                  			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                  			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    			}
                 				else{
                           echo "255"; die ($db->error);
                       		}
                  			$id3 = create_guid();
                  			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                  			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                 	   		else{
                       		 echo "222"; die ($db->error);
                     		}
                  
			        				$iii = create_guid();
			        				$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                 				if($db->query($ins)){
              	  				echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            					}
            	  				else{
             		  			echo "255"; die ($db->error); 
           			  			}
               			}  
             		}
 /* OTHER Products
 					
            	 $queryParams = array(
    					'module' => 'fyn_QR_CODE_PALLETTE',
    					'action' => 'EditView',
						'record' => $bean->id,

            	  );	
                $model_name = $bean->product_model_c;
                $count24 = $bean->no_of_boxes_c;
                if($count24>0)
                 {
                  	$sqls="SELECT id_c,id FROM aos_products,aos_products_cstm WHERE aos_products_cstm.product_model_code_c = '".$model_name."' AND aos_products.deleted=0 AND aos_products_cstm.id_c = aos_products.id";
			         	$results=$db->query($sqls);
			         	if ($results->num_rows <= 0) {  
			         	SugarApplication::appendErrorMessage("Invalid Product Or Product Does not exist");
			         	SugarApplication::redirect('index.php?' . http_build_query($queryParams));
			         		}
			         	$rows=$results->fetch_assoc();
			        	   $product_id = $rows['id_c'];
                  	for($j=1; $j<=$count24; $j++)
                   		{
                    			$ii = create_guid();
                    			$d1= date("md");
                    			$qc = new QrCode(); 
                    			$qc->TEXT("$model_name"."-"."$d1"."$j");
                    			$qc->QRCODE1(400,"$ii"."_qr_image");
                    			$w= "$model_name"."-"."$d1".$j;
  
                    			$in1="INSERT INTO `fyn_qr_code_boxes` SET qr_image ='".$ii."_qr_image"."',id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    			if($db->query($in1)){
                            echo "qr_boxes id inserted";
                     		}
                    			else{
                           echo "255"; die ($db->error);
                       		}
                    			$id3 = create_guid();
                    			$inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."',fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$row['id']."',deleted=0,date_modified = '" . $row['date_modified'] . "', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$ii."'";
                    			if($db->query($inc1)){
                      		echo "qr_boxes_pallete inserted";
                    			}
                    			else{
                        	echo "222"; die ($db->error);
                     		}
                  
			           			$iii = create_guid();
			           			$ins="INSERT INTO `aos_products_fyn_qr_code_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."',aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb = '".$ii."'";
                    			if($db->query($ins)){
              	     			echo "aos_products_fyn_qr_code_boxes_1_c inserted";				
            	   	 		}
            	     			else{
             		  			echo "255"; die ($db->error); 
           			    		}
                   		}  
              		 } */

          }  // END - while
        }
       }
     }
  }  // END Function
  }

?>

