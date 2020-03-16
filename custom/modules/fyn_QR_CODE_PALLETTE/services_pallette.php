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
      if ($result1->num_rows <= 0) {    //Check 
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
  								$sqls1="SELECT aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb FROM aos_products_fyn_qr_code_boxes_1_c WHERE aos_products_fyn_qr_code_boxes_1aos_products_ida = '".$product_id."' AND deleted=0";
			               $results1=$db->query($sqls1);
			               $rows1=$results1->fetch_assoc();
			               $qr_id128 = $rows1['aos_products_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb'];
			               $id3 = create_guid();
							   $inc1="INSERT INTO `fyn_qr_code_pallette_fyn_qr_code_boxes_1_c` SET id='".$id3."', fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida='".$bean->id."',deleted=0, fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_boxes_idb ='".$qr_id128."'";
								if($db->query($inc1)){
				              echo "qr_boxes_pallete inserted";
				             }
				             else{
				                  echo "222"; die ($db->error);
				                 }
			             }
			          }
			             //exit;
			  //  } 
	  }
	}
}
}
?>
			              