<?php
$module_name = 'fyn_QR_CODE_BOXES';
$listViewDefs [$module_name] = 
array (
  'QR_IMAGE' => 
  array (
    'type' => 'image',
    'studio' => 'visible',
    'width' => '10%',
    'label' => 'LBL_QR_IMAGE',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'NO_OF_BOXES' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NO_OF_BOXES',
    'width' => '10%',
    'default' => true,
  ),
  'TRUCK_INFO' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TRUCK_INFO',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
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
