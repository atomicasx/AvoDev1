<?php
// created: 2019-11-09 18:32:02
$subpanel_layout['list_fields'] = array (
  'qr_image' => 
  array (
    'type' => 'image',
    'studio' => 'visible',
    'width' => '35%',
    'vname' => 'LBL_QR_IMAGE',
    'default' => true,
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '30%',
    'default' => true,
  ),
  'no_of_boxes' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_NO_OF_BOXES',
    'width' => '10%',
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
  'invoice_c' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_INVOICE',
    'id' => 'AOS_INVOICES_ID_C',
    'link' => true,
    'width' => '10%',
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'AOS_Invoices',
    'target_record_key' => 'aos_invoices_id_c',
  ),
  'driver_name_c' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_DRIVER_NAME',
    'id' => 'USER_ID_C',
    'link' => true,
    'width' => '10%',
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Users',
    'target_record_key' => 'user_id_c',
  ),
  'truck_info' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_TRUCK_INFO',
    'width' => '10%',
    'default' => true,
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