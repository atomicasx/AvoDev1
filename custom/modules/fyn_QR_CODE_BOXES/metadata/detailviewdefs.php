<?php
$module_name = 'fyn_QR_CODE_BOXES';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
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
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'qr_image',
            'studio' => 'visible',
            'label' => 'LBL_QR_IMAGE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'aos_products_fyn_qr_code_boxes_1_name',
            'label' => 'LBL_AOS_PRODUCTS_FYN_QR_CODE_BOXES_1_FROM_AOS_PRODUCTS_TITLE',
          ),
          1 => 
          array (
            'name' => 'fyn_qr_code_pallette_fyn_qr_code_boxes_1_name',
            'label' => 'LBL_FYN_QR_CODE_PALLETTE_FYN_QR_CODE_BOXES_1_FROM_FYN_QR_CODE_PALLETTE_TITLE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'invoice_c',
            'studio' => 'visible',
            'label' => 'LBL_INVOICE',
          ),
          1 => 
          array (
            'name' => 'no_of_boxes',
            'label' => 'LBL_NO_OF_BOXES',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
          1 => 
          array (
            'name' => 'driver_name_c',
            'studio' => 'visible',
            'label' => 'LBL_DRIVER_NAME',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 'date_modified',
        ),
      ),
    ),
  ),
);
;
?>
