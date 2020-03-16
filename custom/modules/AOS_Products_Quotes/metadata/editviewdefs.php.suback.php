<?php
// created: 2019-11-22 19:36:43
$viewdefs['AOS_Products_Quotes']['EditView'] = array (
  'templateMeta' => 
  array (
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
    'useTabs' => false,
    'tabDefs' => 
    array (
      'DEFAULT' => 
      array (
        'newTab' => false,
        'panelDefault' => 'expanded',
      ),
    ),
    'syncDetailEditViews' => true,
  ),
  'panels' => 
  array (
    'default' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'name',
          'label' => 'LBL_NAME',
        ),
        1 => 
        array (
          'name' => 'product_qty',
          'label' => 'LBL_PRODUCT_QTY',
        ),
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'product_cost_price',
          'label' => 'LBL_PRODUCT_COST_PRICE',
        ),
        1 => 
        array (
          'name' => 'product_list_price',
          'label' => 'LBL_PRODUCT_LIST_PRICE',
        ),
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'product_unit_price',
          'label' => 'LBL_PRODUCT_UNIT_PRICE',
        ),
        1 => 
        array (
          'name' => 'vat',
          'label' => 'LBL_VAT',
        ),
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'product',
          'label' => 'LBL_PRODUCT',
        ),
        1 => 
        array (
          'name' => 'parent_name',
          'label' => 'LBL_FLEX_RELATE',
        ),
      ),
      4 => 
      array (
        0 => 
        array (
          'name' => 'item_description',
          'comment' => '',
          'label' => 'LBL_PRODUCT_DESCRIPTION',
        ),
        1 => 
        array (
          'name' => 'description',
          'label' => 'LBL_DESCRIPTION',
        ),
      ),
      5 => 
      array (
        0 => 
        array (
          'name' => 'product_category_list_c',
          'studio' => 'visible',
          'label' => 'LBL_PRODUCT_CATEGORY_LIST',
        ),
        1 => '',
      ),
    ),
  ),
);