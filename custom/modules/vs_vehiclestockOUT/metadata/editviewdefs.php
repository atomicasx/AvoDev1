<?php
$module_name = 'vs_vehiclestockOUT';
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
            'name' => 'fyn_vehicle_vs_vehiclestockout_1_name',
            'label' => 'LBL_FYN_VEHICLE_VS_VEHICLESTOCKOUT_1_FROM_FYN_VEHICLE_TITLE',
          ),
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'quantity',
            'label' => 'LBL_QUANTITY',
          ),
          1 => 
          array (
            'name' => 'destination',
            'studio' => 'visible',
            'label' => 'LBL_DESTINATION',
          ),
        ),
        2 => 
        array (
          1 => 
          array (
            'name' => 'fyn_qr_code_boxes_vs_vehiclestockout_1_name',
            'label' => 'LBL_FYN_QR_CODE_BOXES_VS_VEHICLESTOCKOUT_1_FROM_FYN_QR_CODE_BOXES_TITLE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'aos_invoices_vs_vehiclestockout_1_name',
            'label' => 'LBL_AOS_INVOICES_VS_VEHICLESTOCKOUT_1_FROM_AOS_INVOICES_TITLE',
          ),
          1 => 
          array (
            'name' => 'to_vehicle_c',
            'studio' => 'visible',
            'label' => 'LBL_TO_VEHICLE',
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
