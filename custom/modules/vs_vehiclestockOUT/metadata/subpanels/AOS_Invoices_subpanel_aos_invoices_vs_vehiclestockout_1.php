<?php
// created: 2018-12-03 17:30:37
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '25%',
    'default' => true,
  ),
  'fyn_vehicle_vs_vehiclestockout_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_FYN_VEHICLE_VS_VEHICLESTOCKOUT_1_FROM_FYN_VEHICLE_TITLE',
    'id' => 'FYN_VEHICLE_VS_VEHICLESTOCKOUT_1FYN_VEHICLE_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'fyn_Vehicle',
    'target_record_key' => 'fyn_vehicle_vs_vehiclestockout_1fyn_vehicle_ida',
  ),
  'aos_products_vs_vehiclestockout_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_AOS_PRODUCTS_VS_VEHICLESTOCKOUT_1_FROM_AOS_PRODUCTS_TITLE',
    'id' => 'AOS_PRODUCTS_VS_VEHICLESTOCKOUT_1AOS_PRODUCTS_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'AOS_Products',
    'target_record_key' => 'aos_products_vs_vehiclestockout_1aos_products_ida',
  ),
  'to_vehicle_c' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_TO_VEHICLE',
    'id' => 'FYN_VEHICLE_ID_C',
    'link' => true,
    'width' => '10%',
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'fyn_Vehicle',
    'target_record_key' => 'fyn_vehicle_id_c',
  ),
  'quantity' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_QUANTITY',
    'width' => '10%',
    'default' => true,
  ),
  'aos_invoices_vs_vehiclestockout_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_AOS_INVOICES_VS_VEHICLESTOCKOUT_1_FROM_AOS_INVOICES_TITLE',
    'id' => 'AOS_INVOICES_VS_VEHICLESTOCKOUT_1AOS_INVOICES_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'AOS_Invoices',
    'target_record_key' => 'aos_invoices_vs_vehiclestockout_1aos_invoices_ida',
  ),
  'destination' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_DESTINATION',
    'width' => '10%',
    'default' => true,
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '45%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'vs_vehiclestockOUT',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'vs_vehiclestockOUT',
    'width' => '5%',
    'default' => true,
  ),
);