<?php
// created: 2018-11-29 19:28:36
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '25%',
    'default' => true,
  ),
  'aos_invoices_fyn_stock_out_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_AOS_INVOICES_FYN_STOCK_OUT_1_FROM_AOS_INVOICES_TITLE',
    'id' => 'AOS_INVOICES_FYN_STOCK_OUT_1AOS_INVOICES_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'AOS_Invoices',
    'target_record_key' => 'aos_invoices_fyn_stock_out_1aos_invoices_ida',
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
  'quantity' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_QUANTITY',
    'width' => '10%',
    'default' => true,
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