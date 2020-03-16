<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
    
    //Shifa- Start
    
class Add_orderclass
{

	/**
	* Called as process_record logic hook on the Performers module
	*/
	public function addorder_method($bean, $event, $arguments)
	{
		global $db;
		global $sugar_config;
if ($sugar_config['dbport']) 
        $port=$sugar_config['dbport'];
      else
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
			echo "Connected";
		}
		
		//for commission
		// $commissionuserbean = BeanFactory::getBean('Users', $bean->user_id_c);
		// $bean->commission_amount_c = $commissionuserbean->commision_rate_c;
		//  print_r($bean->commission_amount_c); exit;
		//end commission
		if($bean->do_no_delete_c == ""){
		//$GLOBALS['log']->fatal("DONOTDELeTE inside if".$bean->do_no_delete_c); 
		//$order_name = $bean->name;
		$street = $bean->billing_address_street;
		$state = $bean->billing_address_state;
		$city = $bean->billing_address_city;
		$postal_code = $bean->billing_address_postalcode;
		$country = $bean->billing_address_country;
		$customer_name_id = $bean->billing_account_id;
		$shipping_street = $bean->shipping_address_street;
		$shipping_city = $bean->shipping_address_city;
		$shipping_state = $bean->shipping_address_state;
		$shipping_postal_code = $bean->shipping_address_postalcode;
		$shipping_country = $bean->shipping_address_country;
		$sub_total = $bean->subtotal_amount;
		$tax = $bean->tax_amount;
		$shipping_charge = $bean->shipping_amount;
		$commission = $bean->commission_amount_c;
		if($commission=="" or $commission==NULL )
			$commission=0;
		$bean->save;
		$query = $db->query("SELECT name,sic_code,employees FROM accounts WHERE id = '".$customer_name_id."'");
		$row1 = $query->fetch_assoc(); 
		$customer_name = $row1['name'];
		$customer_id = $row1['sic_code'];
		$company_name = $row1['employees'];
		
		$query = $cart_conn->query("SELECT order_id FROM oc_order ORDER BY order_id DESC LIMIT 1");
		$row4 = $query->fetch_assoc();
		//$query = $db->query("SELECT orderid_c FROM aos_quotes_cstm ORDER BY orderid_C DESC LIMIT 2");
		//$row4 = $query->fetch_assoc();
		$query1 = $cart_conn->query("SELECT order_total_id FROM oc_order_total ORDER BY order_total_id DESC LIMIT 1");
		$row41 = $query1->fetch_assoc();
		
		if((int)$row4['order_id'] > (int)$bean->orderid_c ) { 
		 $order_id = $row4['order_id']+1;
		 $order_total_id = $row41['order_total_id']+1;
		 $order_total_id1 = $row41['order_total_id']+2;
		 $order_total_id2 = $row41['order_total_id']+3;
		 $order_total_id3= $row41['order_total_id']+4;
		 }
		else {  
		$order_id = $row4['order_id'];
		
		 }
		//$order_id = $row1['order_id'];
		$query = $db->query("UPDATE  aos_quotes_cstm SET customerid_c  = '".$customer_id."',orderid_c = '".$order_id."' WHERE id_c = '".$bean->id."'");
		// print_r($query);
		// exit;
		//$order_id = $bean->order_id;
		// echo "<pre>";
		// print_r($bean);
		$total = $bean->total_amount;
		// echo $total;
		// exit;
		$date_entered = $bean->date_entered;
		//$date_modified = $bean->date_entered;
		$date = 'INV-'.date("Y").'-00';
		$ip = $_SERVER['SERVER_ADDR'];
		// echo "sawood<br>";
		if($total=="")
			$total=0;
		
		// echo "$shipping_state, $commission, $customer_name, $shipping_postal_code, $shipping_country, $shipping_city, $city, $state, $street, $ip, $customer_id, $total, $date,  $order_id, $sub_total, $order_total_id, $order_total_id1, $order_total_id2, $order_total_id3";
		// exit;
		


		$myquery = "INSERT INTO oc_order SET shipping_zone = '".$shipping_state."',commission = '".$commission."',payment_firstname = '".$customer_name."',payment_company ='".$company_name."',shipping_company ='".$company_name."',shipping_firstname = '".$customer_name."',shipping_lastname = ' ',shipping_postcode = '".$shipping_postal_code."',shipping_country = '".$shipping_country."',shipping_city = '".$shipping_city."',shipping_address_1 = '".$shipping_street."',payment_country = '".$country."',payment_postcode = '".$postal_code."',payment_city = '".$city." ".$state."',payment_address_1 = '".$street."',firstname = '".$customer_name."',lastname = ' ',ip = '".$ip."',language_id = '1',customer_id = '".$customer_id."',customer_group_id = '4',total = '".$total."',invoice_no = '0',store_name = 'www.freshfood.com',invoice_prefix = '".$date."',order_id = '".$order_id."',order_status_id= '1',date_added = NOW(),date_modified = NOW()";
		$query = $cart_conn->query($myquery);
		
		$query = $cart_conn->query("INSERT INTO oc_order_total SET order_total_id = '".$order_total_id."',order_id = '".$order_id."',code = 'sub_total',title = 'Sub-Total',value = '".$sub_total."',sort_order=1");
		$query = $cart_conn->query("INSERT INTO oc_order_total SET order_total_id = '".$order_total_id1."',order_id = '".$order_id."',code = 'shipping',title = 'Flat Shipping Rate',value ='".$shipping_charge."',sort_order=3");
		$query = $cart_conn->query("INSERT INTO oc_order_total SET order_total_id = '".$order_total_id2."',order_id = '".$order_id."',code = 'tax',title = 'VAT',value = '".$tax."',sort_order=5");
		$query = $cart_conn->query("INSERT INTO oc_order_total SET order_total_id = '".$order_total_id3."',order_id = '".$order_id."',code = 'total',title = 'Total',value = '".$total."',sort_order=9");
		$GLOBALS['log']->fatal("addcustomerfrom crm".$query);
		$GLOBALS['log']->fatal("DONOTDELeTE inside if".$bean->do_no_delete_c);  
	}
		$bean->do_no_delete_c = 1;
		
		 }
	 }
	  //Shifa- End
?>
	  