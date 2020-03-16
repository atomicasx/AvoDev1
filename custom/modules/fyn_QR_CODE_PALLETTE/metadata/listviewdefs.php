<?php
$module_name = 'fyn_QR_CODE_PALLETTE';
$listViewDefs [$module_name] = 
array (
  'QRIMAGE' => 
  array (
    'type' => 'image',
    'studio' => 'visible',
    'width' => '20%',
    'label' => 'LBL_QRIMAGE',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'TOTAL_BOXES' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TOTAL_BOXES',
    'width' => '10%',
    'default' => true,
  ),
  'FARMUNIT' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_FARMUNIT',
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
