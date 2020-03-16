<?php
$module_name = 'prove_product_vehicle_stock';
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
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'product_id_c',
            'studio' => 'visible',
            'label' => 'LBL_PRODUCT_ID',
          ),
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'vehicle_id_c',
            'studio' => 'visible',
            'label' => 'LBL_VEHICLE_ID',
          ),
          1 => 
          array (
            'name' => 'vehicle_stock_c',
            'label' => 'LBL_VEHICLE_STOCK',
          ),
        ),
      ),
    ),
  ),
);
;
?>
