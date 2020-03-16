<?php
 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['after_save'] = Array();
$hook_array['before_save'][] = Array(1, 'Stockins1', 'custom/modules/vs_vehiclestockOUT/stocks.php','vStock_Vehicle', 'vstock_method');



?>