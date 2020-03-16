<?php

if(!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
//To update the name in crm
class updatename
{
	public function namemethod($bean, $event, $arguments)
	{
		global $db;
		//echo "Hello"; 
		//echo "SELECT customerid_c FROM aos_quotes_cstm WHERE id_c = '".$bean->id."'";
		$query = $db->query("SELECT name,sic_code FROM accounts WHERE id = '".$bean->billing_account_id."'");
		$row1 = $query->fetch_assoc(); 
		$customer_id = $row1['sic_code'];
		$customer_name = $row1['name'];
		$query11 = $db->query("SELECT orderid_c FROM aos_quotes_cstm ORDER BY orderid_c DESC LIMIT 1");
		$row1 = $query11->fetch_assoc();
		$order_id = $row1['orderid_c'];
		// $query2 = $db->query("SELECT date_entered FROM `aos_quotes` WHERE id='".$bean->id."'");
		// $row2 = $query2->fetch_assoc();
		$date_enter = $bean->date_entered;//$row2['date_entered'];
      $bean->name = $customer_id.'-'.$order_id.'-'.$customer_name;
	}
}

	?>