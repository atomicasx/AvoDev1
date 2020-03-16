<?php
$module_name = 'vs_Vehicle_StockIN';
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
          0 => 'assigned_user_name',
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
            'name' => 'aos_products_vs_vehicle_stockin_1_name',
            'label' => 'LBL_AOS_PRODUCTS_VS_VEHICLE_STOCKIN_1_FROM_AOS_PRODUCTS_TITLE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'quantity',
            'label' => 'LBL_QUANTITY',
          ),
          1 => 
          array (
            'name' => 'fromwhere',
            'studio' => 'visible',
            'label' => 'LBL_FROMWHERE',
          ),
        ),
      ),
    ),
  ),
);
;
?>
