<?php
$module_name = 'qr_QR_Boxes';
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
          4 => 
          array (
            'customCode' => '<input type="button" class="button" onClick="showPopup(\'pdf\');" value="{$MOD.LBL_PRINT_AS_PDF}">',
          ),
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
      'syncDetailEditViews' => true,
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
            'name' => 'qr_image_c',
            'studio' => 'visible',
            'label' => 'LBL_QR_IMAGE',
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
            'name' => 'st_products_qr_qr_boxes_1_name',
            'label' => 'LBL_ST_PRODUCTS_QR_QR_BOXES_1_FROM_ST_PRODUCTS_TITLE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'truck_info_c',
            'label' => 'LBL_TRUCK_INFO',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 'date_entered',
          1 => 'date_modified',
        ),
      ),
    ),
  ),
);
;
?>
