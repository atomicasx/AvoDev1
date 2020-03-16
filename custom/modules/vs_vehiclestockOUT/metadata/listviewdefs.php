<?php
$module_name = 'vs_vehiclestockOUT';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'QUANTITY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_QUANTITY',
    'width' => '10%',
    'default' => true,
  ),
  'FYN_VEHICLE_VS_VEHICLESTOCKOUT_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_FYN_VEHICLE_VS_VEHICLESTOCKOUT_1_FROM_FYN_VEHICLE_TITLE',
    'id' => 'FYN_VEHICLE_VS_VEHICLESTOCKOUT_1FYN_VEHICLE_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'AOS_PRODUCTS_VS_VEHICLESTOCKOUT_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_AOS_PRODUCTS_VS_VEHICLESTOCKOUT_1_FROM_AOS_PRODUCTS_TITLE',
    'id' => 'AOS_PRODUCTS_VS_VEHICLESTOCKOUT_1AOS_PRODUCTS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'AOS_QUOTES_VS_VEHICLESTOCKOUT_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_AOS_QUOTES_VS_VEHICLESTOCKOUT_1_FROM_AOS_QUOTES_TITLE',
    'id' => 'AOS_QUOTES_VS_VEHICLESTOCKOUT_1AOS_QUOTES_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'DESTINATION' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_DESTINATION',
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
