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
  'TOTAL_BOXES' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TOTAL_BOXES',
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
