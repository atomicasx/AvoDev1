<?php
//ini_set('memory_limit', '-1');
// error_reporting(E_ALL);
// @ini_set('display_errors', 1);
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
  
class Relate
{
    function relateLocation($bean, $event, $arguments)
    {
    	//echo "test"; exit;
        global $current_user;
        global $db;

        $given_zipcode=$bean->shipping_address_postalcode;

        //Load Locations & ZipCodes
        $locations = BeanFactory::getBean('fyn_locations');
        $locations->retrieve_by_string_fields(array('name' => $given_zipcode));

        // echo "shafiq<pre>";print_r($locations->id);exit;
        if($locations->id!="")
        {
            // echo "I'm in";exit;
            // $bean->load_relationship('fyn_locations_opportunities_1_name');
            $bean->fyn_locations_aos_invoices_1fyn_locations_ida=$locations->id;
            // $type = 'Accounts';
            // $a_relationid = $accounts->id;

            $locations->save();
        }

        $bean->save();

    }
}