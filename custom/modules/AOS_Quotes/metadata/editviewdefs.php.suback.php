<?php
// created: 2019-11-22 19:36:43
$viewdefs['AOS_Quotes']['EditView'] = array (
  'templateMeta' => 
  array (
    'form' => 
    array (
      'buttons' => 
      array (
        0 => 'SAVE',
        1 => 'CANCEL',
      ),
    ),
    'maxColumns' => '2',
    'widths' => 
    array (
      0 => 
      array (
        'label' => '10',
        'field' => '30',
      ),
      1 => 
      array (
        'label' => '10',
        'field' => '30',
      ),
    ),
    'useTabs' => true,
    'tabDefs' => 
    array (
      'LBL_ACCOUNT_INFORMATION' => 
      array (
        'newTab' => true,
        'panelDefault' => 'expanded',
      ),
      'LBL_LINE_ITEMS' => 
      array (
        'newTab' => false,
        'panelDefault' => 'expanded',
      ),
    ),
    'syncDetailEditViews' => false,
  ),
  'panels' => 
  array (
    'lbl_account_information' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'name',
          'displayParams' => 
          array (
            'required' => true,
          ),
          'label' => 'LBL_NAME',
        ),
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'orderid_c',
          'label' => 'LBL_ORDERID',
        ),
        1 => 
        array (
          'name' => 'billing_account',
          'label' => 'LBL_BILLING_ACCOUNT',
          'displayParams' => 
          array (
            'key' => 
            array (
              0 => 'billing',
              1 => 'shipping',
            ),
            'copy' => 
            array (
              0 => 'billing',
              1 => 'shipping',
            ),
            'billingKey' => 'billing',
            'shippingKey' => 'shipping',
          ),
        ),
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'due_dates_c',
          'label' => 'LBL_DUE_DATES',
        ),
        1 => 
        array (
          'name' => 'customerid_c',
          'label' => 'LBL_CUSTOMERID',
        ),
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'approval_status',
          'label' => 'LBL_APPROVAL_STATUS',
        ),
        1 => 
        array (
          'name' => 'assigned_user_name',
          'label' => 'LBL_ASSIGNED_TO_NAME',
        ),
      ),
      4 => 
      array (
        0 => 
        array (
          'name' => 'balanceamount_c',
          'label' => 'LBL_BALANCEAMOUNT',
        ),
        1 => 
        array (
          'name' => 'special_suggestion_c',
          'studio' => 'visible',
          'label' => 'LBL_SPECIAL_SUGGESTION',
        ),
      ),
      5 => 
      array (
        0 => 
        array (
          'name' => 'shipping_address_street',
          'hideLabel' => true,
          'type' => 'address',
          'displayParams' => 
          array (
            'key' => 'shipping',
            'copy' => 'billing',
            'rows' => 2,
            'cols' => 30,
            'maxlength' => 150,
          ),
          'label' => 'LBL_SHIPPING_ADDRESS_STREET',
        ),
        1 => 
        array (
          'name' => 'billing_address_street',
          'hideLabel' => true,
          'type' => 'address',
          'displayParams' => 
          array (
            'key' => 'billing',
            'rows' => 2,
            'cols' => 30,
            'maxlength' => 150,
          ),
          'label' => 'LBL_BILLING_ADDRESS_STREET',
        ),
      ),
    ),
    'lbl_line_items' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'line_items',
          'label' => 'LBL_LINE_ITEMS',
        ),
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'subtotal_amount',
          'label' => 'LBL_SUBTOTAL_AMOUNT',
        ),
        1 => '',
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'tax_amount',
          'label' => 'LBL_TAX_AMOUNT',
        ),
        1 => '',
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'total_amount',
          'label' => 'LBL_GRAND_TOTAL',
        ),
      ),
      4 => 
      array (
        0 => 
        array (
          'name' => 'sales_commission_user_c',
          'studio' => 'visible',
          'label' => 'LBL_SALES_COMMISSION_USER',
        ),
        1 => 
        array (
          'name' => 'commission_amount_c',
          'label' => 'LBL_COMMISSION_AMOUNT',
        ),
      ),
    ),
  ),
);