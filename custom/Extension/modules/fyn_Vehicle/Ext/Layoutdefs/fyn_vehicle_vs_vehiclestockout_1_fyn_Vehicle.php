<?php
 // created: 2018-11-30 17:28:41
$layout_defs["fyn_Vehicle"]["subpanel_setup"]['fyn_vehicle_vs_vehiclestockout_1'] = array (
  'order' => 100,
  'module' => 'vs_vehiclestockOUT',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FYN_VEHICLE_VS_VEHICLESTOCKOUT_1_FROM_VS_VEHICLESTOCKOUT_TITLE',
  'get_subpanel_data' => 'fyn_vehicle_vs_vehiclestockout_1',
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
