<?php
$module_name = 'fyn_locations';
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
          0 => 'name',
          1 => 
          array (
            'name' => 'city_c',
            'label' => 'LBL_CITY_C',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'state_c',
            'label' => 'LBL_STATE',
          ),
          1 => 
          array (
            'name' => 'country_c',
            'label' => 'LBL_COUNTRY_C',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'location_c',
            'label' => 'LBL_LOCATION',
          ),
          1 => 
          array (
            'name' => 'fyn_vlzs_fyn_locations_1_name',
            'label' => 'LBL_FYN_VLZS_FYN_LOCATIONS_1_FROM_FYN_VLZS_TITLE',
          ),
        ),
      ),
    ),
  ),
);
;
?>
