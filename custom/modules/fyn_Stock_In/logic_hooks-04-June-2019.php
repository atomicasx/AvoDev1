<?php
 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['after_save'] = Array();

$hook_array['before_save'][] = Array(88, 'Relationship2', 'custom/modules/fyn_Stock_In/services.php','Relationshipss2', 'calsRelation2');
$hook_array['before_save'][] = Array(1, 'Stockins', 'custom/modules/fyn_Stock_In/stocks.php','Stock_Products', 'stock_method');
$hook_array['after_save'][] = Array(1, 'Stockins', 'custom/modules/fyn_Stock_In/update_balance.php','balance_Products', 'balance_method');



?>