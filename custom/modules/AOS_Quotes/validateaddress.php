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

		// $addr1=$bean->address_1;
		// $addr2=$bean->address_2;
		// $locality = $bean->locality_c;
		// $pincode = $bean->postcode;
	if($bean->billing_account_id) {            
		$selectCustomer = "select employees from accounts where id = '".$bean->billing_account_id."'";
		//echo $selectCustomer;
		$resCustomer = $db->query($selectCustomer);

		$rowCustomer = $db->fetchByAssoc($resCustomer);

		$bean->company_name_c = $rowCustomer['employees'];        
	}
	//echo $bean->company_name_c;exit;
      	if($size<=2 || $city=='')
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

			// echo "shafiq<pre>";print_r($results);

			if ($results['status'] == 'OK') 
			{
				$lat = $results['results'][0]['geometry']['location']['lat'];
				$long = $results['results'][0]['geometry']['location']['lng'];
			}

			//echo "Lat:" . $lat . " ";
			//echo "Lon:" . $long . " ";

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
						//echo "Valid address";
						$bean->addr_status_c='verified';
					}
				}
			} 
			else 
			{
				//echo "Invalid address";
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