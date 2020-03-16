<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require_once('include/entryPoint.php');
require("config.php");
require("config_override.php");
require_once('modules/Administration/Administration.php');
if(!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
class class_addcustomer
{
	public function func_addcustomer($bean, $event, $arguments)
	{
		//echo "Hello Shifa";
		global $db;
		global $sugar_config;
		//print_r( $sugar_config);
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
		  //echo "Connected";
		}
		$company = $bean->employees;
		$address = $bean->billing_address_street;
		$state = $bean->billing_address_state;
		$city = $bean->billing_address_city;
		$postal_code = $bean->billing_address_postalcode;
		$country = $bean->billing_address_country;
		$GLOBALS['log']->fatal("zipcode: " . $postal_code);
		$query = $cart_conn->query("SELECT customer_id FROM oc_customer ORDER BY customer_id DESC LIMIT 1");
		$row = $query->fetch_assoc(); 
		$customer_ide = $row['customer_id'];
		$GLOBALS['log']->fatal("SIC cart: " .$customer_ide);
		
		$query12 = $db->query("SELECT sic_code FROM accounts WHERE id='".$bean->id."'");
		$row12 = $query12->fetch_assoc();
		//$no_of_record = $query12->num_rows; //exit;€€€
		$cu_id_crm = $row12['sic_code'];
		$GLOBALS['log']->fatal("SIC CRM: " . $cu_id_crm);
		if($cu_id_crm != $customer_ide){
	 		$customer_id = $row['customer_id']+1;
	   }
	   if($cu_id_crm == $customer_ide){
	   	$customer_id = $row['customer_id'];
	   }
	   $ip = $_SERVER['SERVER_ADDR'];
		$customer_fname = $bean->name;
      //$customer_id = $bean->customer_id;
      
		$query3 = $cart_conn->query("SELECT country_id FROM oc_country WHERE name = '".$country."'");
		$row13 = $query3->fetch_assoc(); 
		$country_id = $row13['country_id'];
      $query1 = $cart_conn->query("SELECT address_id FROM oc_address ORDER BY address_id DESC LIMIT 1");
		$row11 = $query1->fetch_assoc(); 
		$address_id = $row11['address_id']+1;
	   $GLOBALS['log']->fatal("address id:".$address_id);
      $phone = $bean->phone_alternate;
      $email = $bean->email1;
		//$date_entered = $bean->fetched_row['date_entered'];
		$date_entered = $bean->date_entered;
		$card = $bean->card1_c;
		$name_oncard = $bean->owner1_c;
		$card_number = $bean->card_number1_c;
		$ccid = $bean->ccid1_c;
		$month = $bean->month1_c;
		$year = $bean->year1_c;
		$notes = $bean->add_notes1_c;
		
		$card2 = $bean->card2_c;
		$name_oncard2 = $bean->owner2_c;
		$card_number2 = $bean->card_number2_c;
		$ccid2 = $bean->ccid2_c;
		$month2 = $bean->month2_c;
		$year2 = $bean->year2_c;
		$notes2 = $bean->add_notes2_c;
		
		$card3 = $bean->card3_c;
		$name_oncard3 = $bean->owner3_c;
		$card_number3 = $bean->card_number3_c;
		$ccid3 = $bean->ccid3_c;
		$month3 = $bean->month3_c;
		$year3 = $bean->year3_c;
		$notes3 = $bean->add_notes3_c;
		// echo print_r($bean->date_entered);exit;
		$password = md5('crm123');
		$q = $cart_conn->query("SELECT * FROM oc_customer WHERE customer_id = '".$bean->sic_code."'");
		$r = $q->fetch_assoc(); 
		$no_of_record = $q->num_rows; //exit;
		

		$GLOBALS['log']->fatal("NOOF RECORDS " . $no_of_record);
		if($no_of_record <=0){
			//echo " coming insiside";exit;
			$query = $db->query("UPDATE accounts SET sic_code  = '".$customer_id."' WHERE id = '".$bean->id."'");
		$query = $cart_conn->query("INSERT INTO oc_customer SET address_id = '".$address_id."',ip = '".$ip."',password='".$password."',language_id = '1',customer_group_id = '4',firstname = '".$customer_fname."',lastname = ' ',email = '".$email."',customer_id = '".$customer_id."',telephone = '".$phone."',status= '1',date_added = '".$date_entered."'");
		$query2 = $cart_conn->query("INSERT INTO oc_address SET address_id = '".$address_id."',firstname = '".$customer_fname."',lastname = ' ',company = '".$company."',address_1 = '".$address."',city = '".$city."',postcode = '".$postal_code."',country_id = '".$country_id."',customer_id = '".$customer_id."'");
		//echo "INSERT INTO oc_customer SET address_id = '".$address_id."',ip = '".$ip."',password='crm123',language_id = '1',customer_group_id = '4',firstname = '".$customer_fname."',lastname = ' ',email = '".$email."',customer_id = '".$customer_id."',telephone = '".$phone."',status= '1'";

		//echo "INSERT INTO oc_address SET address_id = '".$address_id."',firstname = '".$customer_fname."',lastname = ' ',company = '".$company."',address_1 = '".$address."',city = '".$city."',postcode = '".$postal_code."',customer_id = '".$customer_id."'";
		}
		if($no_of_record >= 1) {
		$query = $cart_conn->query("UPDATE oc_customer SET password='".$password."',language_id = '1',customer_group_id = '4',firstname = '".$customer_fname."',lastname = ' ',email = '".$email."',telephone = '".$phone."',status= '1' WHERE customer_id = '".$bean->sic_code."' AND address_id = '".$row11['address_id']."'");
		$query2 = $cart_conn->query("UPDATE oc_address SET firstname = '".$customer_fname."',lastname = ' ',company = '".$company."',address_1 = '".$address."',city = '".$city."',postcode = '".$postal_code."',country_id = '".$country_id."' WHERE address_id = '".$row11['address_id']."' AND customer_id = '".$bean->sic_code."'");
		$GLOBALS['log']->fatal("UPDATE oc_customer SET password='crm123',language_id = '1',customer_group_id = '4',firstname = '".$customer_fname."',lastname = ' ',email = '".$email."',telephone = '".$phone."',status= '1' WHERE customer_id = '".$bean->sic_code."' AND address_id = '".$row11['address_id']."'");
		$GLOBALS['log']->fatal("UPDATE oc_address SET firstname = '".$customer_fname."',lastname = ' ',company = '".$company."',address_1 = '".$address."',city = '".$city."',postcode = '".$postal_code."',country_id = '".$country_id."' WHERE address_id = '".$row11['address_id']."' AND customer_id = '".$bean->sic_code."'");
	//	echo "UPDATE oc_customer SET ip = '".$ip."',password='crm123',language_id = '1',customer_group_id = '4',firstname = '".$customer_fname."',lastname = ' ',email = '".$email."',telephone = '".$phone."',status= '1',date_added = now() WHERE customer_id = '".$bean->sic_code."' AND address_id = '".$row11['address_id']."'";
		//echo "UPDATE oc_address SET firstname = '".$customer_fname."',lastname = ' ',company = '".$company."',address_1 = '".$address."',city = '".$city."',postcode = '".$postal_code."',country_id = '".$country_id."' WHERE address_id = '".$row11['address_id']."' AND customer_id = '".$bean->sic_code."'";

		}	
		$GLOBALS['log']->fatal("INSERT INTO oc_customer SET address_id = '".$address_id."',ip = '".$ip."',password='".$password."',language_id = '1',customer_group_id = '4',firstname = '".$customer_fname."',lastname = ' ',email = '".$email."',customer_id = '".$customer_id."',telephone = '".$phone."',status= '1',date_added = '".$date_entered."'");
		 }
	 }
?>
	  