<?php

if(!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class Stockout_Products
{
	//var $useForSubpanel = true;

	
	public function stockout_method($bean, $event, $arguments)
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
		$parent_id = $_REQUEST['aos_products_fyn_stock_out_1aos_products_ida'];
		$que =$db->query("SELECT * FROM aos_products_cstm WHERE id_c = '".$parent_id."'");
		$re = $db->fetchByAssoc($que);
		$model_name = $re['product_model_code_c'];
		$new_order = $re['stagging_inventory_c'];
		$date = date('m/d/Y');
		$bean->name  = 'ST_OUT_'.$model_name.'_'.$date;
		$van_id = $_REQUEST['fyn_vehicles_st_stock_out_1fyn_vehicles_ida'];
		$selected_vehicle = $bean->fyn_vehicle_id_c;
		$query =$db->query("SELECT * FROM aos_products_cstm WHERE id_c='".$parent_id."'");
		$row = $db->fetchByAssoc($query);
		$stockin = $row['stockin_c']; 
		$stockout = $row['stockout_c'];
		$stockout_toupdate =  $stockout+$quantity; 
		$query1 =$db->query("SELECT * FROM fyn_vehicle WHERE id='".$selected_vehicle."'");
		$row1 = $db->fetchByAssoc($query1);
		$stockin_s_v = $row1['stock_in']; //exit;
		$stockout_s_v = $row1['stock_out'];
		$stockin_toupdate_invan =  $stockin_s_v+$quantity;
		$quer =$db->query("SELECT * FROM fyn_vehicle WHERE id='".$selected_vehicle."'");
		$ro = $db->fetchByAssoc($quer);
		$van_name = $ro['name']; 
		if($bean->do_not_delete_c == ""){
		$query2 = $db->query("UPDATE aos_products_cstm SET stockout_c = '".$stockout_toupdate."' WHERE id_c = '".$parent_id."'");
		$bal = $stockin - $stockout_toupdate;
		$query3 = $db->query("UPDATE aos_products_cstm SET  balance_c = '".$bal."' WHERE id_c = '".$parent_id."'");
		
		$query4 = $db->query("UPDATE fyn_vehicle SET stock_in = '".$stockin_toupdate_invan."' WHERE id = '".$selected_vehicle."'");
		//echo "UPDATE fyn_vehicles_cstm SET stock_in = '".$stockin_toupdate_invan."' WHERE id_c = '".$selected_vehicle."'";
      $bal_van = $stockin_toupdate_invan - $stockout_s_v;
		$query5 = $db->query("UPDATE fyn_vehicle SET  bal_stock = '".$bal_van."' WHERE id = '".$selected_vehicle."'");
		
		$id_v_stin = create_guid();
		$idb = create_guid();
		$v_pro_id = create_guid();
		$name = 'VST_IN_'.$van_name.'_'.$date;
		$query6 = $db->query("INSERT INTO  vs_vehicle_stockin SET name = '".$name."',id = '".$idb."',deleted = 0,quantity = '".$quantity."',fromwhere = 'Warehouse',assigned_user_id='".$bean->assigned_user_id."',date_modified = NOW()");
		$query61 = $db->query("INSERT INTO vs_vehicle_stockin_cstm SET do_not_delete_c = '1',id_c='".$idb."'");
		$query7 = $db->query("INSERT INTO fyn_vehicle_vs_vehicle_stockin_1_c SET id = '".$id_v_stin."',deleted = 0,fyn_vehicle_vs_vehicle_stockin_1vs_vehicle_stockin_idb = '".$idb."',fyn_vehicle_vs_vehicle_stockin_1fyn_vehicle_ida = '".$selected_vehicle."'");
		$query8 = $db->query("INSERT INTO aos_products_vs_vehicle_stockin_1_c SET id = '".$v_pro_id."',deleted = 0,aos_products_vs_vehicle_stockin_1aos_products_ida = '".$parent_id."',aos_products_vs_vehicle_stockin_1vs_vehicle_stockin_idb = '".$idb."'");
		
		if($bal <= 0)
		{ 
		$query1 = $db->query("UPDATE aos_products SET type = 'Out_of_Stock' WHERE id = '".$parent_id."'"); 
		}
		$opencart_balance = $bal-$new_order;
		$q = $db->query("UPDATE aos_products_cstm SET opencartbalancestock_c = '".$opencart_balance."' WHERE id_c='".$parent_id."'");
		if($opencart_balance <= 0){
				$update1 = $db->query("UPDATE aos_products SET maincode = 'Disable' WHERE id = '".$parent_id."'");
				}
				if($opencart_balance > 0){
				$update1 = $db->query("UPDATE aos_products SET maincode = 'Enable' WHERE id = '".$parent_id."'");
				}
		}
		$bean->do_not_delete_c = 1;
		/*if($bal_van <= 0)
		{ 
		$query1 = $db->query("UPDATE fyn_vehicles_cstm SET stock_status_c = 'Out_of_Stock' WHERE id_c = '".$parent_id."'"); 
		}*/
		
		//UPDATING CART
		
		$query1 = "SELECT maincode,type,part_number FROM aos_products WHERE id='".$parent_id."'";
		$result1 = $db->query($query1);
		$row1 = $result1->fetch_assoc();
		if($row1['maincode'] == 'Disable'){
			$update = $cart_conn->query("UPDATE `oc_product` SET status = '0' WHERE product_id = '".$row1['part_number']."'");
			$GLOBALS['log']->fatal("UPDATE Prod".$row1['part_number']);
			
		}
	}
}

	?>