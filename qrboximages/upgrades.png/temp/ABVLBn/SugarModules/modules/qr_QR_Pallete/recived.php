<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
   
class gen_QR
{
    function recived_QR($bean, $event, $arguments)
    {
    	global $db,$beanFiles,$beanList;
    	         $assigned_user = $bean->assigned_user_id;
               if($bean->status_c == 'Stock_Received'){
               	
					$d1= date("md");
			     
						  $s="SELECT * FROM qr_qr_pallete_qr_qr_boxes_1_c WHERE qr_qr_pallete_qr_qr_boxes_1qr_qr_pallete_ida = '".$bean->id."'";
                    $r=$db->query($s);
                    $j = 0;
                    $boxs_id = array();
                    while($row2=$r->fetch_assoc()){
                    $boxs_id[$j]['qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb']=$row2['qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb'];
                    $j++;
                   }
                   foreach($boxs_id as $key => $val){
                    $id_box = $val['qr_qr_pallete_qr_qr_boxes_1qr_qr_boxes_idb']; 
							
						  $q = $db->query("SELECT qr_qr_boxes_st_stock_in_1st_stock_in_idb FROM qr_qr_boxes_st_stock_in_1_c WHERE qr_qr_boxes_st_stock_in_1qr_qr_boxes_ida = '".$id_box."'");                  
                    $no_of_stockin = $q->num_rows;
                    if($no_of_stockin == 0){
                    $sql12="SELECT st_products_qr_qr_boxes_1st_products_ida FROM st_products_qr_qr_boxes_1_c WHERE st_products_qr_qr_boxes_1qr_qr_boxes_idb = '".$id_box."'";
                    $result12=$db->query($sql12);
                    $row12=$result12->fetch_assoc();
                    $products_id=$row12['st_products_qr_qr_boxes_1st_products_ida']; 
                    $qu = $db->query("SELECT name FROM st_products WHERE id = '".$products_id."'");
                    $res=$qu->fetch_assoc();
                    //echo $res['name']; exit;
                    if($res['name'] == 'Avocado Class1 Box of 28'){ $id_to_set = 'ST_IN_C1BX28-'.$d1; }
                    if($res['name'] == 'Avocado Class1 Box of 32'){ $id_to_set = 'ST_IN_C1BX32-'.$d1; }
                    if($res['name'] == 'Avocado Class1 Box of 36'){ $id_to_set = 'ST_IN_C1BX36-'.$d1; }
                    if($res['name'] == 'Avocado Class1 Box of 40'){ $id_to_set = 'ST_IN_C1BX40-'.$d1; }
                    if($res['name'] == 'Avocado Class1 Box of 48'){ $id_to_set = 'ST_IN_C1BX48-'.$d1; }
                    if($res['name'] == 'Avocado Class1 Box of 60'){ $id_to_set = 'ST_IN_C1BX60-'.$d1; }
                    if($res['name'] == 'Avocado Class1 Box of 70'){ $id_to_set = 'ST_IN_C1BX70-'.$d1; }
                    if($res['name'] == 'Avocado Class1 Box of 84'){ $id_to_set = 'ST_IN_C1BX84-'.$d1; }
                    
                    if($res['name'] == 'Avocado Class2 Box of 28'){ $id_to_set = 'ST_IN_C2BX28-'.$d1; }
                    if($res['name'] == 'Avocado Class2 Box of 32'){ $id_to_set = 'ST_IN_C2BX32-'.$d1; }
                    if($res['name'] == 'Avocado Class2 Box of 36'){ $id_to_set = 'ST_IN_C2BX36-'.$d1; }
                    if($res['name'] == 'Avocado Class2 Box of 40'){ $id_to_set = 'ST_IN_C2BX40-'.$d1; }
                    if($res['name'] == 'Avocado Class2 Box of 48'){ $id_to_set = 'ST_IN_C2BX48-'.$d1; }
                    if($res['name'] == 'Avocado Class2 Box of 60'){ $id_to_set = 'ST_IN_C2BX60-'.$d1; }
                    if($res['name'] == 'Avocado Class2 Box of 70'){ $id_to_set = 'ST_IN_C2BX70-'.$d1; }
                    if($res['name'] == 'Avocado Class2 Box of 84'){ $id_to_set = 'ST_IN_C2BX84-'.$d1; }
                    
                    if($res['name'] == 'Avocado Organic Box of 28'){ $id_to_set = 'ST_IN_ORBX28-'.$d1; }
                    if($res['name'] == 'Avocado Organic Box of 32'){ $id_to_set = 'ST_IN_ORBX32-'.$d1; }
                    if($res['name'] == 'Avocado Organic Box of 36'){ $id_to_set = 'ST_IN_ORBX36-'.$d1; }
                    if($res['name'] == 'Avocado Organic Box of 40'){ $id_to_set = 'ST_IN_ORBX40-'.$d1; }
                    if($res['name'] == 'Avocado Organic Box of 48'){ $id_to_set = 'ST_IN_ORBX48-'.$d1; }
                    if($res['name'] == 'Avocado Organic Box of 60'){ $id_to_set = 'ST_IN_ORBX60-'.$d1; }
                    if($res['name'] == 'Avocado Organic Box of 70'){ $id_to_set = 'ST_IN_ORBX70-'.$d1; }
                    if($res['name'] == 'Avocado Organic Box of 84'){ $id_to_set = 'ST_IN_ORBX84-'.$d1; }
                    
                    
                    $id=create_guid();
                	  $i = create_guid();
                    $iq = create_guid(); 
                        
                    $date = date('m/d/Y H:s',time()); 
                              
						  /*$st_in = new ST_Stock_In();
               	  $st_in->name = $id_to_set; 
               	  $st_in->date_entered = $date;
               	  $st_in->date_modified = $date;
               	  $st_in->save();
               	  $st_in->load_relationship('st_products_st_stock_in');
						  $st_in->st_products_st_stock_in->add($products_id);
						  $st_in->st_products_st_stock_in->add($st_in->id);
						  
						  
						  $st_in->load_relationship('qr_qr_boxes_st_stock_in_1');
               	  $st_in->qr_qr_boxes_st_stock_in_1->add($id_box);
               	  $st_in->qr_qr_boxes_st_stock_in_1->add($st_in->id);
               	  */
               	  
               	  
               	 // $object_stockin_module->qr_qr_boxes_st_stock_in_1_c->add($id_box);
               	  
                    $inss = $db->query("INSERT INTO st_products_st_stock_in_c SET id = '".$iq."',date_modified = now(),deleted='0',st_products_st_stock_inst_products_ida = '".$products_id."',st_products_st_stock_inst_stock_in_idb = '".$i."'");
                    $in1 = $db->query("INSERT INTO st_stock_in SET id = '".$i."',deleted='0',name = '".$id_to_set."',date_entered = now(),date_modified = now(),assigned_user_id = '".$assigned_user."'");
                    $in = $db->query("INSERT INTO qr_qr_boxes_st_stock_in_1_c SET id = '".$id."',date_modified = now(),deleted='0',qr_qr_boxes_st_stock_in_1qr_qr_boxes_ida = '".$id_box."',qr_qr_boxes_st_stock_in_1st_stock_in_idb = '".$i."'");
                    
                     $query =$db->query("SELECT * FROM st_products_cstm WHERE id_c='".$products_id."'");
							$row = $db->fetchByAssoc($query);
							$stockin = $row['stock_in_c']; 
							$stockin1 =  $stockin+1;
							$stockout = $row['stock_out_c']; 
							$query2 = $db->query("UPDATE st_products_cstm SET stock_in_c = '".$stockin1."' WHERE id_c = '".$products_id."'");
							if($row['stock_out_c'] >= 1) {
							$bal = $stockin1 - $stockout;
							}
							else { $bal = 0; }
							$query2 = $db->query("UPDATE st_products_cstm SET bal_stock_c = '".$bal."' WHERE id_c = '".$products_id."'");
							if($stockin1 >= $stockout)
							{ 
							$query1 = $db->query("UPDATE st_products_cstm SET stock_status_c = 'In_Stock' WHERE id_c = '".$products_id."'"); 
							}
		}
                    
			}
			$bean->do_not_delete_c = 1;
			}
    }
}
?>
