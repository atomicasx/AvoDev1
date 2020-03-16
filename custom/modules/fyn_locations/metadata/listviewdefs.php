<?php
$module_name = 'fyn_locations';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'CITY_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_CITY_C',
    'width' => '10%',
  ),
  'STATE_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_STATE',
    'width' => '10%',
  ),
  'COUNTRY_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_COUNTRY_C',
    'width' => '10%',
  ),
  'FYN_VLZS_FYN_LOCATIONS_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_FYN_VLZS_FYN_LOCATIONS_1_FROM_FYN_VLZS_TITLE',
    'id' => 'FYN_VLZS_FYN_LOCATIONS_1FYN_VLZS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
);
;
?>
