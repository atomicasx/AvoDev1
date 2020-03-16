<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
$hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['after_save'] = Array(); 


//$hook_array['before_save'][] = Array(1, 'test', 'custom/modules/fyn_routes/test.php','Test', 'testing'); 
//$hook_array['before_save'][] = Array(4, 'auto', 'custom/modules/fyn_routes/auto.php','auto', 'relate');
$hook_array['before_save'][] = Array(1, 'test', 'custom/modules/fyn_routes/getorders.php','Test', 'testing'); 
$hook_array['after_relationship_add'][] = Array(
    1,
    'addRelationship',
    'custom/modules/fyn_routes/AfterinvoiceAdd.php', // file
    'AfterinvoiceAdd', // class
    'updateVansStock' // function
);

$hook_array['after_save'][] = Array(9, 'Add Related Invoices to Route', 'custom/modules/fyn_routes/RoutesHook.php','RoutesHook', 'AssociateInvoices');
?>