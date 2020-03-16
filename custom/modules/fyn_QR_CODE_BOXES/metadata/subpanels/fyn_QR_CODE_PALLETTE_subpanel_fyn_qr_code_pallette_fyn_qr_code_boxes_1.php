<?php
// created: 2018-11-29 09:46:50
$subpanel_layout['list_fields'] = array (
  'qr_image' => 
  array (
    'type' => 'image',
    'studio' => 'visible',
    'width' => '50%',
    'vname' => 'LBL_QR_IMAGE',
    'default' => true,
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '25%',
    'default' => true,
  ),
  'aos_products_fyn_qr_code_boxes_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_AOS_PRODUCTS_FYN_QR_CODE_BOXES_1_FROM_AOS_PRODUCTS_TITLE',
    'id' => 'AOS_PRODUCTS_FYN_QR_CODE_BOXES_1AOS_PRODUCTS_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'AOS_Products',
    'target_record_key' => 'aos_products_fyn_qr_code_boxes_1aos_products_ida',
  ),
  'no_of_boxes' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_NO_OF_BOXES',
    'width' => '10%',
    'default' => true,
  ),
  'fyn_qr_code_pallette_fyn_qr_code_boxes_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_FYN_QR_CODE_PALLETTE_FYN_QR_CODE_BOXES_1_FROM_FYN_QR_CODE_PALLETTE_TITLE',
    'id' => 'FYN_QR_CODE_PALLETTE_FYN_QR_CODE_BOXES_1FYN_QR_CODE_PALLETTE_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'fyn_QR_CODE_PALLETTE',
    'target_record_key' => 'fyn_qr_code_pallette_fyn_qr_code_boxes_1fyn_qr_code_pallette_ida',
  ),
  'date_entered' => 
  array (
    'type' => 'datetime',
    'vname' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'fyn_QR_CODE_BOXES',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'fyn_QR_CODE_BOXES',
    'width' => '5%',
    'default' => true,
  ),
);