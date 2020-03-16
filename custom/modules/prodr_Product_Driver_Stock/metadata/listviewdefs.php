<?php
$module_name = 'prodr_Product_Driver_Stock';
$listViewDefs [$module_name] = 
array (
  'PRODUCT_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PRODUCT',
    'id' => 'AOS_PRODUCTS_ID_C',
    'link' => true,
    'width' => '10%',
  ),
  'DRIVER_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_DRIVER',
    'id' => 'USER_ID_C',
    'link' => true,
    'width' => '10%',
  ),
  'STOCK_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_STOCK',
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => false,
    'link' => true,
  ),
);
;
?>
