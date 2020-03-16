<?php
// created: 2018-11-29 09:44:32
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '25%',
    'default' => true,
  ),
  'quantity' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_QUANTITY',
    'width' => '10%',
    'default' => true,
  ),
  'fyn_qr_code_boxes_fyn_stock_in_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_FYN_QR_CODE_BOXES_FYN_STOCK_IN_1_FROM_FYN_QR_CODE_BOXES_TITLE',
    'id' => 'FYN_QR_CODE_BOXES_FYN_STOCK_IN_1FYN_QR_CODE_BOXES_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'fyn_QR_CODE_BOXES',
    'target_record_key' => 'fyn_qr_code_boxes_fyn_stock_in_1fyn_qr_code_boxes_ida',
  ),
  'aos_products_fyn_stock_in_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_AOS_PRODUCTS_FYN_STOCK_IN_1_FROM_AOS_PRODUCTS_TITLE',
    'id' => 'AOS_PRODUCTS_FYN_STOCK_IN_1AOS_PRODUCTS_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'AOS_Products',
    'target_record_key' => 'aos_products_fyn_stock_in_1aos_products_ida',
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
    'module' => 'fyn_Stock_In',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'fyn_Stock_In',
    'width' => '5%',
    'default' => true,
  ),
);