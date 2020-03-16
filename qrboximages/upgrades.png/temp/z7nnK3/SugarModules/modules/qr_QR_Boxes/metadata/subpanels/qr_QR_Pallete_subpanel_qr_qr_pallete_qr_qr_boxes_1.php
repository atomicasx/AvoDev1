<?php
// created: 2018-09-21 02:44:35
$subpanel_layout['list_fields'] = array (
  'qr_image_c' => 
  array (
    'type' => 'image',
    'default' => true,
    'studio' => 'visible',
    'width' => '10%',
    'vname' => 'LBL_QR_IMAGE',
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'product_name_c' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_PRODUCT_NAME',
    'width' => '10%',
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '45%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'qr_QR_Boxes',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'qr_QR_Boxes',
    'width' => '5%',
    'default' => true,
  ),
);