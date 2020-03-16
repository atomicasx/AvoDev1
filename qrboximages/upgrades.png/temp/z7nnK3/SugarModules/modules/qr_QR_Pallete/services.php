<?php
 include "qrcode.php"; 
  include "UploadFile.php";
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
 
class Class_QrEval
{
  function func_order($bean, $event, $arguments)
  {

	global $db;
    $cls1=0;
   $cls2 =0;
   $cls3= 0;
   $clstot =0;
    $cls1= $bean->class1_box_28_c + $bean->class1_box_32_c + $bean->class1_box_36_c + $bean->class1_box_40_c + $bean->class1_box_48_c +       $bean->class1_box_60_c + $bean->class1_box_70_c + $bean->class1_box_84_c;

    $bean->class1_total_c = $cls1;

$cls2= $bean->class2_box_28_c + $bean->class2_box_32_c + $bean->class2_box_36_c + $bean->class2_box_40_c + $bean->class2_box_48_c +       $bean->class2_box_60_c + $bean->class2_box_70_c + $bean->class2_box_84_c;

    $bean->class2_total_c = $cls2;


$cls3=$bean->organic_box_28_c + $bean->organic_box_32_c + $bean->organic_box_36_c + $bean->organic_box_40_c + $bean->organic_box_48_c +      $bean->organic_box_60_c + $bean->organic_box_70_c +$bean->organic_box_84_c;

$bean->organic_total_c = $cls3;


$clstot= $cls1 + $cls2 + $cls3;
$bean->total_boxes_c = $clstot;
$d1= date("md");


//$bean->name = "PL"."$d1"."001";
if(empty($bean->fetched_row))
                        {      
                        
			  					  $query = "select name from qr_qr_pallete WHERE deleted ='0' order by name desc limit 0,1 ";	
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
                        $qc->QRCODE1(400,"$imgpl"."_qr_image_c");
                        $fimg= "$imgpl"."_qr_image_c";
                        $bean->qr_image_c = $fimg;
                       
		if($bean->status_c == 'Approve_And_Generate') {
	 	 $s1="SELECT * FROM `qr_qr_pallete_qr_qr_boxes_1_c` WHERE qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida = '".$bean->id."'";
       $result1 = $db->query($s1);
       if ($result1->num_rows <= 0) {    //Check if already created QR boxes or not
       $GLOBALS['log']->fatal("INSIDE NEW IF");
    $s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);
       
        // class1_box_28

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->class1_box_28_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Class1 Box of 28' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
			              /*$sql1="SELECT UUID()";
			              $result1=$db->query($sql1);
			              $row1=$result1->fetch_assoc();
			              $ii=$row1['UUID()'];*/
			              $ii = create_guid();
			              $d1= date("md");
			              
              			  /*$sql2="SELECT UUID()";
			              $result2=$db->query($sql2);
			              $row2=$result2->fetch_assoc();
			              $iii=$row2['UUID()'];*/
			              $iii = create_guid();
			          
                       
                       	$qc = new QrCode(); 
                     	$qc->TEXT("C1BX28"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       echo $qrin =$pl=$bean->qr_in;    
                               
                                 $w= "C1BX28"."-"."$d1".$j;

               		$in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_modified'] . "'";
               			
               			if($db->query($in1)){
              							echo "qr_boxes id inserted";
            				}
            				else{
             						   echo "255"; die ($db->error);
           						 }
						
				
				
          			$in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Class_1', product_name_c = 'class1_box_28', qr_image_c ='".$ii."_qr_image_c"."' ";

              
					              if($db->query($in2)){
					              echo "qr_boxes_cstm inserted";
					            }
					            else{
					                echo "222"; die ($db->error);
					            }


           			 /*$sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

					// echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                   			if($db->query($inc1)){
				              echo "qr_boxes_pallete inserted";
				            }
				            else{
				                echo "222"; die ($db->error);
				            }
				$ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);

			/*$qr_box = $bean->get_linked_beans('qr_qr_pallete_qr_qr_boxes_1','qr_QR_Boxes');
		echo "<pre>";
          var_dump($qr_box); exit;
              
         /* foreach($qr_box as $qr_boxes){ 
          $qr_boxes->st_products_qr_qr_boxes_1_name = 'Avocado Class1  Box of 28';
          $qr_boxes->save();
         }*/
         

            }
          }
          // print_r($j);

        
    }

   }

 $s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);

 // class1_box_32

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->class1_box_32_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Class1 Box of 32' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                    /*$sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                    $d1= date("md");
                    
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("C1BX32"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "C1BX32"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Class_1', product_name_c = 'class1_box_32', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                 /*$sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                    /*$sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];*/
			              $iii = create_guid();
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }


 $s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);

