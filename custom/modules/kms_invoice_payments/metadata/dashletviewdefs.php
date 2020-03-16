<?php
$dashletData['kms_invoice_paymentsDashlet']['searchFields'] = array (
  'date_entered' => 
  array (
    'default' => '',
  ),
  'date_modified' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'type' => 'assigned_user_name',
    'default' => '',
  ),
);
$dashletData['kms_invoice_paymentsDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME_DL',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  /* 'aos_invoices_name' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_AOS_INVOICES_NAME',
    'id' => 'AOS_INVOICES_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'aos_invoices_name',
  ), */
  'customer_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CUSTOMER_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'payment_type' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_PAYMENT_TYPE',
    'width' => '10%',
    'default' => true,
    'name' => 'payment_type',
  ),
  
  'amount' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_AMOUNT',
    'width' => '10%',
    'default' => true,
    'name' => 'amount',
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LBL_ASSIGNED_TO_NAME_DL',
    'name' => 'assigned_user_name',
    'default' => true,
  ),
  'date_recieved' => 
  array (
    'type' => 'date',
    'label' => 'LBL_LBL_DATE_RECIEVED_DL',
    'width' => '10%',
    'default' => true,
    'name' => 'date_recieved',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => false,
    'name' => 'date_entered',
  ),
  
);
