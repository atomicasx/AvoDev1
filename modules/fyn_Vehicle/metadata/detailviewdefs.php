<?php
$module_name = 'fyn_Vehicle';
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
            'name' => 'vehicleno',
            'label' => 'LBL_VEHICLENO',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'stock_in',
            'label' => 'LBL_STOCK_IN',
          ),
          1 => 
          array (
            'name' => 'stock_out',
            'label' => 'LBL_STOCK_OUT',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'bal_stock',
            'label' => 'LBL_BAL_STOCK',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
;
?>
