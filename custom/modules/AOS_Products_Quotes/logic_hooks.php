<?php
 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['after_retrieve'] = Array(); 
$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(90, 'Relationship1', 'custom/modules/AOS_Products_Quotes/cart_items.php','Class_Order_item', 'Order_method');
?>