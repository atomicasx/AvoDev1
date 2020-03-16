<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['after_save'] = Array(); 
$hook_array['before_save'] = Array(); 
$hook_array['after_retrieve'] = Array(); 

$hook_array['before_save'][] = Array(25, ' QR Evaluate', 'custom/modules/qr_QR_Pallete/services.php','Class_QrEval', 'func_order');
$hook_array['before_save'][] = Array(26, ' gen_QR', 'custom/modules/qr_QR_Pallete/recived.php','gen_QR', 'recived_QR');
// $hook_array['after_save'][] = Array(78,'Retrieve last Order date','custom/modules/op_Customer/ordersnap.php','class_lastOrderDate','func_lastOrderDate'); 

$hook_array['after_save'][] = Array(27, 'generate_QR', 'custom/modules/qr_QR_Pallete/services.php','Class_genQR', 'QR_pal_bx');
//$hook_array['after_retrieve'][] = Array(1, 'AddProductinQRbox', 'custom/modules/qr_QR_Pallete/addproduct.php','Class_Pro', 'Qr_box_method');


?>