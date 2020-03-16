<?php
$module_name = 'vs_Vehicle_StockIN';
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
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'fyn_vehicle_vs_vehicle_stockin_1_name',
            'label' => 'LBL_FYN_VEHICLE_VS_VEHICLE_STOCKIN_1_FROM_FYN_VEHICLE_TITLE',
          ),
          1 => 
          array (
            'name' => 'to_vehicle_c',
            'studio' => 'visible',
            'label' => 'LBL_TO_VEHICLE',
          ),
        ),
        2 => 
        array (
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'fromwhere',
            'studio' => 'visible',
            'label' => 'LBL_FROMWHERE',
          ),
          1 => 
          array (
            'name' => 'quantity',
            'label' => 'LBL_QUANTITY',
          ),
        ),
        4 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
;
?>
