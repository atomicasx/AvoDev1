<?php
// created: 2019-11-22 19:36:43
$viewdefs['AOS_Products']['DetailView'] = array (
  'templateMeta' => 
  array (
    'form' => 
    array (
      'buttons' => 
      array (
        0 => 'EDIT',
        1 => 'DUPLICATE',
        2 => 'DELETE',
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
    'useTabs' => false,
    'tabDefs' => 
    array (
      'DEFAULT' => 
      array (
        'newTab' => false,
        'panelDefault' => 'expanded',
      ),
      'LBL_DETAILVIEW_PANEL1' => 
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
        1 => 
        array (
          'name' => 'category',
          'studio' => 'visible',
          'label' => 'LBL_CATEGORY',
        ),
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
        1 => 
        array (
          'name' => 'maincode',
          'studio' => 'visible',
          'label' => 'LBL_MAINCODE',
        ),
      ),
      4 => 
      array (
        0 => 
        array (
          'name' => 'maduros_ripe_price_c',
          'label' => 'LBL_MADUROS_RIPE_PRICE',
        ),
        1 => 
        array (
          'name' => 'stock_in_from_farm_c',
          'label' => 'LBL_STOCK_IN_FROM_FARM',
        ),
      ),
      5 => 
      array (
        0 => 
        array (
          'name' => 'stockin_c',
          'label' => 'LBL_STOCKIN',
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
          'name' => 'minimum_quantity_onhand_c',
          'label' => 'LBL_MINIMUM_QUANTITY_ONHAND',
        ),
        1 => '',
      ),
      7 => 
      array (
        0 => 
        array (
          'name' => 'backorders_count_c',
          'label' => 'LBL_BACKORDERS_COUNT',
        ),
        1 => '',
      ),
      8 => 
      array (
        0 => 
        array (
          'name' => 'order_update_daily_c',
          'label' => 'LBL_ORDER_UPDATE_DAILY',
        ),
        1 => 
        array (
          'name' => 'assigned_user_name',
          'label' => 'LBL_ASSIGNED_TO_NAME',
        ),
      ),
      9 => 
      array (
        0 => 
        array (
          'name' => 'description',
          'label' => 'LBL_DESCRIPTION',
        ),
      ),
    ),
    'lbl_detailview_panel1' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'balance_c',
          'label' => 'LBL_BALANCE',
        ),
        1 => '',
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'verdes_firm_c',
          'label' => 'LBL_VERDES_FIRM',
        ),
        1 => 
        array (
          'name' => 'disposable_c',
          'label' => 'LBL_DISPOSABLE',
        ),
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'rayados_breaking_c',
          'label' => 'LBL_RAYADOS_BREAKING',
        ),
        1 => 
        array (
          'name' => 'reserve_c',
          'label' => 'LBL_RESERVE',
        ),
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'maduros_ripe_c',
          'label' => 'LBL_MADUROS_RIPE',
        ),
        1 => 
        array (
          'name' => 'defect_c',
          'label' => 'LBL_DEFECT',
        ),
      ),
      4 => 
      array (
        0 => 
        array (
          'name' => 'internal_locations_c',
          'label' => 'LBL_INTERNAL_LOCATIONS',
        ),
        1 => 
        array (
          'name' => 'unknown_c',
          'label' => 'LBL_UNKNOWN',
        ),
      ),
      5 => 
      array (
        0 => '',
        1 => '',
      ),
    ),
  ),
);