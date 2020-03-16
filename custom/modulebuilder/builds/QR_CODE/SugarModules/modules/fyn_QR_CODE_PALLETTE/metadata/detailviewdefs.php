<?php
$module_name = 'fyn_QR_CODE_PALLETTE';
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
            'name' => 'qrimage',
            'studio' => 'visible',
            'label' => 'LBL_QRIMAGE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'status',
            'studio' => 'visible',
            'label' => 'LBL_STATUS',
          ),
          1 => 
          array (
            'name' => 'truckinfo',
            'label' => 'LBL_TRUCKINFO',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'drivername',
            'label' => 'LBL_DRIVERNAME',
          ),
          1 => 
          array (
            'name' => 'farmunit',
            'studio' => 'visible',
            'label' => 'LBL_FARMUNIT',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'total_boxes',
            'label' => 'LBL_TOTAL_BOXES',
          ),
        ),
        4 => 
        array (
          0 => 'date_entered',
          1 => 'date_modified',
        ),
        5 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
;
?>
