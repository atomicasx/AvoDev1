<?php
// created: 2018-12-05 16:50:32
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'city_c' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'vname' => 'LBL_CITY_C',
    'width' => '10%',
  ),
  'state_c' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'vname' => 'LBL_STATE',
    'width' => '10%',
  ),
  'country_c' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'vname' => 'LBL_COUNTRY_C',
    'width' => '10%',
  ),
  'location_c' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'vname' => 'LBL_LOCATION',
    'width' => '10%',
  ),
  'fyn_vlzs_fyn_locations_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_FYN_VLZS_FYN_LOCATIONS_1_FROM_FYN_VLZS_TITLE',
    'id' => 'FYN_VLZS_FYN_LOCATIONS_1FYN_VLZS_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'fyn_vlzs',
    'target_record_key' => 'fyn_vlzs_fyn_locations_1fyn_vlzs_ida',
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'fyn_locations',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'fyn_locations',
    'width' => '5%',
    'default' => true,
  ),
);