<?php
$popupMeta = array (
    'moduleMain' => 'fyn_locations',
    'varName' => 'fyn_locations',
    'orderBy' => 'fyn_locations.name',
    'whereClauses' => array (
  'name' => 'fyn_locations.name',
  'location_c' => 'fyn_locations_cstm.location_c',
  'city_c' => 'fyn_locations_cstm.city_c',
  'country_c' => 'fyn_locations_cstm.country_c',
  'state_c' => 'fyn_locations_cstm.state_c',
  'fyn_vlzs_fyn_locations_1_name' => 'fyn_locations.fyn_vlzs_fyn_locations_1_name',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'location_c',
  5 => 'city_c',
  6 => 'country_c',
  7 => 'state_c',
  8 => 'fyn_vlzs_fyn_locations_1_name',
),
    'searchdefs' => array (
  'location_c' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LOCATION',
    'width' => '10%',
    'name' => 'location_c',
  ),
  'city_c' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CITY_C',
    'width' => '10%',
    'name' => 'city_c',
  ),
  'country_c' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COUNTRY_C',
    'width' => '10%',
    'name' => 'country_c',
  ),
  'state_c' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STATE',
    'width' => '10%',
    'name' => 'state_c',
  ),
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'fyn_vlzs_fyn_locations_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_FYN_VLZS_FYN_LOCATIONS_1_FROM_FYN_VLZS_TITLE',
    'id' => 'FYN_VLZS_FYN_LOCATIONS_1FYN_VLZS_IDA',
    'width' => '10%',
    'name' => 'fyn_vlzs_fyn_locations_1_name',
  ),
),
);
