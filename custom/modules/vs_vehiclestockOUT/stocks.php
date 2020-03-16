<?php

if(!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class vStock_Vehicle
{
	public function vstock_method($bean, $event, $arguments)
	{
		global $db;
		
		global $sugar_config;
		$d1= date("md");
		$cart_conn = new mysqli($sugar_config['hostname'], $sugar_config['user'], $sugar_config['password'], $sugar_config['dbname'],$port);
       
      if (!$cart_conn )
      {     
        $GLOBALS['log']->fatal("Connection failed: " . $cart_conn->connect_error);
      }
      else
      {
        $GLOBALS['log']->fatal("cart_conn Connected successfully<br>");
      }
		
		$quantity = $bean->quantity;
		$parent_id = $_REQUEST['fyn_vehicle_vs_vehiclestockout_1fyn_vehicle_ida'];
		$product_id  = $_REQUEST['aos_products_vs_vehiclestockout_1aos_products_ida'];
		$query1 = $db->query("SELECT * FROM fyn_vehicle WHERE id='".$parent_id."'");
		$row1 = $db->fetchByAssoc($query1);
		$stockin1 = $row1['stock_in']; 
		$stockout = $row1['stock_out'];
		$name = $row1['name'];
		$stockout_toupdate =  $stockout+$quantity;
		$bal = $stockin1 - $stockout_toupdate;
		$date = date('m/d/Y');
		$bean->name  = 'VST_OUT_'.$name.'_'.$date; 
		$product_stockinname =  'ST_IN_'.$name.'_'.$date; 
		if($bean->do_not_delete_c == ""){
			if($bean->destination == 'return_warehouse'){
				
			$query2 = $db->query("UPDATE fyn_vehicle SET stock_out = '".$stockout_toupdate."',bal_stock = '".$bal."' WHERE id = '".$parent_id."'");
		//$query2 = $db->query("UPDATE fyn_vehicle SET bal_stock = '".$bal."' WHERE id = '".$parent_id."'");
			$id_new = create_guid();
			$stockin_new_id = create_guid();
			$query3 = $db->query("INSERT INTO aos_products_fyn_stock_in_1_c SET aos_products_fyn_stock_in_1fyn_stock_in_idb = '".$stockin_new_id."',aos_products_fyn_stock_in_1aos_products_ida = '".$product_id."',deleted = 0,id = '".$id_new."'");
			$query4 = $db->query("INSERT INTO fyn_stock_in SET quantity = '".$quantity."',name = '".$product_stockinname."',id = '".$stockin_new_id."',deleted = 0,date_modified=now()");
			$query5 =$db->query("SELECT * FROM aos_products_cstm WHERE id_c='".$product_id."'");
			$row5 = $db->fetchByAssoc($query5);
			$stockin = $row5['stockin_c']; 
			$stockout = $row5['stockout_c'];
			$stockin_toupdate =  $stockin+$quantity;
			$new_order = $row5['stagging_inventory_c'];
			if($row5['stockout_c'] >= 1) {
			$balance_product = $stockin_toupdate - $stockout;
			}
			//else { $balance_product = 0; }
			if($row5['stockout_c'] == "") {
			$balance_product = $stockin_toupdate;}
			$query6 = $db->query("UPDATE aos_products_cstm SET balance_c = '".$balance_product."',stockin_c = '".$stockin_toupdate."' WHERE id_c = '".$product_id."'");
			$query7 = $db->query("INSERT INTO fyn_stock_in_cstm SET from1_c = 'Vehiclereturn',id_c = '".$stockin_new_id."',fyn_vehicle_id_c='".$parent_id."'");
			$GLOBALS['log']->fatal("INSERT INTO fyn_stock_in_cstm SET from1_c = 'Vehiclereturn',id_c = '".$stockin_new_id."',fyn_vehicle_id_c='".$parent_id."'");
			$opencart_balance = $balance_product-$new_order;
			$q = $db->query("UPDATE aos_products_cstm SET opencartbalancestock_c = '".$opencart_balance."' WHERE id_c='".$product_id."'");
			if($opencart_balance <= 0){
				$update1 = $db->query("UPDATE aos_products SET maincode = 'Disable' WHERE id = '".$product_id."'");
				}
				if($opencart_balance > 0){
				$update1 = $db->query("UPDATE aos_products SET maincode = 'Enable' WHERE id = '".$product_id."'");
				}
		}
		if($bean->destination == 'VehicletoVehicle'){
			$to_vehicle = $bean->fyn_vehicle_id_c;
			$vid = create_guid();
			$vid_rel = create_guid();
			$vout_id = create_guid();
			$vout_id_rel = create_guid();
			$vproduct_id = create_guid();
			$vproduct_id_out = create_guid();
			$vname = 'VST_IN_'.$name.'_'.$date;
			$query1 = $db->query("SELECT * FROM fyn_vehicle WHERE id='".$to_vehicle."'");
			$row1 = $db->fetchByAssoc($query1);
			$stockin1 = $row1['stock_in']; 
			$name1 = $row1['name'];
			$stockout = $row1['stock_out'];
			$stockin1_toupdate =  $stockin1+$quantity;
			$bala = $stockin1_toupdate-$stockout;
			
					
			$date = date('m/d/Y');
			$voutname  = 'VST_OUT_'.$name1.'_'.$date; 
			$i = $db->query("INSERT INTO vs_vehicle_stockin SET id='".$vid."',name='".$vname."',deleted=0,quantity='".$quantity."',fromwhere='Vehicle2vehicle',assigned_user_id='".$ass_user."'");
			$i = $db->query("INSERT INTO fyn_vehicle_vs_vehicle_stockin_1_c SET id='".$vid_rel."', fyn_vehicle_vs_vehicle_stockin_1fyn_vehicle_ida='".$to_vehicle."',deleted=0,fyn_vehicle_vs_vehicle_stockin_1vs_vehicle_stockin_idb='".$vid."'");
			$i = $db->query("INSERT INTO  aos_products_vs_vehicle_stockin_1_c SET id='".$vproduct_id."',aos_products_vs_vehicle_stockin_1aos_products_ida='".$product_id."',deleted=0,aos_products_vs_vehicle_stockin_1vs_vehicle_stockin_idb='".$vid."'");
			$i = $db->query("INSERT INTO vs_vehiclestockout SET id='".$vout_id."',name='".$voutname."',deleted=0,quantity='".$quantity."',destination='VehicletoVehicle',assigned_user_id='".$ass_user."'");
			$i = $db->query("INSERT INTO fyn_vehicle_vs_vehiclestockout_1_c SET id='".$vout_id_rel."', fyn_vehicle_vs_vehiclestockout_1fyn_vehicle_ida='".$parent_id."',deleted=0,fyn_vehicle_vs_vehiclestockout_1vs_vehiclestockout_idb='".$vout_id."'");
			$i = $db->query("INSERT INTO aos_products_vs_vehiclestockout_1_c SET id='".$vproduct_id_out."',aos_products_vs_vehiclestockout_1aos_products_ida='".$parent_id."',deleted=0,aos_products_vs_vehiclestockout_1vs_vehiclestockout_idb='".$vout_id."'");
			$u = $db->query("UPDATE fyn_vehicle SET bal_stock='".$bala."',stock_in = '".$stockin1_toupdate."' WHERE id = '".$to_vehicle."'");
			$u2 = $db->query("UPDATE fyn_vehicle SET stock_out = '".$stockout_toupdate."',bal_stock = '".$bal."' WHERE id = '".$parent_id."'");
		}
		
		}
		$bean->do_not_delete_c = 1;
		
		//UPDATING THE CART
		
		$query1 = "SELECT maincode,type,part_number FROM aos_products WHERE id='".$product_id."'";
		$result1 = $db->query($query1);
		$row1 = $result1->fetch_assoc();
		if($row1['maincode'] == 'Enable'){
			$update = $cart_conn->query("UPDATE `oc_product` SET status = '1' WHERE product_id = '".$row1['part_number']."'");
			$GLOBALS['log']->fatal("UPDATE Prod".$row1['part_number']);
			
		}
		
	}
}

	?>