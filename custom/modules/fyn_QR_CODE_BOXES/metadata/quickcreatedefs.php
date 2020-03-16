<?php
$module_name = 'fyn_QR_CODE_BOXES';
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
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'fyn_qr_code_pallette_fyn_qr_code_boxes_1_name',
            'label' => 'LBL_FYN_QR_CODE_PALLETTE_FYN_QR_CODE_BOXES_1_FROM_FYN_QR_CODE_PALLETTE_TITLE',
          ),
          1 => 
          array (
            'name' => 'aos_products_fyn_qr_code_boxes_1_name',
            'label' => 'LBL_AOS_PRODUCTS_FYN_QR_CODE_BOXES_1_FROM_AOS_PRODUCTS_TITLE',
          ),
        ),
      ),
    ),
  ),
);
;
?>