// class1_box_36

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->class1_box_36_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Class1 Box of 36' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                    /*$sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                    $d1= date("md");
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("C1BX36"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "C1BX36"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Class_1', product_name_c = 'class1_box_36', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                /* $sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                   /* $sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];*/
			              $iii = create_guid();
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }

 $s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);
          // class1_box_40

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->class1_box_40_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Class1 Box of 40' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                    /*$sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                    $d1= date("md");
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("C1BX40"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "C1BX40"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Class_1', product_name_c = 'class1_box_40', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                 /*$sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                    /*$sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];*/
			              $iii = create_guid();
			              
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }

 $s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);

          // class1_box_48

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->class1_box_48_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Class1 Box of 48' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                    /*$sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                    $d1= date("md");
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("C1BX48"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "C1BX48"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Class_1', product_name_c = 'class1_box_48', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                /* $sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                   /* $sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];*/
			              $iii = create_guid();
			              
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }

           $s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);

          // class1_box_60

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->class1_box_60_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Class1 Box of 60' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                    /*$sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                    $d1= date("md");
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("C1BX60"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "C1BX60"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Class_1', product_name_c = 'class1_box_60', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                /* $sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                    /*$sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];*/
			              $iii = create_guid();
			              
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }

 $s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);

          // class1_box_70

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->class1_box_70_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Class1 Box of 70' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                    /*$sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                    $d1= date("md");
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("C1BX70"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "C1BX70"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Class_1', product_name_c = 'class1_box_70', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                 /*$sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                     /*$sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];*/
			              $iii = create_guid();
			              
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }

 $s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);
        // class1_box_84

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->class1_box_84_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Class1 Box of 84' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                    /*$sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                    $d1= date("md");
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("C1BX84"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "C1BX84"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Class_1', product_name_c = 'class1_box_84', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                 /*$sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                    /*$sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];*/
			              $iii = create_guid();
			              
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }


          //class 2
 $s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);
        // class2_box_28

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->class2_box_28_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Class2 Box of 28' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                    /*$sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                    $d1= date("md");
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("C2BX28"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "C2BX28"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Class_2', product_name_c = 'class2_box_28', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                /* $sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                   /* $sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];*/
			              $iii = create_guid();
			              
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }


 $s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);
        // class2_box_32

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->class2_box_32_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Class2 Box of 32' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                   /* $sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                    $d1= date("md");
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("C2BX32"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "C2BX32"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Class_2', product_name_c = 'class2_box_32', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                 /*$sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                   /* $sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];*/
			              $iii = create_guid();
			          
			              
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }


 $s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);
        // class2_box_36

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->class2_box_36_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Class2 Box of 36' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                    /*$sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                    $d1= date("md");
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("C2BX36"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "C2BX36"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Class_2', product_name_c = 'class2_box_36', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                 /*$sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                    /*$sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];*/
			              $iii = create_guid();
			              
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }


 $s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);
        // class2_box_40

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->class2_box_40_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Class2 Box of 40' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                    /*$sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                    $d1= date("md");
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("C2BX40"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "C2BX40"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Class_2', product_name_c = 'class2_box_40', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                 /*$sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                    /*$sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];*/
			              $iii = create_guid();
			              
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }



 $s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);
        // class2_box_48

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->class2_box_48_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Class2 Box of 48' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                   /* $sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                    $d1= date("md");
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("C2BX48"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "C2BX48"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Class_2', product_name_c = 'class2_box_48', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                 /*$sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                   /* $sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];*/
			              $iii = create_guid();
			              
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }


 $s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);
        // class2_box_60

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->class2_box_60_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Class2 Box of 60' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                    /*$sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                    $d1= date("md");
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("C2BX60"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "C2BX60"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Class_2', product_name_c = 'class2_box_60', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                 /*$sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                    $sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];
			              
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }


 $s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);
        // class2_box_70

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->class2_box_70_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Class2 Box of 70' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                    /*$sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                    $d1= date("md");
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("C2BX70"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "C2BX70"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Class_2', product_name_c = 'class2_box_70', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                 /*$sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                    /*$sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];*/
			              $iii = create_guid();
			              
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }


 $s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);
        // class2_box_84

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->class2_box_84_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Class2 Box of 84' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                    /*$sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                  
                    $d1= date("md");
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("C2BX84"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "C2BX84"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Class_2', product_name_c = 'class2_box_84', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                 /*$sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                    /*$sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];*/
			              $iii = create_guid();
			              
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }

            //organic class


$s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);
        // organic_box_28_c

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->organic_box_28_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Organic Box of 28' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                   /* $sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                    $d1= date("md");
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("ORBX28"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "ORBX28"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Organic', product_name_c = 'organic_box_28', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                 /*$sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                   /* $sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];*/
			              $iii = create_guid();
			              
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }

$s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);
        // organic_box_32_c

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->organic_box_32_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Organic Box of 32' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                   /* $sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                    $d1= date("md");
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("ORBX32"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "ORBX32"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Organic', product_name_c = 'organic_box_32', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                 /*$sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                    /*$sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];*/
			              $iii = create_guid();
			              
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }

