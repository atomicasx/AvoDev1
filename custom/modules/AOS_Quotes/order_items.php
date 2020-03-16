<?php
error_reporting(E_ALL);
//ini_set('display_errors', 1);
if(!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
class Class_Order_item
{
public function Order_method($bean, $event, $arguments)
	{
		global $db;
		global $sugar_config;
if ($sugar_config['dbport']) 
        $port=$sugar_config['dbport'];
      
      else-
        $port=3306;
		$cart_conn = new mysqli($sugar_config['hostname'], $sugar_config['user'], $sugar_config['password'], $sugar_config['dbname'],$port);
       
      if (!$cart_conn )
      {     
      //echo "NOt Connected";
        $GLOBALS['log']->fatal("Connection failed: " . $cart_conn->connect_error);
      }
      else
      {
        $GLOBALS['log']->fatal("cart_conn Connected successfully<br>");
		//	echo "Connected";
		}
		
		$query = $cart_conn->query("SELECT order_id FROM oc_order ORDER BY order_id DESC LIMIT 1");
		$row1 = $query->fetch_assoc(); 
		$order_id = $row1['order_id'];
		$que = $cart_conn->query("SELECT order_product_id FROM oc_order_product WHERE order_id ='".$bean->orderid_c."'");
		if($que->num_rows <= 0)
		 {	 
		 	$query11 = $db->query("SELECT * FROM aos_products_quotes WHERE parent_id = '".$bean->id."' AND deleted = 0");
			$no_of_records = $query11->num_rows;
			while($no_of_records != 0){
			while($row11 = $query11->fetch_assoc()){
				$product_name = $row11['name'];
				$product_recordid = $row11['id'];
				$products_id = $row11['product_id'];
				$product_date_entered = $row11['date_entered'];
				$product_id = $row11['part_number'];
				$quantity_products = $row11['product_qty'];
				$price = $row11['product_list_price'];
				$sprice = $row11['product_unit_price'];
				$total_price = $row11['product_total_price'];
				$tax = $row11['vat_amt'];
				
				$query111 = $db->query("SELECT * FROM aos_products_cstm WHERE id_c = '".$products_id."'");
				$row111 = $query111->fetch_assoc();
				$balance = $row111['balance_c'];
				$new_order = $row111['stagging_inventory_c'];
				$new_order_after_update = $new_order+$quantity_products;
				$balance_stock_afterorder = $row111['opencartbalancestock_c'];
				$balance_to_show = $balance-$new_order_after_update;
				$update = $db->query("UPDATE aos_products_cstm SET stagging_inventory_c='".$new_order_after_update."',opencartbalancestock_c = '".$balance_to_show."' WHERE id_c = '".$products_id."'");
				if($balance_to_show <= 0){
				$update1 = $db->query("UPDATE aos_products SET maincode = 'Disable' WHERE id = '".$products_id."'");
				}
				if($balance_to_show >= 0){
				$update1 = $db->query("UPDATE aos_products SET maincode = 'Enable' WHERE id = '".$products_id."'");
				}
				$qu = $cart_conn->query("SELECT order_product_id FROM oc_order_product ORDER BY order_product_id DESC LIMIT 1");		
				$r = $qu->fetch_assoc(); 
				$order_product_id = $r['order_product_id']+1;
				$GLOBALS['log']->fatal("outside no_rows.orderid".$order_product_id);
				$GLOBALS['log']->fatal("inside no_rows");
				$query = $cart_conn->query("INSERT INTO oc_order_product SET order_product_id = '".$order_product_id."',order_id = '".$order_id."',price = '".$price."',sprice = '".$price."',tax = '".$tax."',name = '".$product_name."',quantity = '".$quantity_products."',model = '".$product_name."',product_id = '".$product_id."',total = '".$total_price."',reward = '0'");
				$GLOBALS['log']->fatal("INSERT INTO oc_order_product SET order_product_id = '".$order_product_id."',order_id = '".$order_id."',price = '".$price."',sprice = '".$price."',tax = '".$tax."',name = '".$product_name."',quantity = '".$quantity_products."',model = '".$product_name."',product_id = '".$product_id."',total = '".$total_price."',reward = '0'"); 
				$order_product_id++;
				$GLOBALS['log']->fatal("inside while no_rows.orderid".$order_product_id);
				$no_of_records--;
				$GLOBALS['log']->fatal("inside while no_records".$no_of_records);
				}
	   	}
	   } 
		
	}
	}
?>
	  