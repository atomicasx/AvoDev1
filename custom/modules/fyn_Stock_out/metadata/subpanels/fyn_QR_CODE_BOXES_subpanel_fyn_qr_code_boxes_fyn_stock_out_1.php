<?php
// created: 2018-11-29 09:45:40
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '25%',
    'default' => true,
  ),
  'fyn_qr_code_boxes_fyn_stock_out_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_FYN_QR_CODE_BOXES_FYN_STOCK_OUT_1_FROM_FYN_QR_CODE_BOXES_TITLE',
    'id' => 'FYN_QR_CODE_BOXES_FYN_STOCK_OUT_1FYN_QR_CODE_BOXES_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'fyn_QR_CODE_BOXES',
    'target_record_key' => 'fyn_qr_code_boxes_fyn_stock_out_1fyn_qr_code_boxes_ida',
  ),
  'quantity' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_QUANTITY',
    'width' => '10%',
    'default' => true,
  ),
  'aos_quotes_fyn_stock_out_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_AOS_QUOTES_FYN_STOCK_OUT_1_FROM_AOS_QUOTES_TITLE',
    'id' => 'AOS_QUOTES_FYN_STOCK_OUT_1AOS_QUOTES_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'AOS_Quotes',
    'target_record_key' => 'aos_quotes_fyn_stock_out_1aos_quotes_ida',
  ),
  'aos_products_fyn_stock_out_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_AOS_PRODUCTS_FYN_STOCK_OUT_1_FROM_AOS_PRODUCTS_TITLE',
    'id' => 'AOS_PRODUCTS_FYN_STOCK_OUT_1AOS_PRODUCTS_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'AOS_Products',
    'target_record_key' => 'aos_products_fyn_stock_out_1aos_products_ida',
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'fyn_Stock_out',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'fyn_Stock_out',
    'width' => '5%',
    'default' => true,
  ),
);