<?php
$module_name = 'fyn_Stock_In';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
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
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'quantity',
            'label' => 'LBL_QUANTITY',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'fyn_qr_code_pallette_fyn_stock_in_1_name',
            'label' => 'LBL_FYN_QR_CODE_PALLETTE_FYN_STOCK_IN_1_FROM_FYN_QR_CODE_PALLETTE_TITLE',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'aos_products_fyn_stock_in_1_name',
            'label' => 'LBL_AOS_PRODUCTS_FYN_STOCK_IN_1_FROM_AOS_PRODUCTS_TITLE',
          ),
          1 => 
          array (
            'name' => 'fyn_qr_code_boxes_fyn_stock_in_1_name',
            'label' => 'LBL_FYN_QR_CODE_BOXES_FYN_STOCK_IN_1_FROM_FYN_QR_CODE_BOXES_TITLE',
          ),
        ),
        3 => 
        array (
          0 => 'assigned_user_name',
        ),
      ),
    ),
  ),
);
;
?>
