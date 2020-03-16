<?php
// created: 2019-11-22 19:37:17
$viewdefs['AOS_Products']['EditView'] = array (
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
    'form' => 
    array (
      'enctype' => 'multipart/form-data',
      'headerTpl' => 'modules/AOS_Products/tpls/EditViewHeader.tpl',
    ),
    'includes' => 
    array (
      0 => 
      array (
        'file' => 'modules/AOS_Products/js/products.js',
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
    'syncDetailEditViews' => false,
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
          'name' => 'part_number',
          'label' => 'LBL_PART_NUMBER',
        ),
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'price',
          'label' => 'LBL_PRICE',
        ),
        1 => '',
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'verdes_firm_price_c',
          'label' => 'LBL_VERDES_FIRM_PRICE',
        ),
        1 => 
        array (
          'name' => 'product_qr_code_c',
          'label' => 'LBL_PRODUCT_QR_CODE',
        ),
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'rayados_breaking_price_c',
          'label' => 'LBL_RAYADOS_BREAKING_PRICE',
        ),
        1 => '',
      ),
      4 => 
      array (
        0 => 
        array (
          'name' => 'maduros_ripe_price_c',
          'label' => 'LBL_MADUROS_RIPE_PRICE',
        ),
        1 => '',
      ),
      5 => 
      array (
        0 => 
        array (
          'name' => 'category',
          'studio' => 'visible',
          'label' => 'LBL_CATEGORY',
        ),
        1 => 
        array (
          'name' => 'type',
          'label' => 'LBL_TYPE',
        ),
      ),
      6 => 
      array (
        0 => 
        array (
          'name' => 'description',
          'label' => 'LBL_DESCRIPTION',
        ),
        1 => 
        array (
          'name' => 'assigned_user_name',
          'label' => 'LBL_ASSIGNED_TO_NAME',
        ),
      ),
      7 => 
      array (
        0 => 
        array (
          'name' => 'sort_order_c',
          'label' => 'LBL_SORT_ORDER',
        ),
        1 => '',
      ),
    ),
  ),
);