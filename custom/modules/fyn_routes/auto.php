<?php

if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
  
class auto
{
	function relate($bean, $event, $arguments)
    {
    	$bean->name= $bean->fyn_vlzs_fyn_routes_1_name." - ".$bean->assigned_user_name." - ".$bean->date_modified;
    }
}