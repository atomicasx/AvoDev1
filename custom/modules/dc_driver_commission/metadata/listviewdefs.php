<?php
$module_name = 'dc_driver_commission';
$listViewDefs [$module_name] = 
array (
  'COMMISSION_AMOUNT_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'link' => true,
    'label' => 'LBL_COMMISSION_AMOUNT',
    'width' => '10%',
  ),
  'DRIVER_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_DRIVER',
    'id' => 'USER_ID_C',
    'link' => true,
    'width' => '10%',
  ),
  'INVOICE_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_INVOICE',
    'id' => 'AOS_INVOICES_ID_C',
    'link' => true,
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => false,
    'link' => true,
  ),
);
;
?>
