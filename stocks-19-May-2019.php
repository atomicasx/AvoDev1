<?php

if(!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class Stock_Products
{
	//var $useForSubpanel = true;

	
	public function stock_method($bean, $event, $arguments)
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
		$parent_id = $_REQUEST['aos_products_fyn_stock_in_1aos_products_ida'];
		$que =$db->query("SELECT * FROM aos_products_cstm WHERE id_c = '".$parent_id."'");
		$re = $db->fetchByAssoc($que);
		$model_name = $re['product_model_code_c'];
		$date = date('m/d/Y');
		$bean->name  = 'ST_IN_'.$model_name.'_'.$date; 
		$parent_stockin = 1;
		$query =$db->query("SELECT * FROM aos_products_cstm WHERE id_c='".$parent_id."'");
		$row = $db->fetchByAssoc($query);
		$stockin = $row['stockin_c']; 
		$totstockin = $row['stock_in_from_farm_c'];
		$stockin_toupdate1 =  $stockin+$quantity;
		$stockout = $row['stockout_c']; 
		$new_order = $row['stagging_inventory_c'];
		

		$query123 =$db->query("SELECT * FROM aos_products_cstm WHERE id_c='".$parent_id."'");
		$row123 = $db->fetchByAssoc($query123);
		$totstockin = $row123['stock_in_from_farm_c'];
		if($bean->do_not_delete_c == ""){
		if($bean->from1_c == 'Farm' || $bean->from1_c == "" ){
			$stockin_toupdate2 =  $totstockin+$quantity;
			$query2 = $db->query("UPDATE aos_products_cstm SET stock_in_from_farm_c = '".$stockin_toupdate2."' WHERE id_c = '".$parent_id."'");
		}
	}


//Update Product CRM	- START		
		
		if($bean->do_not_delete_c == ""){
		$stockin_toupdate2 =  $totstockin+$quantity;

			//if(($bean->from1_c = 'Farm') || ($bean->from1_c == "")){
				$query2 = $db->query("UPDATE aos_products_cstm SET stockin_c = '".$stockin_toupdate1."' WHERE id_c = '".$parent_id."'");
				//}
				if($row['stockout_c'] >= 1) {
				$bal = $stockin_toupdate1 - $stockout;
				}
				//else { $bal = 0; }
				if(($row['stockout_c'] == "") || ($row['stockout_c'] == 0)) {
				$bal = $stockin_toupdate1;
				}
				$query2 = $db->query("UPDATE aos_products_cstm SET balance_c = '".$bal."' WHERE id_c = '".$parent_id."'");
				}
				if($stockin_toupdate1 >= $stockout)
				{ 
					$query1 = $db->query("UPDATE aos_products SET type = 'In_Stock' WHERE id = '".$parent_id."'"); 
				}
				$opencart_balance = $bal-$new_order;
				$q = $db->query("UPDATE aos_products_cstm SET opencartbalancestock_c = '".$opencart_balance."' WHERE id_c='".$parent_id."'");
				if($opencart_balance <= 0){
					$update1 = $db->query("UPDATE aos_products SET maincode = 'Disable' WHERE id = '".$parent_id."'");
				}
				if($opencart_balance > 0){
					$update1 = $db->query("UPDATE aos_products SET maincode = 'Enable' WHERE id = '".$parent_id."'");
				}
		//}
		
		
//Update Product CRM	- END

//Vehcile update - START	
		
		$vechile_id = $bean->fyn_vehicle_id_c;
		$voutid = create_guid();
		$vrelation = create_guid();
		//$vname = 'VST_OUT_'.$model_name.'_'.$date;
		if($bean->from1_c == 'Vehiclereturn'){
			if($bean->do_not_delete_c == ""){
			$d1 = $db->query("INSERT INTO fyn_vehicle_vs_vehiclestockout_1_c SET id='".$vrelation."',fyn_vehicle_vs_vehiclestockout_1fyn_vehicle_ida='".$vechile_id."',fyn_vehicle_vs_vehiclestockout_1vs_vehiclestockout_idb='".$voutid."',deleted=0");
			$query1 = $db->query("SELECT * FROM fyn_vehicle WHERE id='".$vechile_id."'");
			$row1 = $db->fetchByAssoc($query1);
			$stockin1 = $row1['stock_in']; 
			$stockout = $row1['stock_out'];
			$name = $row1['name'];
			$stockout_toupdate =  $stockout+$quantity;
			$bal = $stockin1 - $stockout_toupdate;
			$date = date('m/d/Y');
			$vname  = 'VST_OUT_'.$name.'_'.$date;
			$d = $db->query("INSERT INTO vs_vehiclestockout SET deleted=0,destination='return_warehouse',quantity='".$quantity."',name='".$vname."',id='".$voutid."'");
			$pro_vs_id = create_guid();
			$query2 = $db->query("UPDATE fyn_vehicle SET stock_out = '".$stockout_toupdate."',bal_stock = '".$bal."' WHERE id = '".$vechile_id."'");
			$a = $db->query("INSERT INTO aos_products_vs_vehiclestockout_1_c SET aos_products_vs_vehiclestockout_1aos_products_ida ='".$parent_id."',aos_products_vs_vehiclestockout_1vs_vehiclestockout_idb='".$voutid."',deleted=0,id = '".$pro_vs_id."'");
		}
	}
		$bean->do_not_delete_c = 1;
		//UPDATING THE CART
		
		$query1 = "SELECT maincode,type,part_number FROM aos_products WHERE id='".$parent_id."'";
		$result1 = $db->query($query1);
		$row1 = $result1->fetch_assoc();
		if($row1['maincode'] == 'Enable'){
			$update = $cart_conn->query("UPDATE `oc_product` SET status = '1' WHERE product_id = '".$row1['part_number']."'");
			$GLOBALS['log']->fatal("UPDATE Prod".$row1['part_number']);
			
		}
	}
}

	?>