<?php
$listViewDefs ['AOS_Invoices'] = 
array (
  'NUMBER' => 
  array (
    'width' => '5%',
    'label' => 'LBL_LIST_NUM',
    'default' => true,
    'link' => true,
  ),
  'STATUS' => 
  array (
    'width' => '10%',
    'label' => 'LBL_STATUS',
    'default' => true,
  ),
  'DAYS_OVERDUE_C' => 
  array (
    'type' => 'int',
    'default' => true,
    'label' => 'LBL_DAYS_OVERDUE',
    'width' => '10%',
  ),
  'BILLING_ACCOUNT' => 
  array (
    'width' => '15%',
    'label' => 'LBL_BILLING_ACCOUNT',
    'default' => true,
    'module' => 'Accounts',
    'id' => 'BILLING_ACCOUNT_ID',
    'link' => true,
    'related_fields' => 
    array (
      0 => 'billing_account_id',
    ),
  ),
  'SALES_COMMISSION_USER_C' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SALES_COMMISSION_USER',
    'id' => 'USER_ID_C',
    'link' => true,
    'width' => '10%',
  ),
  'TOTAL_COMMISSION_AMOUNT_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_TOTAL_COMMISSION_AMOUNT',
    'width' => '10%',
  ),
  'TOTAL_AMOUNT' => 
  array (
    'width' => '10%',
    'label' => 'LBL_GRAND_TOTAL',
    'default' => true,
    'currency_format' => true,
  ),
  'PAYMENT_RECEIVED_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_PAYMENT_RECEIVED',
    'currency_format' => true,
    'width' => '10%',
  ),
  'DATE_ENTERED' => 
  array (
    'width' => '5%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  'ANNUAL_REVENUE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_ANNUAL_REVENUE',
    'default' => false,
  ),
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_ACCOUNT_NAME',
    'link' => true,
    'default' => false,
  ),
  'APPROVAL_STATUS_C' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_APPROVAL_STATUS',
    'width' => '10%',
  ),
  'BILLING_ADDRESS_STREET' => 
  array (
    'width' => '15%',
    'label' => 'LBL_BILLING_ADDRESS_STREET',
    'default' => false,
  ),
  'BILLING_ADDRESS_CITY' => 
  array (
    'width' => '10%',
    'label' => 'LBL_CITY',
    'default' => false,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_ASSIGNED_USER',
    'default' => false,
    'module' => 'Users',
    'id' => 'ASSIGNED_USER_ID',
    'link' => true,
    'related_fields' => 
    array (
      0 => 'assigned_user_id',
    ),
  ),
  'BILLING_ADDRESS_STATE' => 
  array (
    'width' => '7%',
    'label' => 'LBL_BILLING_ADDRESS_STATE',
    'default' => false,
  ),
  'BILLING_ADDRESS_POSTALCODE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_BILLING_ADDRESS_POSTALCODE',
    'default' => false,
  ),
  'BILLING_ADDRESS_COUNTRY' => 
  array (
    'width' => '10%',
    'label' => 'LBL_BILLING_ADDRESS_COUNTRY',
    'default' => false,
  ),
  'SHIPPING_ADDRESS_STREET' => 
  array (
    'width' => '15%',
    'label' => 'LBL_SHIPPING_ADDRESS_STREET',
    'default' => false,
  ),
  'SHIPPING_ADDRESS_CITY' => 
  array (
    'width' => '10%',
    'label' => 'LBL_SHIPPING_ADDRESS_CITY',
    'default' => false,
  ),
  'SHIPPING_ADDRESS_STATE' => 
  array (
    'width' => '7%',
    'label' => 'LBL_SHIPPING_ADDRESS_STATE',
    'default' => false,
  ),
  'SHIPPING_ADDRESS_POSTALCODE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_SHIPPING_ADDRESS_POSTALCODE',
    'default' => false,
  ),
  'SHIPPING_ADDRESS_COUNTRY' => 
  array (
    'width' => '10%',
    'label' => 'LBL_SHIPPING_ADDRESS_COUNTRY',
    'default' => false,
  ),
  'PHONE_ALTERNATE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PHONE_ALT',
    'default' => false,
  ),
  'WEBSITE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_WEBSITE',
    'default' => false,
  ),
  'OWNERSHIP' => 
  array (
    'width' => '10%',
    'label' => 'LBL_OWNERSHIP',
    'default' => false,
  ),
  'EMPLOYEES' => 
  array (
    'width' => '10%',
    'label' => 'LBL_EMPLOYEES',
    'default' => false,
  ),
  'TICKER_SYMBOL' => 
  array (
    'width' => '10%',
    'label' => 'LBL_TICKER_SYMBOL',
    'default' => false,
  ),
);
;
?>
