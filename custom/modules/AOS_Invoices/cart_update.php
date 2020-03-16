<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
if(!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
class Order_Status1
{

	/**
	* Called as process_record logic hook on the Performers module
	*/
	public function order_method($bean, $event, $arguments)
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
			//echo "Connected";
		}
		// $commissionuserbean = BeanFactory::getBean('Users', $bean->user_id_c);
		// $bean->commission_amount_c = $commissionuserbean->commision_rate_c;
		 // print_r($bean->commission_amount_c); exit;
		//if($bean->do_no_delete_c == ""){
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

		$query = $db->query("SELECT name,sic_code,employees FROM accounts WHERE id = '".$customer_name_id."'");
		$row1 = $query->fetch_assoc(); 
		$customer_name = $row1['name'];
		$customer_id = $row1['sic_code'];
		$company_name = $row1['employees'];
		$ip = $_SERVER['SERVER_ADDR'];
		$total = $bean->total_amount;
		$sub_total = $bean->subtotal_amount;
		$tax = $bean->tax_amount;
		$shipping_charge = $bean->shipping_amount;
		$date = $bean->date_entered;
		$ord_id = $bean->orderid_c;

		$order_status = $bean->approval_status_c; 
      $order_id = $bean->orderid_c;
		$query1 = "SELECT order_status_id FROM oc_order_status WHERE name='".$order_status."'";
		$result1 = $cart_conn->query($query1);
		$row1 = $result1->fetch_assoc();
		$status = $row1['order_status_id'];
		$update = $cart_conn->query("UPDATE `oc_order` SET order_status_id = '".$status."' WHERE order_id = '".$order_id."'");
		$GLOBALS['log']->fatal("UPDATE order".$update);

		
// exit;
// 		$s="SELECT * FROM `AOS_invoice_cstm`";
// 	    $result = $cart_conn->query($s);
	    
      
//       // if ($result->num_rows >= 0) {
//     // echo(" $result->numrows"); exit;
//  	// print_r($result->num_rows);
// // exit;
//         while($row = $result->fetch_assoc())
//         { print_r($row);exit;
//         	//echo("$row <pre>");
//           $check="SELECT id FROM `AOS_invoice` WHERE id='".$row['id_c']."'";
//           $result_check = $db->query($check);

// 			$ad="Select order_id from `oc_order` Where `order_id`='".$row['orderid_c']."'";
//             $results = $cart_conn->query($ad);
//             $ro = $results->fetch_assoc();

				// $GLOBALS['log']->fatal("UPdate order_id = ".$row['orderid_c']);
                  
		// echo $ord_id;
		// echo "$customer_name, $shipping_postal_code, $shipping_country, $shipping_city, $shipping_street, $country, $street,$state, $ip,$customer_id, $total";
		// exit;
		// $query1 = $cart_conn->query("DELETE FROM `oc_order_total` WHERE order_id = '".$ord_id."'");
		$query = $cart_conn->query("SELECT order_id FROM oc_order ORDER BY order_id DESC LIMIT 1");
		$row4 = $query->fetch_assoc();
		$query1 = $cart_conn->query("SELECT order_total_id FROM oc_order_total ORDER BY order_total_id DESC LIMIT 1");
		$row41 = $query1->fetch_assoc();
		
		// if($row4['order_id'] > $bean->orderid_c) { 
		//  $order_id = $row4['order_id']+1;
		//  $order_total_id = $row41['order_total_id']+1;
		//  $order_total_id1 = $row41['order_total_id']+2;
		//  $order_total_id2 = $row41['order_total_id']+3;
		//  $order_total_id3= $row41['order_total_id']+4;
		//  }else{
		//  	$order_total_id = $row41['order_total_id'];
		//  $order_total_id1 = $row41['order_total_id'];
		//  $order_total_id2 = $row41['order_total_id'];
		//  $order_total_id3= $row41['order_total_id'];
		//  }


		{


		$myquery = $cart_conn->query("UPDATE oc_order SET shipping_company ='".$company_name."',payment_company ='".$company_name."',shipping_firstname = '".$customer_name."',shipping_lastname = ' ',shipping_postcode = '".$shipping_postal_code."',shipping_country = '".$shipping_country."',shipping_city = '".$shipping_city."',shipping_address_1 = '".$shipping_street."',payment_country = '".$country."',payment_postcode = '".$postal_code."',payment_city = '".$city." ".$state."',payment_address_1 = '".$street."',firstname = '".$customer_name."',lastname = ' ',ip = '".$ip."',language_id = '1',customer_id = '".$customer_id."',customer_group_id = '4',total = '".$total."',invoice_no = '0',store_name = 'www.freshfood.com',invoice_prefix = '".$date."',order_status_id= '1',date_added = NOW(),date_modified = NOW() WHERE order_id = '".$ord_id."'");
		
		$query = $cart_conn->query($myquery);

echo "$order_total_id $ord_id $order_total_id1 $order_total_id2 $sub_total $shipping_charge $tax $total"; 
$query = $cart_conn->query("UPDATE oc_order_total SET value = '".$sub_total."' WHERE order_id = '".$ord_id."' AND title = 'Sub-Total' ");
$query = $cart_conn->query("UPDATE oc_order_total SET value = '".$shipping_charge."' WHERE order_id = '".$ord_id."' AND title = 'Flat Shipping Rate' ");
$query = $cart_conn->query("UPDATE oc_order_total SET value = '".$tax."' WHERE order_id = '".$ord_id."' AND title = 'VAT' ");
$query = $cart_conn->query("UPDATE oc_order_total SET value = '".$total."' WHERE order_id = '".$ord_id."' AND title = 'Total' ");
// echo "<pre>";
// print_r($bean); exit;
		
	}
		$query1 = $cart_conn->query("DELETE FROM `oc_order_product` WHERE order_id = '".$ord_id."'");

$quer12 = $db->query("SELECT * from `aos_products_quotes` WHERE parent_id = '".$bean->id."'");
// echo "<pre>";
while($rw = $quer12->fetch_assoc()){

	// print_r($rw);
	$product_name = $rw['name'];
        $product_recordid = $rw['id'];
        $products_id = $rw['product_id'];
        $product_date_entered = $rw['date_entered'];
        $product_id = $rw['part_number'];
        $quantity_products = $rw['product_qty'];
        $price = $rw['product_list_price'];
        $sprice = $rw['product_unit_price'];
        $total_price = $rw['product_total_price'];
        $tax = $rw['vat_amt'];
	$qu = $cart_conn->query("SELECT order_product_id FROM oc_order_product ORDER BY order_product_id DESC LIMIT 1");    
        $r = $qu->fetch_assoc(); 
        $order_product_id = $r['order_product_id']+1;
	$query = $cart_conn->query("INSERT INTO oc_order_product SET order_product_id = '".$order_product_id."',order_id = '".$ord_id."',price = '".$price."',sprice = '".$sprice."',tax = '".$tax."',name = '".$product_name."',quantity = '".$quantity_products."',model = '".$product_name."',product_id = '".$product_id."',total = '".$total_price."',reward = '0'");
}

		 // $query1 = $cart_conn->query("DELETE FROM `oc_order_total` WHERE order_id = '".$ord_id."'");
		 

// 	$query = $cart_conn->query("INSERT INTO oc_order_total SET order_total_id = '".$order_total_id."',order_id = '".$order_id."',code = 'sub_total',title = 'Sub-Total',value = '".$sub_total."',sort_order=1");

// 		$query = $cart_conn->query("INSERT INTO oc_order_total SET order_total_id = '".$order_total_id1."',order_id = '".$order_id."',code = 'shipping',title = 'Flat Shipping Rate',value ='".$shipping_charge."',sort_order=3");
// 		$query = $cart_conn->query("INSERT INTO oc_order_total SET order_total_id = '".$order_total_id2."',order_id = '".$order_id."',code = 'tax',title = 'VAT',value = '".$tax."',sort_order=5");
// 		$query = $cart_conn->query("INSERT INTO oc_order_total SET order_total_id = '".$order_total_id3."',order_id = '".$order_id."',code = 'total',title = 'Total',value = '".$total."',sort_order=9");
// // print_r($bean);
// exit;

		 }
	 }
?>	  