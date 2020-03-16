<?php
$module_name = 'fyn_Vehicle';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'STOCK_IN' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STOCK_IN',
    'width' => '15%',
    'default' => true,
  ),
  'STOCK_OUT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STOCK_OUT',
    'width' => '15%',
    'default' => true,
  ),
  'BAL_STOCK' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_BAL_STOCK',
    'width' => '15%',
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
