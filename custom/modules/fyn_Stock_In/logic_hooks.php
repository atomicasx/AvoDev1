<?php
 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['after_save'] = Array();

$hook_array['before_save'][] = Array(88, 'Relationship2', 'custom/modules/fyn_Stock_In/saveStockIn.php','saveStockIn', 'saveStockInName');

//$hook_array['before_save'][] = Array(88, 'Relationship2', 'custom/modules/fyn_Stock_In/services.php','Relationshipss2', 'calsRelation2');
//$hook_array['before_save'][] = Array(1, 'Stockins', 'custom/modules/fyn_Stock_In/stocks.php','Stock_Products', 'stock_method');
//$hook_array['after_save'][] = Array(1, 'Stockins', 'custom/modules/fyn_Stock_In/update_balance.php','balance_Products', 'balance_method');

$hook_array['after_save'][] = Array(88, 'Relationship2', 'custom/modules/fyn_Stock_In/saveStockIn.php','saveStockIn', 'saveStockInData');

$hook_array['after_ui_frame'] = Array();
$hook_array['after_ui_frame'][] = Array(1, 'Add Print Label Buttons to fyn_QR_CODE_BOXES POP View', 'custom/modules/fyn_QR_CODE_BOXES/PrintLabelButtons.php','PrintLabelButtons', 'add');


?>