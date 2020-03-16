<?php
$module_name = 'fyn_QR_CODE_PALLETTE';
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
      'useTabs' => true,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL3' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL4' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL5' => 
        array (
          'newTab' => true,
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
            'name' => 'status',
            'studio' => 'visible',
            'label' => 'LBL_STATUS',
          ),
          1 => 
          array (
            'name' => 'farmunit',
            'studio' => 'visible',
            'label' => 'LBL_FARMUNIT',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'truckinfo',
            'label' => 'LBL_TRUCKINFO',
          ),
          1 => 
          array (
            'name' => 'drivername',
            'label' => 'LBL_DRIVERNAME',
          ),
        ),
        2 => 
        array (
          0 => 'assigned_user_name',
        ),
        3 => 
        array (
          0 => 'description',
        ),
      ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'class1_box_28_c',
            'label' => 'LBL_CLASS1_BOX_28',
          ),
          1 => 
          array (
            'name' => 'class1_box_48_c',
            'label' => 'LBL_CLASS1_BOX_48',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'class1_box_32_c',
            'label' => 'LBL_CLASS1_BOX_32',
          ),
          1 => 
          array (
            'name' => 'class1_box_60_c',
            'label' => 'LBL_CLASS1_BOX_60',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'class1_box_36_c',
            'label' => 'LBL_CLASS1_BOX_36',
          ),
          1 => 
          array (
            'name' => 'class1_box_70_c',
            'label' => 'LBL_CLASS1_BOX_70',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'class1_box_40_c',
            'label' => 'LBL_CLASS1_BOX_40',
          ),
          1 => 
          array (
            'name' => 'class1_box_84_c',
            'label' => 'LBL_CLASS1_BOX_84',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'class1_box_96_c',
            'label' => 'LBL_CLASS1_BOX_96',
          ),
          1 => 
          array (
            'name' => 'class1_box_108_c',
            'label' => 'LBL_CLASS1_BOX_108',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'class1_box_120_c',
            'label' => 'LBL_CLASS1_BOX_120',
          ),
          1 => 
          array (
            'name' => 'class1_box_132_c',
            'label' => 'LBL_CLASS1_BOX_132',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'class1_box_144_c',
            'label' => 'LBL_CLASS1_BOX_144',
          ),
          1 => 
          array (
            'name' => 'class1_box_156_c',
            'label' => 'LBL_CLASS1_BOX_156',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'class1_box_168_c',
            'label' => 'LBL_CLASS1_BOX_168',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'class1_total_c',
            'label' => 'LBL_CLASS1_TOTAL',
          ),
        ),
      ),
      'lbl_editview_panel4' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'class2_box_28_c',
            'label' => 'LBL_CLASS2_BOX_28',
          ),
          1 => 
          array (
            'name' => 'class2_box_48_c',
            'label' => 'LBL_CLASS2_BOX_48',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'class2_box_32_c',
            'label' => 'LBL_CLASS2_BOX_32',
          ),
          1 => 
          array (
            'name' => 'class2_box_60_c',
            'label' => 'LBL_CLASS2_BOX_60',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'class2_box_36_c',
            'label' => 'LBL_CLASS2_BOX_36',
          ),
          1 => 
          array (
            'name' => 'class2_box_70_c',
            'label' => 'LBL_CLASS2_BOX_70',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'class2_box_40_c',
            'label' => 'LBL_CLASS2_BOX_40',
          ),
          1 => 
          array (
            'name' => 'class2_box_84_c',
            'label' => 'LBL_CLASS2_BOX_84',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'class2_box_96_c',
            'label' => 'LBL_CLASS2_BOX_96',
          ),
          1 => 
          array (
            'name' => 'class2_box_108_c',
            'label' => 'LBL_CLASS2_BOX_108',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'class2_box_120_c',
            'label' => 'LBL_CLASS2_BOX_120',
          ),
          1 => 
          array (
            'name' => 'class2_box_132_c',
            'label' => 'LBL_CLASS2_BOX_132',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'class2_box_144_c',
            'label' => 'LBL_CLASS2_BOX_144',
          ),
          1 => 
          array (
            'name' => 'class2_box_156_c',
            'label' => 'LBL_CLASS2_BOX_156',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'class2_box_168_c',
            'label' => 'LBL_CLASS2_BOX_168',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'class2_total_c',
            'label' => 'LBL_CLASS2_TOTAL',
          ),
        ),
      ),
      'lbl_editview_panel5' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'organic_box_28_c',
            'label' => 'LBL_ORGANIC_BOX_28',
          ),
          1 => 
          array (
            'name' => 'organic_box_48_c',
            'label' => 'LBL_ORGANIC_BOX_48',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'organic_box_32_c',
            'label' => 'LBL_ORGANIC_BOX_32',
          ),
          1 => 
          array (
            'name' => 'organic_box_60_c',
            'label' => 'LBL_ORGANIC_BOX_60',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'organic_box_36_c',
            'label' => 'LBL_ORGANIC_BOX_36',
          ),
          1 => 
          array (
            'name' => 'organic_box_70_c',
            'label' => 'LBL_ORGANIC_BOX_70',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'organic_box_40_c',
            'label' => 'LBL_ORGANIC_BOX_40',
          ),
          1 => 
          array (
            'name' => 'organic_box_84_c',
            'label' => 'LBL_ORGANIC_BOX_84',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'organic_box_96_c',
            'label' => 'LBL_ORGANIC_BOX_96',
          ),
          1 => 
          array (
            'name' => 'organic_box_108_c',
            'label' => 'LBL_ORGANIC_BOX_108',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'organic_box_120_c',
            'label' => 'LBL_ORGANIC_BOX_120',
          ),
          1 => 
          array (
            'name' => 'organic_box_132_c',
            'label' => 'LBL_ORGANIC_BOX_132',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'organic_box_144_c',
            'label' => 'LBL_ORGANIC_BOX_144',
          ),
          1 => 
          array (
            'name' => 'organic_box_156_c',
            'label' => 'LBL_ORGANIC_BOX_156',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'organic_box_168_c',
            'label' => 'LBL_ORGANIC_BOX_168',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'organic_total_c',
            'label' => 'LBL_ORGANIC_TOTAL',
          ),
        ),
      ),
    ),
  ),
);
;
?>
