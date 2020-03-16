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
  'AOS_PRODUCTS_FYN_QR_CODE_BOXES_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_AOS_PRODUCTS_FYN_QR_CODE_BOXES_1_FROM_AOS_PRODUCTS_TITLE',
    'id' => 'AOS_PRODUCTS_FYN_QR_CODE_BOXES_1AOS_PRODUCTS_IDA',
    'width' => '10%',
    'default' => true,
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
  'DRIVER_NAME_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_DRIVER_NAME',
    'id' => 'USER_ID_C',
    'link' => true,
    'width' => '10%',
  ),
  'FYN_QR_CODE_PALLETTE_FYN_QR_CODE_BOXES_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_FYN_QR_CODE_PALLETTE_FYN_QR_CODE_BOXES_1_FROM_FYN_QR_CODE_PALLETTE_TITLE',
    'id' => 'FYN_QR_CODE_PALLETTE_FYN_QR_CODE_BOXES_1FYN_QR_CODE_PALLETTE_IDA',
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
  'TRUCK_INFO' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TRUCK_INFO',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  'NO_OF_BOXES' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NO_OF_BOXES',
    'width' => '10%',
    'default' => false,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
  'MODIFIED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_MODIFIED_NAME',
    'id' => 'MODIFIED_USER_ID',
    'width' => '10%',
    'default' => false,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
);
;
?>
