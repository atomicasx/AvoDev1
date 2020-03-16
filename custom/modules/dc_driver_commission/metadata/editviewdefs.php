<?php
$module_name = 'dc_driver_commission';
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
            'name' => 'driver_c',
            'studio' => 'visible',
            'label' => 'LBL_DRIVER',
          ),
          1 => 
          array (
            'name' => 'invoice_c',
            'studio' => 'visible',
            'label' => 'LBL_INVOICE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'flat_rate_commission_c',
            'studio' => 'visible',
            'label' => 'LBL_FLAT_RATE_COMMISSION',
          ),
          1 => 
          array (
            'name' => 'percentage_commission_c',
            'studio' => 'visible',
            'label' => 'LBL_PERCENTAGE_COMMISSION',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'commission_amount_c',
            'label' => 'LBL_COMMISSION_AMOUNT',
          ),
        ),
      ),
    ),
  ),
);
;
?>