$s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);
        // organic_box_36_c

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->organic_box_36_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Organic Box of 36' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                    /*$sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                    $d1= date("md");
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("ORBX36"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "ORBX36"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Organic', product_name_c = 'organic_box_36', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                 /*$sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                   /* $sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];*/
			              $iii = create_guid();
			              
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }


$s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);
        // organic_box_40_c

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->organic_box_40_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Organic Box of 40' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                    /*$sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                    $d1= date("md");
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("ORBX40"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "ORBX40"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Organic', product_name_c = 'organic_box_40', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                 /*$sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                    /*$sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];*/
			              $iii = create_guid();
			              
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }


$s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);
        // organic_box_48_c

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->organic_box_48_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Organic Box of 48' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                    /*$sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                    $d1= date("md");
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("ORBX48"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "ORBX48"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Organic', product_name_c = 'organic_box_48', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                 /*$sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                    /*$sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];*/
			              $iii = create_guid();
			              
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }


$s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);
        // organic_box_60_c

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->organic_box_60_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Organic Box of 60' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                    /*$sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                    $d1= date("md");
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("ORBX60"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "ORBX60"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Organic', product_name_c = 'organic_box_60', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                 /*$sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                    /*$sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];*/
			              $iii = create_guid();
			              
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }



$s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);
        // organic_box_70_c

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->organic_box_70_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Organic Box of 70' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                    /*$sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                    $d1= date("md");
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("ORBX70"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "ORBX70"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Organic', product_name_c = 'organic_box_70', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                 /*$sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                    /*$sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];*/
			              $iii = create_guid();
			              
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }

$s="SELECT * FROM `qr_qr_pallete` ,`qr_qr_pallete_cstm` WHERE qr_qr_pallete.id = qr_qr_pallete_cstm.id_c AND qr_qr_pallete_cstm.status_c = 'Approve_And_Generate'";
       $result = $db->query($s);
        // organic_box_84_c

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {

      
              $count = $bean->organic_box_84_c;
             // echo "$count";exit;
              if($count>0)
              {
              	$sqls="SELECT id FROM st_products WHERE name = 'Avocado Organic Box of 84' AND deleted=0";
			              $results=$db->query($sqls);
			              $rows=$results->fetch_assoc();
			              $product_id = $rows['id'];
              for($j=1; $j<=$count; $j++)
              {
                   /* $sql1="SELECT UUID()";
                    $result1=$db->query($sql1);
                    $row1=$result1->fetch_assoc();
                    $ii=$row1['UUID()'];*/
                    $ii = create_guid();
                    $d1= date("md");
              
                       
                        $qc = new QrCode(); 
                      $qc->TEXT("ORBX84"."-"."$d1"."$j");
                        $qc->QRCODE1(400,"$ii"."_qr_image_c");

                       
                       $w= "ORBX84"."-"."$d1".$j;

                  $in1="INSERT INTO `qr_qr_boxes` SET id = '".$ii."', name='$w',date_entered= '" . $row['date_entered'] . "'";
                    
                    if($db->query($in1)){
                            echo "qr_boxes id inserted";
                    }
                    else{
                           echo "255"; die ($db->error);
                       }

        
        
                echo $in2="INSERT INTO `qr_qr_boxes_cstm` SET id_c = '".$ii."', product_category_c = 'Product_Organic', product_name_c = 'organic_box_84', qr_image_c ='".$ii."_qr_image_c"."' ";

              
                        if($db->query($in2)){
                        echo "qr_boxes_cstm inserted";
                      }
                      else{
                          echo "222"; die ($db->error);
                      }


                 /*$sql2="SELECT UUID()";
                    $result2=$db->query($sql2);
                    $row2=$result2->fetch_assoc();
                    $id3=$row2['UUID()'];*/
                    $id3 = create_guid();

          // echo "testing";
                   $inc1="INSERT INTO `qr_qr_pallete_qr_qr_boxes_1_c` SET id='".$id3."',   qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida='".$row['id_c']."',deleted=0,date_modified = '" . $row['date_modified'] . "', qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb ='".$ii."'";

                        if($db->query($inc1)){
                      echo "qr_boxes_pallete inserted";
                    }
                    else{
                        echo "222"; die ($db->error);
                    }
                    /*$sql3="SELECT UUID()";
			              $result3=$db->query($sql3);
			              $row3=$result3->fetch_assoc();
			              $iii=$row3['UUID()'];*/
			              $iii = create_guid();
			              
			              $ins="INSERT INTO `st_products_qr_qr_boxes_1_c` SET id = '".$iii."', deleted='0',date_modified = '" . $row['date_modified'] . "',st_products_qr_qr_boxes_1st_products_ida = '".$product_id."',st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$ii."'";
               			
               			if($db->query($ins)){
              						echo "st_product_qr_boxes id inserted";				
            				}
            				else{
             						   echo "255"; die ($db->error); 
           						 }
           						 $GLOBALS['log']->fatal("INserting products".$ins);



            }
          }
          // print_r($j);

        
          }

          }
          
		}
		}
	
}
}
?>

