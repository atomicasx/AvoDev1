<?php
// created: 2018-12-13 01:16:11
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '20%',
    'default' => true,
  ),
  'quantity' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_QUANTITY',
    'width' => '10%',
    'default' => true,
  ),
  'fromwhere' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_FROMWHERE',
    'width' => '10%',
    'default' => true,
  ),
  'aos_products_vs_vehicle_stockin_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_AOS_PRODUCTS_VS_VEHICLE_STOCKIN_1_FROM_AOS_PRODUCTS_TITLE',
    'id' => 'AOS_PRODUCTS_VS_VEHICLE_STOCKIN_1AOS_PRODUCTS_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'AOS_Products',
    'target_record_key' => 'aos_products_vs_vehicle_stockin_1aos_products_ida',
  ),
  'fyn_vehicle_vs_vehicle_stockin_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_FYN_VEHICLE_VS_VEHICLE_STOCKIN_1_FROM_FYN_VEHICLE_TITLE',
    'id' => 'FYN_VEHICLE_VS_VEHICLE_STOCKIN_1FYN_VEHICLE_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'fyn_Vehicle',
    'target_record_key' => 'fyn_vehicle_vs_vehicle_stockin_1fyn_vehicle_ida',
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '45%',
    'default' => true,
  ),
);