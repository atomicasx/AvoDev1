<?php
// created: 2020-02-03 16:04:42
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME_DL',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '15%',
    'default' => true,
  ),
  'customer_name' => 
  array (
    'vname' => 'LBL_CUSTOMER_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'aos_invoices_name' => 
  array (
    'vname' => 'LBL_AOS_INVOICES_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'payment_type' => 
  array (
    'vname' => 'LBL_PAYMENT_TYPE',
    'width' => '20%',
    'type' => 'enum',
    'default' => true,
  ),
  'amount' => 
  array (
    'vname' => 'LBL_AMOUNT',
    'width' => '10%',
    'default' => true,
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'vname' => 'LBL_LBL_ASSIGNED_TO_NAME_DL',
    'name' => 'assigned_user_name',
    'default' => true,
  ),
  'date_recieved' => 
  array (
    'vname' => 'LBL_DATE_RECIEVED',
    'width' => '15%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'kms_invoice_payments',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'kms_invoice_payments',
    'width' => '5%',
    'default' => true,
  ),
);