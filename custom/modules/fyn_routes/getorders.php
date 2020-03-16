<?php
//ini_set('memory_limit', '-1');
// error_reporting(E_ALL);
// @ini_set('display_errors', 1);
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
  
class Test
{
    function testing($bean, $event, $arguments)
    {
    	global $current_user;
      	global $db;

      	// echo "Shafiq <pre>";
      	// print_r($bean->fyn_vlzs_fyn_routes_1fyn_vlzs_ida);
      	// echo "<br>End";
      	// exit;
      	$vlzid = $bean->fyn_vlzs_fyn_routes_1fyn_vlzs_ida;

      	$vlz = BeanFactory::getBean('fyn_vlzs',$vlzid);
      	$locations = $vlz->get_linked_beans('fyn_vlzs_fyn_locations_1','fyn_locations');

      	 //echo "<pre>";print_r($locations);exit;
      	echo "<pre>";
      	foreach ($locations as $loc) 
        {
          	echo "<br><br>Location ID:".$loc->id;"<br><br>";
          	$loc_bean = BeanFactory::getBean('fyn_locations',$loc->id);
     		    $orders=$loc_bean->get_linked_beans('fyn_locations_aos_invoices_1','AOS_Invoices');

         		foreach ($orders as $order) 
         		{
           			//echo "<br><br>Order ID:";print_r($order->id);echo"<br><br>";
           			$order_bean = BeanFactory::getBean('AOS_Invoices',$order->id);
								//echo $order->id;exit;

           			$order_bean->load_relationship('fyn_routes_aos_invoices_1');
              		$order_bean->fyn_routes_aos_invoices_1->add($bean->id);
         		}
     		

        }
       //  // exit;
    }
}