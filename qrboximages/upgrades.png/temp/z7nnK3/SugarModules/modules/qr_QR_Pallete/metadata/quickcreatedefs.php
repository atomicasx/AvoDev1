<?php
$module_name = 'qr_QR_Pallete';
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
      'useTabs' => true,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL2' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL3' => 
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
          0 => 'name',
          1 => 
          array (
            'name' => 'total_boxes_c',
            'label' => 'LBL_TOTAL_BOXES',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'qr_image_c',
            'studio' => 'visible',
            'label' => 'LBL_QR_IMAGE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'class1_box_28_c',
            'label' => 'LBL_CLASS1_BOX_28_C',
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
            'name' => 'class1_total_c',
            'label' => 'LBL_CLASS1_TOTAL',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
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
            'name' => 'class2_total_c',
            'label' => 'LBL_CLASS2_TOTAL',
          ),
        ),
      ),
      'lbl_editview_panel3' => 
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
