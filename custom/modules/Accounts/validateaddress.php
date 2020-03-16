<?php
//ini_set('memory_limit', '-1');
// error_reporting(E_ALL);
// @ini_set('display_errors', 1);
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
  
class Geocode
{
	function validateAddress($bean, $event, $arguments)
    {
     	global $current_user;
      	global $db;

      	$dr_street=$bean->billing_address_street;
      	$size=strlen($dr_street);

      	$city=$bean->billing_address_city;
      	$state=$bean->billing_address_state;
      	$county=$bean->billing_address_country;
      	$zipcode=$bean->billing_address_postalcode;


	$bean->employees = ucwords(strtolower($bean->employees));
        
        $bean->billing_address_street = ucwords(strtolower($bean->billing_address_street));
        $bean->billing_address_city = ucwords(strtolower($bean->billing_address_city));
        $bean->billing_address_state = ucwords(strtolower($bean->billing_address_state));
        
        $bean->shipping_address_street = ucwords(strtolower($bean->shipping_address_street));
        $bean->shipping_address_city = ucwords(strtolower($bean->shipping_address_city));
        $bean->shipping_address_state = ucwords(strtolower($bean->shipping_address_state));
        
        
        $bean->primary_first_name_c = ucwords(strtolower($bean->primary_first_name_c));
        $bean->primary_last_name_c = ucwords(strtolower($bean->primary_last_name_c));
        
        
        $bean->secondary_contact_first_name_c = ucwords(strtolower($bean->secondary_contact_first_name_c));
        $bean->secondary_contact_last_name_c = ucwords(strtolower($bean->secondary_contact_last_name_c));
        
        
        $bean->third_contact_first_name_c = ucwords(strtolower($bean->third_contact_first_name_c));
        $bean->third_contact_last_name_c = ucwords(strtolower($bean->third_contact_last_name_c));
        
        
        $bean->billing_contact_first_name_c = ucwords(strtolower($bean->billing_contact_first_name_c));
        $bean->billing_contact_last_name_c = ucwords(strtolower($bean->billing_contact_last_name_c));
        
        
        
        $bean->customer_email_address_c = strtolower($bean->customer_email_address_c);
        $bean->secondary_contact_email_c = strtolower($bean->secondary_contact_email_c);
        $bean->third_contact_email_address_c = strtolower($bean->third_contact_email_address_c);
        $bean->billing_email_c = strtolower($bean->billing_email_c);

	$name = $bean->primary_first_name_c." ".$bean->primary_last_name_c;
	$bean->name = $name;
		// $addr1=$bean->address_1;
		// $addr2=$bean->address_2;
		// $locality = $bean->locality_c;
		// $pincode = $bean->postcode;
	
      	if($size<=6 || $city=='')
      	{
      		$bean->addr_status_c='not_verified';
      	}
      	else
      	{
      		$fulladdr =$dr_street." ".$city." ".$state." ".$county." ".$zipcode;
			$fulladdr = urlencode($fulladdr);

			$url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $fulladdr . '&sensor=false&key=AIzaSyApkNutWzbr0PcjSGqf7qntea3mguPC8fk';

			$geocode = file_get_contents($url);
			$results = json_decode($geocode, true);

			 //echo "shafiq<pre>";			 print_r($results); 			 exit;

			if ($results['status'] == 'OK') 
			{
				$lat = $results['results'][0]['geometry']['location']['lat'];
				$long = $results['results'][0]['geometry']['location']['lng'];
			}

			echo "Lat:" . $lat . " ";
			echo "Lon:" . $long . " ";

			if ($results['status'] == 'OK') 
			{
				if (count($results['results']) > 1) 
				{
				   echo "Multiple address found";
				}
				if (count($results['results']) == 1) 
				{
					if (isset($results['results'][0]['partial_match'])) 
					{
						if ($results['results'][0]['partial_match']) 
						{
							echo "This is a partially right address";
							$bean->addr_status_c='not_verified';
						}
					} 
					else 
					{
						echo "Valid address";
						$bean->addr_status_c='verified';
					}
				}
			} 
			else 
			{
				echo "Invalid address";
				$bean->addr_status_c='not_verified';
			}

			$bean->formatted_address_c=$results['results'][0]['formatted_address'];
      	}

		


		// $given_pincode=$bean->pin_code_c;

		// //Load Locations & ZipCodes
		// $locations = BeanFactory::getBean('fyn_locations');
  //       $locations->retrieve_by_string_fields(array('pincode_c' => $given_pincode));

  //       // echo "shafiq<pre>";print_r($locations->id);exit;
  //       if($locations->id!="")
  //       {
  //       	// echo "I'm in";exit;
  //           // $bean->load_relationship('fyn_locations_opportunities_1_name');
  //           $bean->fyn_locations_opportunities_1fyn_locations_ida=$locations->id;
  //           // $type = 'Accounts';
  //           // $a_relationid = $accounts->id;
  //       }

  //       $locations->save();
        // echo "shafiq12345 <pre>";print_r($bean->fyn_locations_opportunities_1fyn_locations_ida);





		//To view the complete response
		// echo "
		// <pre>";
		// print_r($results);
		// exit;

		// if($results[status]!='OK')
		// {
		// 	echo "Not the right address";exit;
		// }


     }

}