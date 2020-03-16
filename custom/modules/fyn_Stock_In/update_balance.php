<?php

if(!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class balance_Products
{
	public function balance_method($bean, $event, $arguments)
	{
		global $db;
		global $sugar_config;
		$cart_conn = new mysqli($sugar_config['hostname'], $sugar_config['user'], $sugar_config['password'], $sugar_config['dbname'],$port);
       
      if (!$cart_conn )
      {     
        $GLOBALS['log']->fatal("Connection failed: " . $cart_conn->connect_error);
      }
      else
      {
        $GLOBALS['log']->fatal("cart_conn Connected successfully<br>");
      }
    // echo $product_id = $bean->oc_product_id_c;exit;
      $product_id = $_REQUEST['aos_products_fyn_stock_in_1aos_products_ida'];
		$query =$db->query("SELECT * FROM aos_products_cstm WHERE id_c='".$product_id."'");
		$row = $db->fetchByAssoc($query);
		$balance = $row['balance_c'];
		$query1 =$db->query("SELECT * FROM aos_products WHERE id='".$product_id."'");
		$row1 = $db->fetchByAssoc($query1);
		$oc_product_id = $row1['part_number'];
		$update = $cart_conn->query("UPDATE `oc_product` SET balance = '".$balance."' WHERE product_id = '".$oc_product_id."'");
		$GLOBALS['log']->fatal("UPDATE order".$update);
		
			
	}
}

	?>