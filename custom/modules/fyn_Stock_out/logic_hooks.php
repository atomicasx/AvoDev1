<?php
 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['after_save'] = Array(); 
$hook_array['after_retrieve'] = Array(); 

$hook_array['before_save'][] = Array(88, 'Relationship3', 'custom/modules/fyn_Stock_out/services.php','Relationshipss3', 'calsRelation3');
$hook_array['before_save'][] = Array(1, 'Stockout', 'custom/modules/fyn_Stock_out/stocks.php','Stockout_Products', 'stockout_method');
$hook_array['after_save'][] = Array(1, 'Stockout_balance', 'custom/modules/fyn_Stock_out/update_balance.php','balance_Products', 'balance_method');
?>