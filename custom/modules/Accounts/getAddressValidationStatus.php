<?php
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
/* 
[street] => street 4
[city] => Test
[state] => CA
[zip] => 19450
[country] => USA
 */
	$street=$_REQUEST['street'];
    $size=strlen($street);

	$city=$_REQUEST['city'];
	$state=$_REQUEST['state'];
	$country=$_REQUEST['country'];
	$zipcode=$_REQUEST['zip'];
	
	$result = array(
		'Status'=> '',
		'Message'=> '',
		'Result'=> '',
	);
 	if($size<=6 || $city=='')
	{
		$result['Status'] = 'Fail';
		$result['Message'] = 'Address is Not Complete';
		$result['Result'] = 'Invalid Address';
	}
	else
	{
		$fulladdr =$street." ".$city." ".$state." ".$country." ".$zipcode;
		$fulladdr = urlencode($fulladdr);

		$url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $fulladdr . '&sensor=false&key=AIzaSyApkNutWzbr0PcjSGqf7qntea3mguPC8fk';

		$geocode = file_get_contents($url);
		$results = json_decode($geocode, true);

		if ($results['status'] == 'OK') 
		{
			if (count($results['results']) > 1) 
			{
				$result['Status'] = 'OK';
				$result['Message'] = 'Multiple Address Found';
				$result['Result'] = 'Invalid Address';
			}
			if (count($results['results']) == 1) 
			{
				if (isset($results['results'][0]['partial_match']) && $results['results'][0]['partial_match']) 
				{
					$result['Status'] = 'OK';
					$result['Message'] = 'This is a Partially Right Address';
					$result['Result'] = 'Invalid Address';
				} 
				else 
				{
					$result['Status'] = 'OK';
					$result['Message'] = 'Address Verified Successfully';
					$result['Result'] = 'Valid Address';
				}
			}
		} else {
			$result['Status'] = 'Fail';
			$result['Message'] = 'Address Not Found';
			$result['Result'] = 'Invalid Address';
		}
	}
	

echo json_encode($result);

?>