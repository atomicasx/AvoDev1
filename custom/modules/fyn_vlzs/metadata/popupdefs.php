<?php
$popupMeta = array (
    'moduleMain' => 'fyn_vlzs',
    'varName' => 'fyn_vlzs',
    'orderBy' => 'fyn_vlzs.name',
    'whereClauses' => array (
  'name' => 'fyn_vlzs.name',
  'status_c' => 'fyn_vlzs_cstm.status_c',
  'van_c' => 'fyn_vlzs.van_c',
  'assigned_user_id' => 'fyn_vlzs.assigned_user_id',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'status_c',
  5 => 'van_c',
  6 => 'assigned_user_id',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'status_c' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STATUS_C',
    'width' => '10%',
    'name' => 'status_c',
  ),
  'van_c' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_VAN_C',
    'id' => 'FYN_VEHICLE_ID_C',
    'link' => true,
    'width' => '10%',
    'name' => 'van_c',
  ),
  'assigned_user_id' => 
  array (
    'name' => 'assigned_user_id',
    'label' => 'LBL_ASSIGNED_TO',
    'type' => 'enum',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
  ),
),
);
