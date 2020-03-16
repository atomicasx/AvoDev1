<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
class class_addproduct
{

	/**
	* Called as process_record logic hook on the Performers module
	*/
	public function method_addproduct($bean, $event, $arguments)
	{
		global $db;
		global $sugar_config;
if ($sugar_config['dbport']) {
        $port=$sugar_config['dbport'];
      }
      else{
        $port=3306;
    }
		$cart_conn = new mysqli($sugar_config['hostname'], $sugar_config['user'], $sugar_config['password'], $sugar_config['dbname'],$port);
       
      if (!$cart_conn )
      {     
      echo "NOt Connected";
        $GLOBALS['log']->fatal("Connection failed: " . $cart_conn->connect_error);
      }
      else
      {
        $GLOBALS['log']->fatal("cart_conn Connected successfully<br>");
			echo "Connected";
		
		$product_name = $bean->name;
		if ($bean->category == "AvacadoClass1")
		{
			$cat = "93";

		}
		else if($bean->category == "AvacadoClass2")
		{
			$cat = "94";
		}
		else if ($bean->category ==  "AvacadoOrganic") {
			 $cat = "95";
		}
		else if ($bean->category ==  "Other") {
			$cat = "118";
		}
		else{

		}
		 echo "Cat"; print_r($cat);
		// exit;
		$query = $cart_conn->query("SELECT product_id FROM oc_product ORDER BY product_id DESC LIMIT 1");
		$row1 = $query->fetch_assoc(); 
		$product_id = $row1['product_id']+1;
		echo "Cat"; print_r($product_id);
		
		$date_entered = $bean->date_entered;
		$ip = $_SERVER['SERVER_ADDR'];
		$q = $cart_conn->query("SELECT * FROM oc_product WHERE product_id = '".$bean->part_number."'");
		$r = $q->fetch_assoc(); 
		echo $no_of_record = $q->num_rows; //exit;
		if($no_of_record <=0){
			$query = $db->query("UPDATE aos_products SET part_number  = '".$product_id."' WHERE id = '".$bean->id."'");
			$querys = $cart_conn->query("INSERT INTO oc_product SET sku = '".$bean->id."',price = '".$bean->price."',quantity = '100000',model = '".$product_name."',product_id = '".$product_id."',status= '1',date_added = now(),date_modified = now()");
			$querys = $cart_conn->query("INSERT INTO oc_product_description SET name = '".$product_name."',product_id = '".$product_id."',language_id = '1'");
			$queryc = $cart_conn->query("INSERT INTO oc_product_to_category SET product_id = '".$product_id."',category_id = '".$cat."'");
			// print_r($queryc);exit;
			echo "INSERT INTO oc_product SET sku = '".$bean->id."',price = '".$bean->price."',quantity = '100000',model = '".$product_name."',product_id = '".$product_id."',status= '1',date_added = now(),date_modified = now()";
		//exit;	
			$GLOBALS['log']->fatal("addcustomerfrom crm".$querys); 
		}
		if($no_of_record == 1) {
			$querys = $cart_conn->query("UPDATE oc_product SET sku = '".$bean->id."',price = '".$bean->price."',quantity = '100000',model = '".$product_name."',status= '1',date_added = now(),date_modified = now() WHERE product_id = '".$bean->part_number."'");
			$querys = $cart_conn->query("UPDATE oc_product_description SET name = '".$product_name."',language_id = '1' WHERE product_id = '".$bean->part_number."'");
			$querys = $cart_conn->query("UPDATE oc_product_to_category SET category_id = '".$cat."',product_id = '".$product_id."'");
			
		/*$query1 = "SELECT maincode,type,part_number FROM aos_products WHERE id='".$parent_id."'";
		$result1 = $db->query($query1);
		$row1 = $result1->fetch_assoc();*/
			if($bean->maincode == 'Disable'){
				$update = $cart_conn->query("UPDATE `oc_product` SET status = '0' WHERE product_id = '".$bean->part_number."'");
				$GLOBALS['log']->fatal("UPDATE Prod".$bean->part_number);
			}
			if($bean->maincode == 'Enable'){
				$update = $cart_conn->query("UPDATE `oc_product` SET status = '1' WHERE product_id = '".$bean->part_number."'");
				$GLOBALS['log']->fatal("UPDATE Prod".$bean->part_number);
			}
		}
		}
	}
}
?>
	  