<?php
$module_name = 'qr_QR_Boxes';
$viewdefs [$module_name] = 
array (
  'EditView' => 
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
            'name' => 'st_products_qr_qr_boxes_1_name',
            'label' => 'LBL_ST_PRODUCTS_QR_QR_BOXES_1_FROM_ST_PRODUCTS_TITLE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'qr_qr_pallete_qr_qr_boxes_1_name',
            'label' => 'LBL_QR_QR_PALLETE_QR_QR_BOXES_1_FROM_QR_QR_PALLETE_TITLE',
          ),
          1 => 
          array (
            'name' => 'truck_info_c',
            'label' => 'LBL_TRUCK_INFO',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'comment' => 'Date record created',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'comment' => 'Date record last modified',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
      ),
    ),
  ),
);
;
?>
