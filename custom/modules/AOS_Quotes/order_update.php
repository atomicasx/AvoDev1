<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
//To update the status in opencart - invoiced
class Order_Status
{
	public function order_method($bean, $event, $arguments)
	{
		global $db;
		global $sugar_config;
		$port=3306;
		$cart_conn = new mysqli($sugar_config['hostname'], $sugar_config['user'], $sugar_config['password'], $sugar_config['dbname'],$port);
       
      if (!$cart_conn )
      {     
        $GLOBALS['log']->fatal("Connection failed: " . $cart_conn->connect_error);
      }
      else
      {
        $GLOBALS['log']->fatal("cart_conn Connected successfully<br>");
      }



	



      $que = $cart_conn->query("SELECT order_product_id FROM oc_order_product ORDER BY order_product_id DESC LIMIT 1");
		$ro = $que->fetch_assoc();
		
		$order = $ro['order_product_id'];		
		$GLOBALS['log']->fatal("order_update.php".$order);		
		
      $order_status = $bean->invoice_status; 
      $order_id = $bean->orderid_c;
		$query1 = "SELECT order_status_id FROM oc_order_status WHERE name='".$order_status."'";
		$result1 = $cart_conn->query($query1);
		$row1 = $result1->fetch_assoc();
		$status = $row1['order_status_id'];
		$update = $cart_conn->query("UPDATE `oc_order` SET order_status_id = '".$status."' WHERE order_id = '".$order_id."'");
		$GLOBALS['log']->fatal("UPDATE order".$update);


		
		
			
	}
}

	?>