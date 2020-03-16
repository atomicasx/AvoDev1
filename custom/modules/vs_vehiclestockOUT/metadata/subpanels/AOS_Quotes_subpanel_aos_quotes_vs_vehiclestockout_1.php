<?php
// created: 2018-11-30 20:45:29
$subpanel_layout['list_fields'] = array (
  'quantity' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_QUANTITY',
    'width' => '10%',
    'default' => true,
  ),
  'destination' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_DESTINATION',
    'width' => '10%',
    'default' => true,
  ),
  'aos_quotes_vs_vehiclestockout_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_AOS_QUOTES_VS_VEHICLESTOCKOUT_1_FROM_AOS_QUOTES_TITLE',
    'id' => 'AOS_QUOTES_VS_VEHICLESTOCKOUT_1AOS_QUOTES_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'AOS_Quotes',
    'target_record_key' => 'aos_quotes_vs_vehiclestockout_1aos_quotes_ida',
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
  'assigned_user_name' => 
  array (
    'link' => true,
    'type' => 'relate',
    'vname' => 'LBL_ASSIGNED_TO_NAME',
    'id' => 'ASSIGNED_USER_ID',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Users',
    'target_record_key' => 'assigned_user_id',
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
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