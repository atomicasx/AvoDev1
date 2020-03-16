<?php
$module_name = 'prove_product_vehicle_stock';
$listViewDefs [$module_name] = 
array (
  'PRODUCT_ID_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PRODUCT_ID',
    'id' => 'AOS_PRODUCTS_ID_C',
    'link' => true,
    'width' => '10%',
  ),
  'VEHICLE_ID_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_VEHICLE_ID',
    'id' => 'FYN_VEHICLE_ID_C',
    'link' => true,
    'width' => '10%',
  ),
  'VEHICLE_STOCK_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_VEHICLE_STOCK',
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
