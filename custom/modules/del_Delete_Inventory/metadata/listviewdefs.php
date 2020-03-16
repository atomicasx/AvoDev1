<?php
$module_name = 'del_Delete_Inventory';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'DELETE_ALL_RECORDS_C' => 
  array (
    'type' => 'html',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_DELETE_ALL_RECORDS',
    'sortable' => false,
    'width' => '10%',
  ),
);
;
?>
