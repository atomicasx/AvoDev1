<?php
$popupMeta = array (
    'moduleMain' => 'AOS_Invoices',
    'varName' => 'AOS_Invoices',
    'orderBy' => 'aos_invoices.name',
    'whereClauses' => array (
  'name' => 'aos_invoices.name',
  'billing_contact' => 'aos_invoices.billing_contact',
  'billing_account' => 'aos_invoices.billing_account',
  'number' => 'aos_invoices.number',
  'total_amount' => 'aos_invoices.total_amount',
  'due_date' => 'aos_invoices.due_date',
  'billing_address_postalcode' => 'aos_invoices.billing_address_postalcode',
  'status' => 'aos_invoices.status',
  'assigned_user_id' => 'aos_invoices.assigned_user_id',
),
    'searchInputs' => array (
  0 => 'name',
  4 => 'billing_contact',
  5 => 'billing_account',
  6 => 'number',
  7 => 'total_amount',
  8 => 'due_date',
  9 => 'billing_address_postalcode',
  10 => 'status',
  11 => 'assigned_user_id',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'billing_contact' => 
  array (
    'name' => 'billing_contact',
    'width' => '10%',
  ),
  'billing_account' => 
  array (
    'name' => 'billing_account',
    'width' => '10%',
  ),
  'number' => 
  array (
    'name' => 'number',
    'width' => '10%',
  ),
  'total_amount' => 
  array (
    'name' => 'total_amount',
    'width' => '10%',
  ),
  'due_date' => 
  array (
    'name' => 'due_date',
    'width' => '10%',
  ),
  'billing_address_postalcode' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_BILLING_ADDRESS_POSTALCODE',
    'width' => '10%',
    'name' => 'billing_address_postalcode',
  ),
  'status' => 
  array (
    'name' => 'status',
    'width' => '10%',
  ),
  'assigned_user_id' => 
  array (
    'name' => 'assigned_user_id',
    'type' => 'enum',
    'label' => 'LBL_ASSIGNED_TO',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
  ),
),
    'listviewdefs' => array (
  'NUMBER' => 
  array (
    'width' => '5%',
    'label' => 'LBL_LIST_NUM',
    'default' => true,
    'name' => 'number',
	'link' => true,
  ),
  'STATUS' => 
  array (
    'width' => '10%',
    'label' => 'LBL_STATUS',
    'default' => true,
    'name' => 'status',
  ),
  'DAYS_OVERDUE_C' => 
  array (
    'type' => 'int',
    'default' => true,
    'label' => 'LBL_DAYS_OVERDUE',
    'width' => '10%',
    'name' => 'days_overdue_c',
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
    'name' => 'billing_account',
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
    'name' => 'sales_commission_user_c',
  ),
  'TOTAL_COMMISSION_AMOUNT_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_TOTAL_COMMISSION_AMOUNT',
    'width' => '10%',
    'name' => 'total_commission_amount_c',
  ),
  'TOTAL_AMOUNT' => 
  array (
    'width' => '10%',
    'label' => 'LBL_GRAND_TOTAL',
    'default' => true,
    'currency_format' => true,
    'name' => 'total_amount',
  ),
  'DATE_ENTERED' => 
  array (
    'width' => '5%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
    'name' => 'date_entered',
  ),
),
);
