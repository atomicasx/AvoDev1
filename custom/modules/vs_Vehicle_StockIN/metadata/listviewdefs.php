<?php
$module_name = 'vs_Vehicle_StockIN';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'FROMWHERE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_FROMWHERE',
    'width' => '10%',
    'default' => true,
  ),
  'QUANTITY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_QUANTITY',
    'width' => '10%',
    'default' => true,
  ),
  'FYN_VEHICLE_VS_VEHICLE_STOCKIN_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_FYN_VEHICLE_VS_VEHICLE_STOCKIN_1_FROM_FYN_VEHICLE_TITLE',
    'id' => 'FYN_VEHICLE_VS_VEHICLE_STOCKIN_1FYN_VEHICLE_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'AOS_PRODUCTS_VS_VEHICLE_STOCKIN_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_AOS_PRODUCTS_VS_VEHICLE_STOCKIN_1_FROM_AOS_PRODUCTS_TITLE',
    'id' => 'AOS_PRODUCTS_VS_VEHICLE_STOCKIN_1AOS_PRODUCTS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'DRIVER_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_DRIVER_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
;
?>
