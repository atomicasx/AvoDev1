<?php
$popupMeta = array (
    'moduleMain' => 'Account',
    'varName' => 'ACCOUNT',
    'orderBy' => 'name',
    'whereClauses' => array (
  'name' => 'accounts.name',
  'billing_address_city' => 'accounts.billing_address_city',
  'account_type' => 'accounts.account_type',
  'industry' => 'accounts.industry',
  'billing_address_state' => 'accounts.billing_address_state',
  'billing_address_country' => 'accounts.billing_address_country',
  'email' => 'accounts.email',
  'assigned_user_id' => 'accounts.assigned_user_id',
),
    'searchInputs' => array (
  0 => 'name',
  1 => 'billing_address_city',
  3 => 'account_type',
  4 => 'industry',
  5 => 'billing_address_state',
  6 => 'billing_address_country',
  7 => 'email',
  8 => 'assigned_user_id',
),
    'create' => array (
  'formBase' => 'AccountFormBase.php',
  'formBaseClass' => 'AccountFormBase',
  'getFormBodyParams' => 
  array (
    0 => '',
    1 => '',
    2 => 'AccountSave',
  ),
  'createButton' => 'LNK_NEW_ACCOUNT',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'account_type' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_TYPE',
    'width' => '10%',
    'name' => 'account_type',
  ),
  'industry' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_INDUSTRY',
    'width' => '10%',
    'name' => 'industry',
  ),
  'billing_address_city' => 
  array (
    'name' => 'billing_address_city',
    'width' => '10%',
  ),
  'billing_address_state' => 
  array (
    'name' => 'billing_address_state',
    'width' => '10%',
  ),
  'billing_address_country' => 
  array (
    'name' => 'billing_address_country',
    'width' => '10%',
  ),
  'email' => 
  array (
    'name' => 'email',
    'width' => '10%',
  ),
  'assigned_user_id' => 
  array (
    'name' => 'assigned_user_id',
    'label' => 'LBL_ASSIGNED_TO',
    'type' => 'enum',
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
  'NAME' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_ACCOUNT_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'SIC_CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SIC_CODE',
    'width' => '10%',
    'default' => true,
    'name' => 'sic_code',
  ),
  'EMPLOYEES' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EMPLOYEES',
    'width' => '10%',
    'default' => true,
    'name' => 'employees',
  ),
  'SHIPPING_ADDRESS_STREET' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SHIPPING_ADDRESS_STREET',
    'width' => '10%',
    'default' => true,
    'name' => 'shipping_address_street',
  ),
  'SHIPPING_ADDRESS_CITY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SHIPPING_ADDRESS_CITY',
    'width' => '10%',
    'default' => true,
    'name' => 'shipping_address_city',
  ),
  'SHIPPING_ADDRESS_STATE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SHIPPING_ADDRESS_STATE',
    'width' => '10%',
    'default' => true,
    'name' => 'shipping_address_state',
  ),
  'SHIPPING_ADDRESS_POSTALCODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SHIPPING_ADDRESS_POSTALCODE',
    'width' => '10%',
    'default' => true,
    'name' => 'shipping_address_postalcode',
  ),
  'ACCOUNT_TYPE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_TYPE',
    'width' => '10%',
    'default' => true,
    'name' => 'account_type',
  ),
),
);
