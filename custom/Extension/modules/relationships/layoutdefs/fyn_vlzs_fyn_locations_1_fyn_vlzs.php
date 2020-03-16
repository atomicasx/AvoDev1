<?php
 // created: 2018-12-05 15:23:59
$layout_defs["fyn_vlzs"]["subpanel_setup"]['fyn_vlzs_fyn_locations_1'] = array (
  'order' => 100,
  'module' => 'fyn_locations',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FYN_VLZS_FYN_LOCATIONS_1_FROM_FYN_LOCATIONS_TITLE',
  'get_subpanel_data' => 'fyn_vlzs_fyn_locations_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
