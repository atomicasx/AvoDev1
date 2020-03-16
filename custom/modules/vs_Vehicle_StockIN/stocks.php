<?php

if(!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class vStock_Vehicle
{
	public function vstock_method($bean, $event, $arguments)
	{
		global $db,$beanFiles,$beanList;
		$quantity = $bean->quantity;
		$parent_id = $_REQUEST['fyn_vehicle_vs_vehicle_stockin_1fyn_vehicle_ida'];
		$product_id  = $_REQUEST['aos_products_vs_vehicle_stockin_1aos_products_ida'];
		$query1 = $db->query("SELECT * FROM fyn_vehicle WHERE id='".$parent_id."'");
		$row1 = $db->fetchByAssoc($query1);
		$stockin1 = $row1['stock_in']; 
		$name = $row1['name'];
		$stockin_toupdate =  $stockin1+$quantity;
		$stockout = $row1['stock_out'];
		if($row1['stock_out'] >= 1) {
			$bal = $stockin_toupdate - $stockout;
			}
			//else { $bal = 0; }
		if($row1['stock_out'] == ""){ $bal = $stockin_toupdate; }
		$date = date('m/d/Y');
		$bean->name  = 'VST_IN_'.$name.'_'.$date; 
		$product_stockinname =  'ST_OUT_'.$name.'_'.$date; 
		if($bean->do_not_delete_c == ""){
			if($bean->fromwhere == 'Warehouse'){
			$query2 = $db->query("UPDATE fyn_vehicle SET stock_in = '".$stockin_toupdate."',bal_stock='".$bal."' WHERE id = '".$parent_id."'");
			$id_new = create_guid();
			$stockin_new_id = create_guid();
			$query3 = $db->query("INSERT INTO aos_products_fyn_stock_out_1_c SET aos_products_fyn_stock_out_1fyn_stock_out_idb = '".$stockin_new_id."',aos_products_fyn_stock_out_1aos_products_ida = '".$product_id."',deleted = 0,id = '".$id_new."'");
			$query4 = $db->query("INSERT INTO fyn_stock_out SET quantity = '".$quantity."',name = '".$product_stockinname."',id = '".$stockin_new_id."',deleted = 0");
			$query4 = $db->query("INSERT INTO fyn_stock_out_cstm SET destination_c = 'Return_Warehouse',id_c = '".$stockin_new_id."',fyn_vehicle_id_c='".$parent_id."'");
			$query5 =$db->query("SELECT * FROM aos_products_cstm WHERE id_c='".$product_id."'");
			$row5 = $db->fetchByAssoc($query5);
			$stockin = $row5['stockin_c']; 
			$stockout = $row5['stockout_c'];
			$new_order = $row5['stagging_inventory_c'];
			$stockout_toupdate =  $stockout+$quantity; 
			$balance_product = $stockin - $stockout_toupdate;
			$opencart_balance = $balance_product-$new_order;
			$query6 = $db->query("UPDATE aos_products_cstm SET opencartbalancestock_c = '".$opencart_balance."',balance_c = '".$balance_product."',stockout_c = '".$stockout_toupdate."' WHERE id_c = '".$product_id."'");
			
			//$query2 = $db->query("UPDATE fyn_vehicle SET bal_stock = '".$bal."' WHERE id = '".$parent_id."'");
			//$q = $db->query("UPDATE aos_products_cstm SET opencartbalancestock_c = '".$opencart_balance."' WHERE id_c='".$product_id."'");
			if($opencart_balance <= 0){
				$update1 = $db->query("UPDATE aos_products SET maincode = 'Disable' WHERE id = '".$product_id."'");
				}
				if($opencart_balance > 0){
				$update1 = $db->query("UPDATE aos_products SET maincode = 'Enable' WHERE id = '".$product_id."'");
				}
		}
		// }
// VEHicle to vehcile - start 

		if($bean->fromwhere = 'Vehicle2vehicle'){
			$from_vehicle = $bean->fyn_vehicle_id_c;
			$ass_user = $bean->assigned_user_id;
			$vid = create_guid();
			$vid_rel = create_guid();
			$vout_id = create_guid();
			$vout_id_rel = create_guid();
			$vname = 'VST_IN_'.$name.'_'.$date;
			$query1 = $db->query("SELECT * FROM fyn_vehicle WHERE id='".$from_vehicle."'");
			$row1 = $db->fetchByAssoc($query1);
			$stockin1 = $row1['stock_in']; 
			$name1 = $row1['name'];
			$stockout = $row1['stock_out'];
			$stockin_toupdate_fromveh =  $stockin1+$quantity;
			$stockout_toupdate1 = $stockout+$quantity;
			$bala = $stockin1-$stockout_toupdate1;
			
			$date = date('m/d/Y');
			$voutname  = 'VST_OUT_'.$name1.'_'.$date; 
			$vproduct_id = create_guid();
			$vproduct_id_out = create_guid();
			//$i = $db->query("INSERT INTO vs_vehicle_stockin SET id='".$vid."',name='".$vname."',deleted=0,quantity='".$quantity."',fromwhere='Vehicle2vehicle',assigned_user_id='".$ass_user."'");
			$i = $db->query("INSERT INTO fyn_vehicle_vs_vehicle_stockin_1_c SET id='".$vid_rel."', fyn_vehicle_vs_vehicle_stockin_1fyn_vehicle_ida='".$parent_id."',deleted=0,fyn_vehicle_vs_vehicle_stockin_1vs_vehicle_stockin_idb='".$vid."'");
			$i = $db->query("INSERT INTO  aos_products_vs_vehicle_stockin_1_c SET id='".$vproduct_id."',aos_products_vs_vehicle_stockin_1aos_products_ida='".$product_id."',deleted=0,aos_products_vs_vehicle_stockin_1vs_vehicle_stockin_idb='".$vid."'");
			$i = $db->query("INSERT INTO vs_vehiclestockout SET id='".$vout_id."',name='".$voutname."',deleted=0,quantity='".$quantity."',destination='VehicletoVehicle',assigned_user_id='".$ass_user."'");
			$i = $db->query("INSERT INTO fyn_vehicle_vs_vehiclestockout_1_c SET id='".$vout_id_rel."', fyn_vehicle_vs_vehiclestockout_1fyn_vehicle_ida='".$from_vehicle."',deleted=0,fyn_vehicle_vs_vehiclestockout_1vs_vehiclestockout_idb='".$vout_id."'");
			$i = $db->query("INSERT INTO aos_products_vs_vehiclestockout_1_c SET id='".$vproduct_id_out."',aos_products_vs_vehiclestockout_1aos_products_ida='".$from_vehicle."',deleted=0,aos_products_vs_vehiclestockout_1vs_vehiclestockout_idb='".$vout_id."'");
			$u = $db->query("UPDATE fyn_vehicle SET bal_stock='".$bala."',stock_out = '".$stockout_toupdate1."' WHERE id = '".$from_vehicle."'");
			$u1 = $db->query("UPDATE fyn_vehicle SET stock_in = '".$stockin_toupdate."',bal_stock='".$bal."' WHERE id = '".$parent_id."'");
					}
	}
		$bean->do_not_delete_c = 1;
		
	}
}

	?>