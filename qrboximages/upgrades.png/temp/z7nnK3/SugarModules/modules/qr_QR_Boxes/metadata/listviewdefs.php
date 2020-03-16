<?php
$module_name = 'qr_QR_Boxes';
$listViewDefs [$module_name] = 
array (
  'QR_IMAGE_C' => 
  array (
    'type' => 'image',
    'default' => true,
    'studio' => 'visible',
    'width' => '10%',
    'label' => 'LBL_QR_IMAGE',
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
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
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ST_PRODUCTS_QR_QR_BOXES_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_ST_PRODUCTS_QR_QR_BOXES_1_FROM_ST_PRODUCTS_TITLE',
    'id' => 'ST_PRODUCTS_QR_QR_BOXES_1ST_PRODUCTS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'QR_QR_PALLETE_QR_QR_BOXES_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_QR_QR_PALLETE_QR_QR_BOXES_1_FROM_QR_QR_PALLETE_TITLE',
    'id' => 'QR_QR_PALLETE_QR_QR_BOXES_1QR_QR_PALLETE_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'NO_OF_BOXES_C' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_NO_OF_BOXES',
    'width' => '10%',
  ),
  'QR_BOXES_ID_C' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_QR_BOXES_ID',
    'width' => '10%',
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
