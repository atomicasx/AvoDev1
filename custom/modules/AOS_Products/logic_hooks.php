<?php
 
$hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['after_save'] = Array(); 

$hook_array['after_save'][] = Array(95, 'Relationship3', 'custom/modules/AOS_Products/add_Product.php','class_addproduct', 'method_addproduct');
//$hook_array['after_save'][] = Array(95, 'Relationship2', 'custom/modules/ST_products/services.php','Relationshipss2', 'calsRelation2');
//$hook_array['before_save'][]=Array(94,'Warehouse 1 Invertory StockIN','custom/modules/ST_products/warehouse.php','Class_StockIN1','func_StockIN1');
//$hook_array['before_save'][]=Array(94,'opencart status','custom/modules/ST_products/opencart.php','opencart_status','open_status');

$hook_array['before_save'][] = Array(1, 'After create new product information save user stock for product', 'custom/modules/AOS_Products/createUserStock.php','CreateUserStock', 'saveUserStock'); 


?>