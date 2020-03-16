<?php
 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['after_retrieve'] = Array(); 
$hook_array['after_save'] = Array(); 

$hook_array['before_save'][] = Array(88, 'Relationship', 'custom/modules/AOS_Quotes/services.php','Relationshipss1', 'calsRelation');
$hook_array['before_save'][] = Array(90, 'Ordername', 'custom/modules/AOS_Quotes/ordername.php','updatename', 'namemethod');
$hook_array['after_save'][] = Array(90, 'Relationship1', 'custom/modules/AOS_Quotes/order_items.php','Class_Order_item', 'Order_method');

$hook_array['before_save'][] = Array(1, 'Validate Addres with Google API', 'custom/modules/AOS_Quotes/validateaddress.php','Geocode', 'validateAddress');
//$hook_array['after_save'][] = Array(90, 'Relate Orders with Locations', 'custom/modules/AOS_Quotes/relatewithlocations.php','Relate', 'relateLocation'); 
$hook_array['after_save'][] = Array(11, 'Updateorder_status', 'custom/modules/AOS_Quotes/order_update.php','Order_Status', 'order_method');
$hook_array['after_save'][] = Array(119, 'Name(Locations Not related)', 'custom/modules/AOS_Quotes/order_update.php','Order_Status', 'order_method');
$hook_array['after_save'][] = Array(120, 'Add_order', 'custom/modules/AOS_Quotes/add_order.php','Add_orderclass', 'addorder_method');
$hook_array['after_save'][] = Array(2, 'Record Activity', 'custom/modules/AOS_Quotes/AOS_QuotesHook.php','AOS_QuotesHook', 'RecordActivity');
?>