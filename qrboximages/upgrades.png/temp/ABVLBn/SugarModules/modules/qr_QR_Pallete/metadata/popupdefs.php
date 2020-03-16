<?php
$popupMeta = array (
    'moduleMain' => 'qr_QR_Pallete',
    'varName' => 'qr_QR_Pallete',
    'orderBy' => 'qr_qr_pallete.name',
    'whereClauses' => array (
  'name' => 'qr_qr_pallete.name',
),
    'searchInputs' => array (
  0 => 'qr_qr_pallete_number',
  1 => 'name',
  2 => 'priority',
  3 => 'status',
),
    'listviewdefs' => array (
  'QR_IMAGE_C' => 
  array (
    'type' => 'image',
    'default' => true,
    'studio' => 'visible',
    'width' => '10%',
    'label' => 'LBL_QR_IMAGE',
    'name' => 'qr_image_c',
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'STATUS_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'name' => 'status_c',
  ),
  'TOTAL_BOXES_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_TOTAL_BOXES',
    'width' => '10%',
    'name' => 'total_boxes_c',
  ),
  'FARM_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_FARM',
    'width' => '10%',
    'name' => 'farm_c',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
    'name' => 'assigned_user_name',
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
    'name' => 'date_entered',
  ),
),
);
